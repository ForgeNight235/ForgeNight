<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function view;

class ProductController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    /**
     * @param CreateProductRequest $request
     * @return RedirectResponse
     */
    public function createProduct(CreateProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['is_published'] = (bool)$request->get('is_published');
        $validated['description'] = $request->input('description');

        $product = new Product($validated);
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $file->store('public/product_photos')
                ]);
            }
        } else {
            ProductImage::create([
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('page.home');
    }

    /**
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function updateProduct(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        $validated['is_published'] = (bool)$request->get('is_published');
        $validated['description'] = $request->input('description');

        if ($request->hasFile('images')) {
            $productImages = [];
            foreach ($request->file('images') as $file) {
                $productImages[] = [
                    'product_id' => $product->id,
                    'image_path' => $file->store('public/product_photos')
                ];
            }
            ProductImage::insert($productImages);
        }

        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            ProductImage::whereIn('id', $deletedImages)->delete();
        }

        $product->update($validated);

        return back()->with('success', "Изменение товара $product->name выполнено успешно!");
    }


    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show(Product $product): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $collectionId = $product->collection_id;

        $collection = Collection::findOrFail($collectionId);

        return view('pages.single', compact('product', 'collection'));
    }

//    public function addToCartCatalog(Request $request)
//    {
//        $quantity = 1;
//        $productId = $request->input('id');
//
//        $cart = $this->get();
//
//        foreach ($cart as &$product) {
//            if ($product['id'] === $productId) {
//                $product['quantity'] += $quantity;
//                $this->set($cart);
//                return back()->with('success', 'Успешно добавлен товар');
//            }
//        }
//
////        dd($productId, $quantity, $product['id']);
//        return back()->with('failure', 'Ошибка добавления товара');
//    }
    public function addToCartCatalog(string $id): RedirectResponse
    {
        /** @var Product $product */
        $product = Product::query()->find($id);

        if (is_null($product)) {
            return back();
        }

        $this->cartService->add($product);
        $productName = $product->name;

        return back()->with('success', 'Товар " '.$productName.' успешно добавлен в корзину!"');
    }

    /**
     * @id string $id
     * @return RedirectResponse
     */
    public function addToCart(Request $request): RedirectResponse
    {
        $productId = $request->input('id');
        $quantity = $request->input('quantity');

//        // Найдите товар в корзине по ID и обновите его количество
        $product = Product::findOrFail($productId);
//        dd($request['quantity'], $product);

//        $this->cartService->updateCartProductQuantitySinglePage($product, $quantity);
//        $this->cartService->add($product, $quantity);

//        if ($this->updateSingleProductQuantity($product, $quantity)) {
//            return back()->with('success', 'Количество продукта изменено');
//        }

        $this->cartService->add($product, $quantity);
        $productName = $product->name;

//        dd($quantity);

        return back()->with('success', 'Товар "'.$productName.'" добавлен в корзину!');
    }
    public function updateSingleProductQuantity(Product $product, int $quantity): bool
    {
        $cart = $this->get();

        foreach ($cart as &$product) {
            if ($product['id'] === $product->id) {
                $product['quantity'] += $quantity;
                $this->set($cart);
                return true;
            }
        }

        return false;
    }
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
    private function set(array $items): void
    {
        session(['cart' => $items]);
    }

}
