<?php

namespace App\Services;

use App\Interfaces\CartInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartService implements CartInterface
{
    /**
     * @inheritDoc
     */
    public function getTotal(): int
    {
        return array_reduce($this->get(), fn($total, $item) => $total += ($item->price * $item->quantity), 0);
    }

    /**
     * @return int orderPrice With delivery
     */
    public function getTotalWithDelivery(): int
    {
        return array_reduce($this->get(), fn($total, $item) => $total += ($item->price * $item->quantity), 0) + 350;
    }

    /**
     * @inheritDoc
     */
    public function get(): mixed
    {
        try {
            if (session()->has('cart')) {
                return session()->get('cart');
            }

            return [];
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        session()->pull('cart', []);
    }

    /**
     * @inheritDoc
     */
    public function add(Product $product): void
    {
        $quantity = 1;
//        $item = ['id' => $product->id, 'quantity' => $quantity];

        $product['quantity'] = $quantity;

        session()->push('cart', $product);
    }

    /**
     * @inheritDoc
     */
//    public function remove(Product $product): bool
//    {
//        if (!in_array($product, $this->get())) {
//            return false;
//        }
//
//        $items = array_filter($this->get(), fn($element) => $element->id !== $product->id);
//
//        $this->set($items);
//
//        return true;
//    }
    public function remove(Product $product): bool
    {
        $cartItems = $this->get();

        foreach ($cartItems as $key => $item) {
            if ($item->id === $product->id) {
                unset($cartItems[$key]);
                $this->set($cartItems);
                $product = null; // удаление ссылки на удаленный объект
                return true;
            }
        }

        return false;
    }


    private function set(array $items): void
    {
        session(['cart' => $items]);
    }

    /**
     * @inheritDoc
     */
    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }

    public function updateCartProductQuantity(Product $product, int $quantity) {

        $cart = session()->get('cart') ?? []; // Используем пустой массив, если корзина еще не создана

        $productId = $product->id;

        if (isset($cart[$productId])) {

            $cart[$productId]['quantity'] = $quantity;

            session()->put('cart', $cart);

            return true;
        }
        return false;
    }


    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) return false;

        return true;
    }

    public function count(): int
    {
        $cart = session('cart', []);
        return count($cart);
    }
}
