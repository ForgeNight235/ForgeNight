@extends('layouts.layout')

@section('title', 'Каталог магазина')

@section('content')
    <script src="{{ asset('public/js/catalogFilterModal.js') }}" defer></script>
    <section class="catalog">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>каталог</p>

                    <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>warhammer 40 000</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Warhammer 40 000
                </h1>
                <p>12 товар(ов) найдено</p>
            </div>

            <div class="filter_modal-btn">
                <button>
                    <p>фильтр</p>
                    <img src="{{ asset('public/images/web-site_icons/filter.webp') }}" alt="filter">

                </button>
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

                <div class="filters_modal">
                    <div class="filters_modal-container">
                        <button class="modalClose">
                            <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                            <p>вернуться к товарам</p>
                        </button>
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

                </div>


                <div class="items">
                    @for($i=0;$i<12;$i++)
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

        </style>
    </section>

    @include('components.bestBuysByCategory')

@endsection
