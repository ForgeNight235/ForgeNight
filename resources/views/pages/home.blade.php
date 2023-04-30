@extends('layouts.layout')

@section('title', 'Главная страница')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
        <div class="main-screen-banner">
            <div class="container">
                <div class="slide-text">
                    <h2>Студия 3-D печати</h2>
                    <h5>
                        ForgeNight — это творчество и индивидуальность в каждой миниатюре
                    </h5>

                    <div class="main-screen-banner">
                        <div class="swiper mySwiper-main">
{{--                            <div class="slider__scrollbar-buttons">--}}
                                <div class="swiper-scrollbar"></div>
{{--                                <div class="slider__navigation">--}}
                                    <div class="swiper-button-next"></div>
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <p>Теперь взор магистра войны обратился на Терру — Тронный мир и средоточие власти его отца.
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p>
                                        Битва за галактику продолжается! Новые модели ереси Хоруса уже скоро в продаже! Следите за обновлениями в магазине миниатюр ForgeNight.
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p>
                                        Заключительный этап работы над Детьми Императора! Уникальные миниатюры Warhammer 3D скоро в продаже! Следите за обновлениями.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <a href="/catalog"><button>Перейти к каталогу</button></a>
                </div>
                <div class="slide-img">
                    <img src="{{ asset('images\main-slider\slide1.png') }}" alt="">
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>
        var swiper = new Swiper(".mySwiper-main", {
            direction: "vertical",
            slidesPerView: 1,
            spaceBetween: 30,
            mousewheel: true,
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: false,
                dragPosition: 1
            },
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
            },
            // touchEventsTarget: 'wrapper', // Отключаем горизонтальный скролл для сенсорных устройств
            // allowTouchMove: false, /* добавьте это свойство, чтобы отключить горизонтальный скролл */
        });
    </script>

    <style>
        .main-screen-banner .slider__navigation .swiper-button-next{
            position: relative;
            /* top: auto; */
            bottom: auto;
            left: 0;
            right: auto;
        }

        .main-screen-banner .slider__navigation{
            width: fit-content;
            height: fit-content;
            margin: auto auto 0;
        }

        .main-screen-banner .swiper-scrollbar
        {
            background: #232323;
            width: 9px;
            z-index: 1;
            left: 10px;
            height: calc(85% - 2 * var(--swiper-scrollbar-sides-offset,1%));
        }
        .main-screen-banner .swiper-scrollbar .swiper-scrollbar-drag{
            background: linear-gradient(180deg, #DF7A03 100%, rgba(142, 142, 142, 0) 100%);
            height: auto;
            width: auto !important;
        }

        .main-screen-banner .swiper.mySwiper-main{
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .main-screen-banner .swiper.mySwiper-main .swiper-scrollbar{
            left: 10px;
            height: calc(85% - 2 * var(--swiper-scrollbar-sides-offset,1%));
        }

        .main-screen-banner .swiper {
            width: 100%;
            height: 100%;
        }

        .main-screen-banner .swiper-slide {
            max-height: 225px;
            min-height: 150px;
            display: flex;
            justify-content: center;
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 29px;
            color: #232323;
        }

        .main-screen-banner .swiper-slide p{
            display: flex;
            align-items: center;
        }

        .main-screen-banner .swiper-wrapper{
            max-height: 225px;
            min-height: 150px;
            width: 100%;
            height: 100%;
            padding: 0 0 0 20px;
        }

        .main-screen-banner .swiper-button-next{
            left: 0;
            transform: rotate(90deg);
            bottom: 0;
            top: auto;
            width: 24px;
            height: fit-content;
        }
        .main-screen-banner .swiper-button-next:after, .swiper-rtl .swiper-button-prev:after{
            font-weight: 900;
            font-size: 24px;
            color: #DF7A03;
        }

    </style>



    <div class="container">
        <div class="img-links">
            <div class="link">
                <a href="/pre-catalog">
                    <img src="{{ asset('images/img-links/order.png') }}" alt="order">
                </a>
            </div>
            <div class="link">
                <a href="/gallery">
                    <img src="{{ asset(asset('images/img-links/gallery.png')) }}" alt="gallery">
                </a>
            </div>
            <div class="link">
                <a href="/catalog">
                    <img src="{{ asset('images/img-links/catalog.png') }}" alt="catalog">
                </a>
            </div>
        </div>
    </div>


    @include('components.new-items')

    @include('components.sales')

    @include('components.news')

    @include('components.subscribe')
@endsection
