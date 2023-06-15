@extends('layouts.layout')

@section('title', 'Доставка')

@section('meta-description', 'Узнайте о наших услугах доставки. Мы тесно сотрудничаем с Почтой России и отправляем доставки этой службой.')

@section('content')
    <section class="delivery">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('page.delivery') }}">
                    <p>доставка</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Доставка магазина
                </h1>
            </div>

            <div class="text">
                <p>
                <p>Мы тесно сотрудничаем с Почтой России и отправляем доставки этой службой.
                    <br>Гарантируем надежную и быструю доставку вашего заказа, чтобы вы получили его вовремя и в отличном состоянии.
                <br><br>
                    Все наши отправления надежно упаковываются в пупырчатую пленку и картон для средних и больших посылок. Для маленьких посылок мы используем небольшие пакеты отправки Почты России. Сами изделия надежно оборачиваем пленкой.
                    <br><br>
                    Мы гарантируем надежную упаковку.
                </p>

                </p>
            </div>

        </div>
    </section>
@endsection
