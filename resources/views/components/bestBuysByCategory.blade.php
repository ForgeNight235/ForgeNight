<section class="bestBuysByCategory">
    <div class="container">
        <div class="section-article">
            <h1>
                так же интересуются
            </h1>
        </div>


        <div class="new-items-container">

            <swiper-container class="mySwiper-recommend" slides-per-view="4"
                              space-between="30" centered-slides="true">
                @for($i=0;$i<10;$i++)
                    <swiper-slide>

                        <div class="slider-item">
                            <img class="wishlist" src="{{ asset('public/images/web-site_icons/wishlist.svg') }}"
                                 alt="wishlist">

                            <div class="item-new-img">
                                <a href="">
                                    <img
                                        src="{{ asset('public/images/items/Chaos Daemons Slaanesh Keeper of Secrets_clear-min.png') }}"
                                        alt="">
                                </a>
                            </div>

                            <h1><a href="">Slaanesh Keeper of Secrets</a></h1>

                            <h3 class="category-item"><a href="">warhammer 40 000</a></h3>

                            <button>
                                2000₱
                                <img src="{{asset('public/images/web-site_icons/addToCart.webp')}}" alt="">
                            </button>
                        </div>

                    </swiper-slide>
                @endfor


            </swiper-container>
            <div class="slider__navigation">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        </div>
    </div>
</section>
