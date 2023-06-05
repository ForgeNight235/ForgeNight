@extends('layouts.layout')

@section('title', 'Главная страница')

@section('content')
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js') }}"></script>
    <div class="main-screen-banner">
        <div class="container">
            <div class="slide-text">
                <h2>Студия 3-D печати</h2>
                <h3>
                    ForgeNight — это творчество и индивидуальность в каждой миниатюре
                </h3>

                <div class="main-screen-banner">
                    <div class="swiper mySwiper-main">
                        <div class="swiper-scrollbar"></div>
                        <div class="swiper-button-next"></div>


                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <p>Теперь взор магистра войны обратился на Терру — Тронный мир и средоточие власти его
                                    отца.
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <p>
                                    Битва за галактику продолжается! Новые модели ереси Хоруса уже скоро в продаже!
                                    Следите за обновлениями в магазине миниатюр ForgeNight.
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <p>
                                    Заключительный этап работы над Детьми Императора! Уникальные миниатюры Warhammer 3D
                                    скоро в продаже! Следите за обновлениями.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <a href="{{ route('page.pre-catalog') }}">
                    <button>Перейти к каталогу</button>
                </a>
            </div>
            <div class="slide-img">
                <img src="{{ asset('images\main-slider\slide1.webp') }}" alt="slide">
            </div>
        </div>
    </div>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js') }}" defer></script>
    <script src="{{ 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js' }}" defer></script>

    <script src="{{ asset('js/mainSlider.js') }}" defer></script>





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
                <a href="{{ route('page.pre-catalog') }}">
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
