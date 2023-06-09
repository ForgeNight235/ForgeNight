<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreatedMail;
use App\Models\Delivery;
use App\Models\DeliveryOption;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    /**
     * @param Product $product
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function show(Product $product): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $cart = $this->cartService;

        $bestSellingProducts = Product::query()
            ->join('order_products', 'products.id', '=', 'order_products.product_id')
            ->select('products.*', DB::raw('SUM(order_products.quantity) as total_quantity'))
            ->groupBy('products.id')
            ->orderByDesc('total_quantity')
            ->limit(20)
            ->get();

        return view('pages.cart', compact('cart', 'bestSellingProducts'));
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function remove(Product $product): RedirectResponse
    {
//        dd($product);
        if ($this->cartService->remove($product)) {

            $productName = $product->name;
            session()->flash('success', 'Товар" ' . $productName . ' " успешно удален!');
            return back();
        }
//        dd($product);

        session()->flash('failure', 'Товар не удален!');
        return back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateQuantityCartPage(Request $request): RedirectResponse
    {
        $productId = $request->input('id');
        $quantity = $request->input('quantity');

        // Найдите товар в корзине по ID и обновите его количество
        $product = Product::findOrFail($productId);
        $this->cartService->updateCartProductQuantityCartPage($product, $quantity);

        $productName = $product->name;
        session()->flash('success', 'Количество товара " ' . $productName . ' " успешно обновлено!');

        return back();
    }


    public function orderIndex(): RedirectResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        if (!Auth::check())
        {
            return redirect()->route('page.login');
        }
        $cart = $this->cartService;
        $deliverers = DeliveryOption::all();

        return view('pages.checkout', compact('cart', 'deliverers'));
    }

    /**
     * @return RedirectResponse
     */
    public function createOrder(): RedirectResponse
    {
        if ($this->cartService->isEmpty()) {
            return back()->withErrors(['empty', 'Невозможно создать пустой заказ!']);
        }
        $order = Order::query()->create([
            'user_id' => auth()->user()->getAuthIdentifier(), //->id
            'total' => $this->cartService->getTotal()
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));

        return redirect()->route('page.home')->with('success' . 'Заказ успешно создан!');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        if (!Hash::check($request->get('password'), auth()->user()->getAuthPassword())) {
            return response()->json([
                'message' => 'Введенный пароль недействителен для вашего аккаунта',
                'status' => false
            ]);
        }

        if ($this->cartService->isEmpty()) {
            return response()->json([
                'empty' => 'Вы ничего не добавили в корзину',
                'status' => false
            ]);
        }

        $order = Order::query()->create([
            'user_id' => auth()->user()->id,
            'total' => $this->cartService->getTotal(),
            'delivery_option_id' => $request->input('delivery_type'),
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity // Добавляем поле quantity
            ]);
        }

        $delivery = Delivery::query()->create([
            'order_id' => $order->id,
            'delivery_option_id' => $request->input('delivery_type')
        ]);


        $this->cartService->clear();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));

        return response()->json([
            'message', 'Order has been created',
            'status' => true,
            'redirect_url' => route('account.orderSuccessCreated')
        ]);

    }

    public function clear()
    {
        $this->cartService->clear();

        return back();
    }
}
