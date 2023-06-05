<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
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

        $validated['is_published'] = (bool) $request->get('is_published');
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
        }

        return redirect()->route('page.home');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show(Product $product)
    {
        $collectionId = $product->collection_id;

        $collection = Collection::findOrFail($collectionId);

        return view('pages.single', compact('product', 'collection'));
    }

    /**
     * @id string $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
