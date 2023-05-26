<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartService;
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

    public function show(Product $product)
    {
        $cart = $this->cartService;

        return view('pages.cart', compact('cart'));
    }

    public function remove(Product $product)
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

    public function updateQuantity(Request $request)
    {
    }

    public function orderIndex()
    {
        $cart = $this->cartService;

        return view('pages.checkout', compact('cart'));
    }

    public function createOrder()
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

        $this->cartService->clear();

        Mail::to(auth()->user()->email)->send(new \App\Mail\OrderCreatedMail($order));

        return redirect()->route('page.home')->with('message' . 'Заказ успешно создан!');
    }

    public function clear()
    {
        $this->cartService->clear();

        return back();
    }

    public function store(\Illuminate\Http\Request $request)
    {
        if(!Hash::check($request->get('password'), auth()->user()->getAuthPassword())) {
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
            'total' => $this->cartService->getTotal()
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        $this->cartService->clear();

//        $user = auth()->user();

        Mail::to(auth()->user()->email)->send(new \App\Mail\OrderCreatedMail($order));
//        Mail::to($user->email)->send(new \App\Mail\OrderCreatedMail($order));

        return response()->json([
            'message', 'Order has been created',
            'status' => true,
            'redirect_url' => route('page.home')
        ]);

    }
}
