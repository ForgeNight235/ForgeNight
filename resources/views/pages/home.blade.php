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
                            <div class="swiper-scrollbar"></div>
                            <div class="swiper-wrapper">

                                <div class="swiper-slide"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, deleniti eligendi nobis obcaecati recusandae soluta?</p></div>
                                <div class="swiper-slide"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dicta dolores, inventore mollitia possimus suscipit!</p></div>
                                <div class="swiper-slide"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, quibusdam!</p></div>

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
            },
            // touchEventsTarget: 'wrapper', // Отключаем горизонтальный скролл для сенсорных устройств
            // allowTouchMove: false, /* добавьте это свойство, чтобы отключить горизонтальный скролл */
        });
    </script>

    <style>
        .main-screen-banner .swiper-scrollbar{
            background: #232323;
            width: 9px;
            z-index: 1;
        }
        .main-screen-banner .swiper-scrollbar .swiper-scrollbar-drag{
            background: linear-gradient(180deg, #DF7A03 0%, rgba(142, 142, 142, 0) 100%);
            z-index: 2000000;
        }

        .main-screen-banner .swiper.mySwiper-main{
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .main-screen-banner .swiper.mySwiper-main .swiper-scrollbar{
            left: 0;
        }

        .main-screen-banner .swiper {
            width: 100%;
            height: 100%;
        }

        .main-screen-banner{
            /*overflow-x: hidden;*/
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

        .main-screen-banner .swiper-wrapper{
            max-height: 225px;
            min-height: 150px;
            width: 100%;
            height: 100%;
            padding: 0 0 0 20px;
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
