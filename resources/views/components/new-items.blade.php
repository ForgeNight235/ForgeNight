<section id="new">
    <div class="container">
        <div class="section-article">
            <h1>
                Новое
            </h1>
            <a href="/catalog">посмотреть все</a>
        </div>


        <div class="new-items-container">

            <swiper-container class="mySwiper-news" slides-per-view="4"
                              space-between="30" centered-slides="true">
                @for($i=0;$i<10;$i++)
                    <swiper-slide>

                        <div class="slider-item">
                            <img class="wishlist" src="{{ asset('images/web-site_icons/wishlist.svg') }}"
                                 alt="wishlist">

                            <div class="item-new-img">
                                <a href="{{ route('page.single') }}">
                                    <img
                                        src="{{ asset('images/items/Chaos Daemons Slaanesh Keeper of Secrets_clear-min.png') }}"
                                        alt="">
                                </a>
                            </div>

                            <h1><a href="">Slaanesh Keeper of Secrets</a></h1>

                            <h3 class="category-item"><a href="">warhammer 40 000</a></h3>

                            <button>
                                2000₱
                                <img src="{{asset('images/web-site_icons/addToCart.webp')}}" alt="">
                            </button>
                        </div>

                    </swiper-slide>
                @endfor


            </swiper-container>
            <div class="slider__navigation">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>


        </div>

    </div>
</section>
