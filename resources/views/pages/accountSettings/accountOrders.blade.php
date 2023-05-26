@extends('layouts.layout')

@section('title', 'История заказов')

@section('content')

    <script src="{{ asset('public/js/accountPage/imagePreview.js') }}"></script>


    <section class="account">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">


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
                            <h2>Адресная книга</h2>
                        </a>

                        <a href="{{ route('account.accountOrders') }}">
                            <h2 class="chosen">История заказов</h2>
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



                </div>

            </div>
        </div>
    </section>
@endsection
