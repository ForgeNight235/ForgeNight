<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\CartService;
use function view;

class ProductController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function createProduct(CreateProductRequest $request)
    {
        $validated = $request->validated();

        $validated['is_published'] = (bool)$request->get('is_published');

        $product = Product::query()->create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'image_path' => $file->store('public/images')
                ]);
            }
        }

//        dd($request->all());

        return redirect()->route('page.home');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Product $product)
    {
        $collectionId = $product->collection_id;

        $collection = Collection::findOrFail($collectionId);

        return view('pages.single', compact('product', 'collection'));
    }

    public function addToCart(string $id)
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
