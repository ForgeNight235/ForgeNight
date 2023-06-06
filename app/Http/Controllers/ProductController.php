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

    /**
     * @id string $id
     * @return RedirectResponse
     */
    public function addToCart(string $id): RedirectResponse
    {
        /** @var Product $product */
        $product = Product::query()->find($id);

        if (is_null($product)) {
            return back();
        }

        $this->cartService->add($product);

        return back();
    }
}
