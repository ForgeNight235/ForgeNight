@extends('layouts.layout')

@section('title', 'Админ панель')

@section('content')
    <section class="account admin">
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
            </div>

            <div class="section-article">
                <h1>
                    Админ панель
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

                        <a href="{{ route('account.accountPassword') }}">
                            <h2>Смена пароля</h2>
                        </a>

                        @if(auth()->user()->role==='admin')
                            <a href="{{  route('admin.index') }}">
                                <h2 class="chosen">Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <div class="admin-options">
                    <div class="option__selector">

                        <div class="option__selector__block">
                            <h3>Управление товарами</h3>
                            <div class="selections">
                                <a href="{{ route('admin.createProduct') }}">
                                    <button class="btn btn-primary">Добавить товар</button>
                                </a>
                                <a href="{{ route('admin.showAllProducts') }}">
                                    <button class="btn btn-primary">Товары</button>
                                </a>
                                <a href="{{ route('admin.collectionPage') }}">
                                    <button class="btn btn-primary">
                                        Категории
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="option__selector__block">
                        <div class="option__selector__block">
                            <h3>Управление заказами</h3>
                            <div class="selections">
                                <a href="{{ route('admin.allOrders') }}">
                                    <button class="btn btn-primary">Заказы</button>
                                </a>
                            </div>
                        </div>

                        <div class="option__selector__block">
                            <h3>Пользователи</h3>
                            <div class="selections">
                                <a href="{{ route('admin.allUsers') }}">
                                    <button class="btn btn-primary">Список пользователей</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
