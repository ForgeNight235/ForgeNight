<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\AddTrackCodeRequest;
use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
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
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'quantity' => $item->quantity,
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        $this->cartService->clear();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));
        return response()->json([
            'message', 'Order has been created',
            'status' => true,
        ]);

    }

    /**
     * @param Request $request
     * @param $orderId
     * @return RedirectResponse
     */
    public function updateProductQuantity(Request $request, $orderId): RedirectResponse
    {
        $order = Order::findOrFail($orderId);
        $quantity = $request->input('quantity');
        $productId = $request->input('productId');

        $orderProduct = $order->products()->where('product_id', $productId)->first();

        if ($orderProduct) {
            $orderProduct->quantity = $quantity;
            $orderProduct->save();
            return back()->with('success', 'Количество товара успешно изменено!');
        }

        return back()->with('failure', 'Ошибка при обновлении количества товара');

    }

    /**
     * @param Request $request
     * @param $orderId
     * @return RedirectResponse
     */
    public function updateOrderStatus(Request $request, $orderId): RedirectResponse
    {
        $order = Order::findOrFail($orderId);
        $order->status = $request->input('orderStatus');
        $order->save();

        return back()->with('success', 'Статус заказа успешно обновлен');
    }

    /**
     * @param $orderId
     * @param $productId
     * @return RedirectResponse
     */
    public function deleteOrderProduct($orderId, $productId): RedirectResponse
    {
        try {
            $order = Order::findOrFail($orderId);
            $orderProduct = $order->products()->where('id', $productId)->first();

            if ($orderProduct) {
                $productName = $orderProduct->product->name;

                // Удаляем товар из заказа
                $orderProduct->delete();

                // Проверяем, остались ли ещё товары в заказе
                if ($order->products->isEmpty()) {
                    // Удаляем заказ, если нет других товаров
                    $order->delete();
                    return back()->with('success', 'Товар "' . $productName . '" успешно удален из заказа, и заказ удален соответственно');
                } else {
                    return back()->with('success', 'Товар "' . $productName . '" успешно удален из заказа!');
                }
            } else {
                return back()->with('failure', 'Товар не найден в заказе.');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('failure', 'Заказ или товар не найдены.');
        }
    }

    /**
     * @param AddTrackCodeRequest $request
     * @return RedirectResponse
     */
    public function addTrackCode(AddTrackCodeRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $orderId = $request->input('orderId');
        $order = Order::findOrFail($orderId);

        $order->delivery->update(['track_code' => $validated['track']]);

        return redirect()
            ->route('admin.allOrders')
            ->with('success', 'Трек-код успешно обновлен.');
    }

}
