<section id="sales">
    <div class="container">
        <div class="section-article">
            <h1>
                Скидки
            </h1>
            <a href="/catalog">посмотреть все</a>
        </div>

        <div class="sale-items-container">
            <div class="swiper-scrollbar-sales"></div>
            <div class="swiper mySwiper-sales">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="slider_img">
                            <img src="images/items/Kratos Heavy Assault Tank_clear.png"
                                 alt="Kratos Heavy Assault Tank"
                                 title="Kratos Heavy Assault Tank">
                        </div>
                        <div class="slider_info">
                            <div class="slider_info-article">
                                <h1>Kratos Heavy Assault Tank</h1>
                            </div>
                            <div class="slider_info-price">
                                <p class="old_price">
                                    4500
                                </p>
                                <p class="new_price">
                                    4050
                                </p>
                            </div>
                            <a href="?add-to-cart"><button>добавить в корзину</button></a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="slider_img">
                            <img src="images/items/Emperor's Children Sorcerer in Terminator Armour_clear.png"
                                 alt="Emperor's Children Sorcerer in Terminator Armour"
                                 title="Emperor's Children Sorcerer in Terminator Armour">
                        </div>
                        <div class="slider_info">
                            <div class="slider_info-article">
                                <h1>Emperor's Children Sorcerer in Terminator Armour</h1>
                            </div>
                            <div class="slider_info-price">
                                <p class="old_price">
                                    750
                                </p>
                                <p class="new_price">
                                    675
                                </p>
                            </div>
                            <a href="?add-to-cart"><button>добавить в корзину</button></a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="slider_img">
                            <img src="images/items/Emperor's Children Master of Possession_clear.png"
                                 alt="Emperor's Children Master of Possession"
                                 title="Emperor's Children Master of Possession">
                        </div>
                        <div class="slider_info">
                            <div class="slider_info-article">
                                <h1>Emperor's Children Master of Possession</h1>
                            </div>
                            <div class="slider_info-price">
                                <p class="old_price">
                                    750
                                </p>
                                <p class="new_price">
                                    675
                                </p>
                            </div>
                            <a href="?add-to-cart"><button>добавить в корзину</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper(".mySwiper-sales", {
                    slidesPerView: 1,
                    scrollbar: {
                        el: ".swiper-scrollbar-sales",
                        hide: false,
                    },
                });
            </script>

            <style>
                .sale-items-container {
                    position: relative;
                    height: 100%;
                }

                .sale-items-container .swiper-scrollbar-sales{
                    min-width: 250px;
                    max-width: 500px;
                    background: #232323;
                    height: 3px;
                    margin: 0 0 0 auto;
                }
                .sale-items-container .swiper-scrollbar-drag {
                    width: calc(100% / var(--swiper-pagination-total));
                    background: linear-gradient(180deg, #DF7A03 100%, rgba(142, 142, 142, 0) 100%);
                    height: 3px;
                }

                .sale-items-container .swiper-scrollbar .swiper-scrollbar-sales-drag{
                    background: linear-gradient(180deg, #DF7A03 0%, rgba(142, 142, 142, 0) 100%);
                }

                .sale-items-container .swiper {
                    width: 100%;
                    height: 100%;
                }
                .sale-items-container .slider_info{
                    display: grid;
                    gap: 18px;
                }

                .sale-items-container .slider_info button{
                    background: #F4DC5E;
                    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
                    border-radius: 20px;
                    padding: 18px 10px;
                    border: none;
                    margin: 0 4px 0 auto;
                    cursor: pointer;
                    font-family: 'Century Gothic',sans-serif;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 28px;
                    line-height: 34px;

                    color: #000000;
                }

                .sale-items-container .slider_info a{
                    width: fit-content;
                    margin: 0 0 0 auto;
                }

                .sale-items-container .slider_info-price{
                    display: grid;
                    gap: 18px;
                    text-align: left;
                }
                .sale-items-container .old_price{
                    font-family: 'Century Gothic', sans-serif;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 30px;
                    line-height: 37px;
                    text-decoration-line: line-through;

                    color: #232323;

                }
                .sale-items-container .new_price{
                    font-family: 'Century Gothic', sans-serif;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 50px;
                    line-height: 61px;
                    color: #232323;
                }

                .sale-items-container .swiper-slide {
                    width: 100%;
                    text-align: center;
                    font-size: 18px;
                    background: #fff;
                    display: flex;
                    gap: 90px;
                    justify-content: center;
                    align-items: center;
                    background: none;
                    padding: 15px 0;
                }

                .sale-items-container .swiper-slide .slider_info-article h1{
                    font-family: 'Century Gothic', sans-serif;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 40px;
                    line-height: 49px;
                    text-align: left;
                    color: #232323;

                    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                }


                .sale-items-container .swiper-slide img {
                    display: block;
                    max-width: 450px;
                    max-height: 350px;
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                    padding: 25px;
                    border: 2px solid #232323;
                    border-radius: 20px;
                }

                @media screen and (max-width: 425px){
                    .sale-items-container .swiper-slide{
                        display: grid;
                    }
                }
            </style>
        </div>

    </div>
</section>
