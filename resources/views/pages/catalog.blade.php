@extends('layouts.layout')

@section('title', 'Каталог магазина')

@section('content')
    <section class="catalog">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>каталог</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Warhammer 40 000
                </h1>
                <p>9 товар(ов) найдено</p>
            </div>

            <div class="catalog-container">
                <div class="filters">
                    <div class="filter">
                        <h3>
                            Фильтры
                        </h3>
                        <span>Сортировать по:</span>
                        <select name="" id="">
                            <option value="">новизне</option>
                            <option value="">по возрастанию</option>
                            <option value="">по убыванию</option>
                        </select>
                    </div>

                    <div class="filter">

                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseOne">
                                        Фракции
                                    </button>
                                </h4>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingOne">
                                    {{--                             использован id для настройки кастомного скрола от OverlayScrolls--}}
                                    <div class="accordion-body" id="my-scrollable-content">
                                        <a href="?category">warhammer 40000</a>
                                        <a href="?category">the horus heresy</a>
                                        <a href="?category">dark angels</a>
                                        <a href="?category">emperors children's</a>
                                        <a href="?category">iron warriors</a>
                                        <a href="?category">white scars</a>
                                        <a href="?category">space wolfs</a>
                                        <a href="?category">imperial fists</a>
                                        <a href="?category">night lords</a>
                                        <a href="?category">blood angels</a>
                                        <a href="?category">iron hands</a>
                                        <a href="?category">world eaters</a>
                                        <a href="?category">ultramarine's</a>
                                        <a href="?category">death guard</a>
                                        <a href="?category">thousand sons</a>
                                        <a href="?category">sons of horus/black legion</a>
                                        <a href="?category">word bearer</a>
                                        <a href="?category">salamanders</a>
                                        <a href="?category">raven guard</a>
                                        <a href="?category">alpha legion</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="clear" href="?category">очистить фильтр</a>
                    </div>
                </div>

                <div class="items">
                    @for($i=0;$i<9;$i++)
                        <div class="slider-item">
                            <img class="wishlist" src="{{ asset('public/images/web-site_icons/wishlist.svg') }}"
                                 alt="wishlist">

                            <div class="item-new-img">
                                <a href="{{ route('page.single') }}">
                                    <img
                                        src="{{ asset('public/images/items/Chaos Daemons Slaanesh Keeper of Secrets_clear-min.png') }}"
                                        alt="">
                                </a>
                            </div>

                            <h1><a href="{{ route('page.single') }}">Slaanesh Keeper of Secrets</a></h1>

                            <h3 class="category-item"><a href="">warhammer 40 000</a></h3>

                            <button>
                                2000₱
                                <img src="{{asset('public/images/web-site_icons/addToCart.webp')}}" alt="">
                            </button>
                        </div>
                    @endfor
                    <h1 style="text-align: center">Пагинация здесь</h1>
                </div>

            </div>

        </div>

        <style>
            .catalog-container {
                display: flex;
                gap: 20px;
            }

            .catalog .items {
                display: grid;
                grid-template-columns: repeat(3, auto);
                gap: 20px;
            }

            .catalog-container .os-scrollbar-track.os-scrollbar-track-off {
                background: #232323;
            }

            .catalog-container .os-scrollbar-handle {
                background: rgb(244, 220, 94) !important;
            }

            .catalog-container .accordion {
                --bs-accordion-color: none;
                --bs-accordion-bg: none;
                --bs-accordion-transition: none;
                --bs-accordion-border-color: none;
                --bs-accordion-border-width: none;
                --bs-accordion-border-radius: none;
                --bs-accordion-inner-border-radius: none;
                --bs-accordion-btn-color: none;
                --bs-accordion-btn-bg: none;
                --bs-accordion-btn-focus-border-color: none;
                --bs-accordion-btn-focus-box-shadow: none;
                --bs-accordion-active-color: none;
                --bs-accordion-active-bg: none;
            }

            .catalog-container .accordion-item {
                max-width: 300px;
            }

            .catalog-container .os-content {
                padding: 0 !important;
                display: grid;
                gap: 20px;
            }

            .catalog-container .accordion-body a, .filter a {
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 20px;
                color: #232323;
            }

            .filter .clear {
                margin: 0 auto;
                width: fit-content;
            }

            .catalog-container .accordion-body {
                display: grid;
                gap: 20px;
                max-width: 300px;
                height: 250px;
                overflow: scroll;
                overflow-x: hidden;
            }

            .catalog-container {
                color: #232323;
            }

            .catalog-container .filter {
                max-width: 300px;
                display: grid;
                gap: 13px;
            }

            .catalog-container .filter select {
                outline: none;
                cursor: pointer;
                border-radius: 20px;
                background: none;
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 20px;
                height: 40px;
                width: fit-content;
                padding: 10px 25px 10px 10px;
            }

            .catalog-container .filter option {
                background: #F4DC5E;
                cursor: pointer;
            }


            .catalog-container .filter span {
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 20px;
                line-height: 25px;
            }

            .catalog-container .filter h3, .accordion-item button {
                padding: 15px 0;
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 32px;
                line-height: 39px;
                text-transform: capitalize;
            }

            .catalog-container .filter h4 {

            }
        </style>
    </section>

    @include('components.bestBuysByCategory')

@endsection
