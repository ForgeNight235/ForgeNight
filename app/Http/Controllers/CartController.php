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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

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

        return view('pages.cart', compact('cart'));
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function remove(Product $product): RedirectResponse
    {
//        dd($product);
        if ($this->cartService->remove($product)) {
            session()->flash('message', 'Товар успешно удален!');
            return back();
        }
//        dd($product);

        session()->flash('message', 'Товар не удален!');
        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function updateQuantity(\Illuminate\Http\Request $request): RedirectResponse
    {
        $productId = $request->input('id');
        $quantity = $request->input('quantity');

        // Найдите товар в корзине по ID и обновите его количество
        $product = Product::findOrFail($productId);
        $this->cartService->updateCartProductQuantity($product, $quantity);

        session()->flash('message', 'Количество товара успешно обновлено!');

        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateproductquantity(\Illuminate\Http\Request $request, $id): RedirectResponse
    {

        $product = Product::findOrFail($id); // Получаем объект товара по ID

        $quantity = $request->input('quantity');

        if ($this->cartService->updateCartProductQuantity($product, $quantity)) { // Передаем объект товара в качестве первого аргумента

            session()->flash('message', 'Количество товара успешно обновлено!');

            return back();
        }
//        dd($product, $id, $quantity);
        session()->flash('message', 'Ошибка при обновлении количества товара');

        return back();
    }


    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function orderIndex(): Factory|\Illuminate\Foundation\Application|View|Application
    {
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

        return redirect()->route('page.home')->with('message' . 'Заказ успешно создан!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(\Illuminate\Http\Request $request): JsonResponse
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

//        $user = auth()->user();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));
//        Mail::to($user->email)->send(new \App\Mail\OrderCreatedMail($order));

        return response()->json([
            'message', 'Order has been created',
            'status' => true,
            'redirect_url' => route('page.home')
        ]);

    }

    public function clear()
    {
        $this->cartService->clear();

        return back();
    }
}
