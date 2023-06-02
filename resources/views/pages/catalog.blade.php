@extends('layouts.layout')

@section('title', 'Каталог магазина')

@section('content')
    <script src="{{ asset('js/catalogFilterModal.js') }}" defer></script>
    <section class="catalog">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                </a>
                <a href="{{ route('page.catalog') }}">
                    <p>каталог</p>
                </a>
                @if($collection)
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <a href="{{ route('page.catalog', ['collection' => $collection->id]) }}">
                        {{ $collection->name }}
                    </a>
                @else
                @endif

            </div>

            <div class="section-article">
                <h1>
                    @if($collection)
                        {{ $collection->name }}
                    @else
                        Все товары
                    @endif
                </h1>
{{--                Изменить количество вывода. Надо считать все товары которые есть, а не только то что выводится--}}
                <p>{{ $products->count() }} товар(ов) найдено</p>
            </div>

            <div class="filter_modal-btn">
                <button>
                    <p>фильтр</p>
                    <img src="{{ asset('images/web-site_icons/filter.webp') }}" alt="filter">

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
                                        @foreach($collections as $collection)
                                            <a href="?collection={{$collection->id}}">{{ $collection->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(request()->get('collection'))
                            <a href="{{ route('page.catalog') }}" class="clear">очистить фильтр</a>
                        @endif
                    </div>
                </div>

                <div class="filters_modal">
                    <div class="filters_modal-container">
                        <button class="modalClose">
                            <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
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
                                            @foreach($collections as $collection)
                                                <a href="?category={{$collection->id}}">{{ $collection->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(request()->get('collection'))
                                <a href="{{ route('page.catalog') }}" class="clear">очистить фильтр</a>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="item-container">
                    @if($products->count())

                        <div class="items">
                            @foreach($products as $product)
                                <div class="slider-item">
                                    <button class="wishlist">
                                        <img class="wishlist"
                                             src="{{ asset('images/web-site_icons/wishlist.svg') }}"
                                             alt="wishlist">
                                    </button>

                                    <div class="item-new-img">
                                        <a href="{{ route('product.show', $product) }}">

                                            @if($product->images()->count() > 0)
                                                <img src="{{ $product->images()->first()->path() }}"
                                                     alt="{{ $product->name }}">
                                            @endif

                                        </a>
                                    </div>

                                    <h1><a href="{{ route('product.show', $product) }}">{{ $product->name }}</a></h1>


                                    <a href="?collection={{ $product->collection_id }}" class="category">
                                        {{ $product->category->name }}
                                    </a>


                                    <a href="{{ route('product.addToCart', $product) }}">
                                        <button>
                                            {{ $product->price() }}
                                            <img src="{{asset('images/web-site_icons/addToCart.webp')}}"
                                                 alt="buy">
                                        </button>
                                    </a>

                                </div>
                            @endforeach

                            @else
                                <h4>На данный момент нет товаров выбранной категории</h4>
                            @endif
                        </div>
                        <div class="pagination">
                            {{ $products->links() }}

                        </div>
                </div>


            </div>

        </div>

        <style>

        </style>
    </section>

    @include('components.bestBuysByCategory')

@endsection
