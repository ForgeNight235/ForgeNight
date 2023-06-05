@extends('layouts.layout')

<script src="{{ asset('js/accountPage/successMessage.js') }}" defer></script>
<style>
    body {
        display: grid;
        height: 100vh;
    }
</style>

@section('title', 'Смена пароля')

@section('content')

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
                    Смена пароля
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
                            <h2 class="chosen">Смена пароля</h2>
                        </a>
                        @if(auth()->user()->role==='admin')
                            <a href="{{  route('admin.index') }}">
                                <h2>Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <div class="account__personal__data">

                    <form
                        action="{{ route('account.updatePassword') }}"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="account__box">
                            <label for="password">Новый пароль</label>
                            <input name="password" type="password" value="{{ old('password') }}"
                                   placeholder="ваш новый пароль" id="password">
                            <div class="error-form">
                                <p>@error('password') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="repeatPassword">Повторите пароль</label>
                            <input name="repeatPassword" type="password" value="{{ old('repeatPassword') }}"
                                   placeholder="повторите новый пароль" id="repeatPassword">
                            <div class="error-form">
                                <p>@error('repeatPassword') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="success-form show" id="success-message">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif

                        <button type="submit">Обновить данные</button>

                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection
