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


        </style>

        <div class="new-items-container">

            <swiper-container class="mySwiper-news" pagination="false" pagination-clickable="false" slides-per-view="4"
                              space-between="30" centered-slides="true">
                @for($i=0;$i<10;$i++)
                <swiper-slide>

                    <div class="slider-item">
                        <img class="wishlist" src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">

                        <div class="item-new-img">
                            <img src="{{ asset('images/items/Chaos Daemons Slaanesh Keeper of Secrets_clear-min.png') }}" alt="">
                        </div>

                        <h1>Slaanesh Keeper of Secrets</h1>

                        <h3 class="category-item">warhammer 40 000</h3>

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
                });
                swiper.pagination.destroy(); // удаляем пагинацию
                swiper.pagination.el.remove(); // удаляем элемент пагинации из DOM
            </script>
        </div>

    </div>
</section>
