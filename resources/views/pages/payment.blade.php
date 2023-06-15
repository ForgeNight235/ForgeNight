@extends('layouts.layout')

@section('title', 'Доставка')

@section('meta-description', 'Информация о способе оплаты')

@section('content')
    <section class="payment">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('page.faq') }}">
                    <p>оплата</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Оплата
                </h1>
            </div>

            <div class="text">
                <p>Для оформления заказа в нашем магазине, оплата осуществляется переводом на карту.
                    <br><br>
                    Вся необходимая информация и инструкции по оплате будут направлены вам на указанный электронный адрес.
                    <br><br>
                    После оплаты, наш администратор свяжется с вами для уточнения деталей заказа и подтверждения его оформления.
                    <br><br>
                    Благодарим вас за покупку в нашем магазине!
                </p>
            </div>

        </div>
    </section>
@endsection
