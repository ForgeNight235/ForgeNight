<link
    rel="stylesheet"
    href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css') }}"
/>

<script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js') }}" defer></script>
@if(isset($bestSellingProducts) && count($bestSellingProducts) > 0)

    <section id="new">
        <div class="container">
            <div class="section-article">
                <h1 style="-webkit-text-fill-color: #232323 ;">
                    так же интересуются
                </h1>
            </div>

            <div class="new-items-container">


                <swiper-container class="mySwiper-newsProductsSale" slides-per-view="4"
                                  space-between="30">

                    @foreach($bestSellingProducts as $product)
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
@else
@endif
