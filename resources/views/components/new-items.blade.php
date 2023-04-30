<section id="new">
    <div class="container">
        <div class="section-article">
            <h1>
                Новое
            </h1>
            <a href="/catalog">посмотреть все</a>
        </div>

        <style>

            swiper-container {
                padding: 35px 0;
                width: 100%;
                height: 100%;
            }
            .mySwiper-news{
                max-width: 1000px;
                margin: 0 auto;
            }

            .new-items-container .slider-item button{
                font-family: 'Raleway', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 22px;
                line-height: 26px;
                color: #232323;
                padding: 4px 5px;
                background: #F4DC5E;
                border-radius: 8px;
                outline: none;
                border: none;
                cursor: pointer;
                margin: 10px 0 0 0;
            }

            .item-new-img{
                padding: 0 0 15px;
            }



        </style>

        <div class="new-items-container">

            <swiper-container class="mySwiper-news" pagination="false" pagination-clickable="false" slides-per-view="4"
                              space-between="30" centered-slides="true">
                @for($i=0;$i<10;$i++)
                <swiper-slide>

                    <div class="slider-item">
                        <img class="wishlist" src="{{ asset('public/images/web-site_icons/wishlist.svg') }}" alt="wishlist">

                        <div class="item-new-img">
                            <a href="">
                                <img src="{{ asset('public/images/items/Chaos Daemons Slaanesh Keeper of Secrets_clear-min.png') }}" alt="">
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

            <style>
                .new-items-container{
                    position: relative;
                }
                .slider__navigation{
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    width: 100%;
                }
                .swiper-button-next:after, .swiper-rtl .swiper-button-prev:after, .swiper-button-prev:after, .swiper-rtl .swiper-button-next:after{
                    color: #A7A6A1;
                }

                .category-item a{
                    font-family: 'Raleway', sans-serif;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 16px;
                    line-height: 19px;
                    color: #F4DC5E;
                    text-decoration: none;
                }

            </style>



            <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper(".mySwiper-news", {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        2560:{
                            slidesPerView: 5,
                        },
                        1440:{
                            slidesPerView: 4
                        },
                        1024: {
                            slidesPerView: 3
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        425: {
                            slidesPerView: 1,
                        },
                        375: {
                            slidesPerView: 1,
                        },
                        320: {
                            slidesPerView: 1,
                        }
                    }
                });
                swiper.pagination.destroy(); // удаляем пагинацию
                swiper.pagination.el.remove(); // удаляем элемент пагинации из DOM
            </script>
        </div>

    </div>
</section>
