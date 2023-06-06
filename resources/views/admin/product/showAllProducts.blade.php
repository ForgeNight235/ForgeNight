@extends('layouts.layout')

@section('title', 'Изменение товаров')

@section('content')
    <section class="account">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('account.account') }}">
                    <p>личный кабинет</p>
                </a>

                <a href="{{ route('admin.index') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>админ панель</p>
                </a>

                <a href="{{ route('admin.showAllProducts') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>товары</p>
                </a>

            </div>

            <div class="section-article">
                <h1>
                    @if(request()->has('searchRequest'))
                        @if($products->isEmpty())
                            Редактирование товаров
                        @else
                            Запрос "{{ request('searchRequest') }}"
                        @endif
                    @else
                        Редактирование товаров
                    @endif
                </h1>
            </div>

            <div class="account-content">
                <aside>
                    <div class="aside-article">
                        <a href="{{ route('account.account') }}">
                            <img
                                src="{{ auth()->user()->avatarUrl() }}"
                                alt="{{ auth()->user()->login }}"
                                class="avatar"
                            >
                            <p>{{ auth()->user()->login }}</p>
                        </a>
                        <a href="{{ route('account.account') }}">
                            <h2>Личные данные</h2>
                        </a>

                        <a href="{{ route('account.accountAddresses') }}">
                            <h2>Адресная книга</h2>
                        </a>

                        <a href="{{ route('account.accountOrders') }}">
                            <h2>История заказов</h2>
                        </a>

                        <a href="{{ route('account.account') }}">
                            <h2>Смена пароля</h2>
                        </a>
                        @if(auth()->user()->role==='admin')
                            <a href="">
                                <h2 class="chosen">Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                @if(session('success'))
                    <div class="success-form show" id="success-message">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="item-container">

                    <form
                        action="{{ route('admin.showAllProducts') }}"
                        method="GET"
                        class="adminSearch"
                    >
                        <input
                            type="search"
                            placeholder="поиск по товарам..."
                            name="adminSearchRequest"
                            value="{{ old('adminSearchRequest') }}"
                        >
                        <div class="search-btn">
                            <button>
                                <img src="{{ asset('images/web-site_icons/search.svg') }}" alt="search">
                            </button>
                        </div>
                    </form>

                    @if(request()->get('adminSearchRequest'))
                        <a href="{{ route('admin.showAllProducts') }}">
                            Сбросить фильтр
                        </a>
                    @endif

                    @if(request()->has('adminSearchRequest'))
                        @if($products->isEmpty())
                            <h4>Товаров по запросу "{{ request('adminSearchRequest') }}" не найдено</h4>
                        @endif
                    @endif

                    @if($products->count())

                        <div class="items admin">
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


                                    <a href="{{ route('admin.updateProduct', $product) }}">
                                        <button>
                                            изменить
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
    </section>
@endsection
