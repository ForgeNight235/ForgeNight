<section id="new">
    <div class="container">
        <div class="section-article">
            <h1>
                Новое
            </h1>
            <a href="/catalog">посмотреть все</a>
        </div>


        <div class="new-items-container">


            <swiper-container class="mySwiper-newsProducts" slides-per-view="4"
                              space-between="30">

                @foreach($newProducts as $product)
                    <swiper-slide>

                        <div class="slider-item">
{{--                            <img class="wishlist" src="{{ asset('images/web-site_icons/wishlist.svg') }}"--}}
{{--                                 alt="wishlist">--}}

                            <div class="item-new-img">
                                <a href="{{ route('product.show', $product) }}">
                                    @if($product->images()->count() > 0)
                                        <img src="{{ $product->images()->first()->path() }}"
                                             alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('storage/product_photos/item_default_comp.webp') }}"
                                             alt="{{ $product->name }}">
                                    @endif
                                </a>
                            </div>

                            <h1>
                                <a href="{{ route('product.show', $product) }}">
                                    {{ Illuminate\Support\Str::limit($product->name, 25, '...') }}
                                </a>
                            </h1>

                            <h3 class="category-item">
                                <a href="{{ route('page.catalog', ['collection' => $product->collection_id]) }}">
                                    {{ $product->category->name }}
                                </a>
                            </h3>


                            <a href="{{ route('product.addToCartCatalog', $product) }}#scrollAnchor-{{ $product->id }}"
                               class="addToCartLink"
                               data-product-id="{{ $product->id }}">
                                <button>
                                    {{ $product->price() }}
                                    <img src="{{asset('images/web-site_icons/addToCart.webp')}}"
                                         alt="buy">
                                </button>
                            </a>
                        </div>

                    </swiper-slide>
                @endforeach



            </swiper-container>
            <div class="slider__navigation">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>


        </div>

    </div>
</section>
