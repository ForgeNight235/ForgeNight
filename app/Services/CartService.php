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
     * @param Product $product
     * @return bool
     */
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


    /**
     * @param array $items
     * @return void
     */
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

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product): void
    {
        $quantity = 1;

        if ($this->updateCartProductQuantity($product, $quantity)) {
            return;
        }

        $product['quantity'] = $quantity;
        session()->push('cart', $product);
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return bool
     */
    public function updateCartProductQuantity(Product $product, int $quantity): bool
    {
        $cart = $this->get();

        foreach ($cart as &$item) {
            if ($item['id'] === $product->id) {
                $item['quantity'] = $quantity;
                $this->set($cart);
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) return false;

        return true;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        $cart = session('cart', []);
        return count($cart);
    }
}
