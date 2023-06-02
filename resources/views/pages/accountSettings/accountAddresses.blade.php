@extends('layouts.layout')

@section('content')

    <script src="{{ asset('js/accountPage/imagePreview.js') }}"></script>


    <section class="account">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">


                </a>
                <a href="{{ route('account.account') }}">
                    <p>личный кабинет</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Личный кабинет
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

                        <a href="{{ route('account.account') }}">
                            <h2 class="chosen">Адресная книга</h2>
                        </a>

                        <a href="{{ route('account.accountOrders') }}">
                            <h2>История заказов</h2>
                        </a>

                        <a href="{{ route('account.account') }}">
                            <h2>Смена пароля</h2>
                        </a>
                        @if(auth()->user()->role==='admin')
                            <a href="{{  route('admin.index') }}">
                                <h2>Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <style>
                    body{
                        display: grid;
                        height: 100vh;
                    }
                </style>

                <div class="account__personal__data">

                    <form
                        action="{{ route('account.updateUserAddress') }}"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="account__box">
                            <label for="address">Почтовый адрес*</label>
                            <input name="address" type="text" value="{{ auth()->user()->address }}"  placeholder="Ул. Бумажная 1а" id="address">
                            <div class="error-form">
                                <p>@error('address') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="city">Город*</label>
                            <input name="city" type="text" value="{{ auth()->user()->city }}"  placeholder="Москва" id="city">
                            <div class="error-form">
                                <p>@error('city') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="index">Почтовый индекс*</label>
                            <input name="index" type="number" value="{{ auth()->user()->index }}" id="index" placeholder="308004">
                            <div class="error-form">
                                <p>@error('index') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <button type="submit">Обновить данные</button>
                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection
