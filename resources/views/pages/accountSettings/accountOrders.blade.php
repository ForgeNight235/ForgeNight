@extends('layouts.layout')

<script src="{{ asset('js/accountPage/showAllProductsInOrder.js') }}" defer></script>
<script src="{{ asset('js/accountPage/reviewNotificator.js') }}" defer></script>


@section('title', 'История заказов')

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

                <div class="account__personal__data">

                    <style>
                        .account__personal__data {
                            width: 100%;
                        }

                        .account__personal__data .orders .order {
                            margin-bottom: 45px;
                        }

                        .account__personal__data .order__header .order__header-container {
                            display: flex;
                            justify-content: space-between;
                            background: rgba(244, 220, 94, 0.5);
                            border-radius: 20px;
                            padding: 12px 20px;
                        }

                        .account__personal__data .order__header .element {
                            font-family: 'Century Gothic', sans-serif;
                            font-size: 16px;
                            line-height: 20px;
                            color: #232323;
                            font-weight: 400;
                        }

                        .account__personal__data .order__header {
                            margin: 0 0 20px 0;
                        }

                        .account__personal__data .underline {
                            border-bottom: 1px solid #232323;
                        }

                        .account__personal__data .orders .order__alert {
                            font-family: 'Century Gothic', sans-serif;
                            font-size: 16px;
                            line-height: 20px;
                            color: #232323;
                            padding: 42px 0 32px;
                        }

                        .account__personal__data .orders a {
                            padding: 16px 34px;
                            background: #F4DC5E;
                            border-radius: 20px;
                            font-family: 'Century Gothic', sans-serif;
                            font-size: 24px;
                            line-height: 29px;
                            color: #232323;
                            text-decoration: none;
                        }

                        .account__personal__data .orders .order {
                            border: solid 1px #d2d2d2;
                            border-radius: 4px;
                            background: #fafafa;
                        }

                        .account__personal__data .orders .order .order-header {
                            display: flex;
                            justify-content: space-between;
                        }

                        .account__personal__data .orders .order .order-header button,
                        .account__personal__data .orders .order .order-header .order-status {
                            padding: 6px;
                            --size: 40px;
                            height: var(--size);
                        }

                        .account__personal__data .orders .order .order-header button {
                            border: 1px solid #a8a8a8;
                            border-radius: 4px;
                        }

                        .account__personal__data .orders .order .order-header button.btn-primary {
                            background: orange;
                            border: none;
                        }

                        .account__personal__data .orders .order .order-header .promocode span {

                            height: fit-content;
                        }

                        .account__personal__data .orders .order .order-header .order-status {
                            background: #9FC061;
                            border-radius: 4px;
                            color: #f2f2f2;
                            padding: 6px 12px;
                        }

                        .account__personal__data .orders .order .order-header {
                            padding: 15px 20px;
                        }

                        .account__personal__data .orders .order .order-footer {
                            background: #f2f2f2;
                            padding: 15px 20px;
                            display: flex;
                            justify-content: space-between;
                        }

                        .account__personal__data .orders .order .order-items {
                            padding: 15px 20px;
                            background: #f2f2f2;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details {
                            border: 1px solid #bbb;
                            padding: 10px;
                            background: #fff;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details img.product__img {
                            width: 100px;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details a.item-img {
                            padding: 0;
                            background: transparent;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details {
                            display: grid;
                            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
                            gap: 15px;
                            /*display: flex;*/
                            /*gap: 50px;*/
                            /*justify-content: space-between;*/
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details.delivery {
                            display: grid;
                            grid-template-columns: 1fr 1fr 2fr 1fr;
                            gap: 15px;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details .article {
                            display: grid;
                            height: fit-content;
                            margin: auto auto auto 0;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details .article span {
                            font-weight: 400;
                            font-size: 14px;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details .article p {
                            margin: 0;
                            padding: 0;
                            font-weight: 600;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details .article p.center {
                            text-align: center;
                            white-space: nowrap;
                        }

                        .account__personal__data .orders .order .order-items .order-item .product-details .article a.track,
                        .account__personal__data .orders .order .order-footer .article a.track {
                            padding: 0;
                            margin: 0;
                            background: transparent;
                            cursor: pointer;
                            font-size: 14px;
                            text-decoration: underline;
                        }

                        .account__personal__data .orders .order .order-footer .article {
                            display: grid;
                        }

                        .account__personal__data .orders .order .order-footer .article p {
                            margin: 0;
                            padding: 0;
                            background: transparent;
                        }

                        .account__personal__data .orders .order .order-footer .article p.price {
                            font-weight: 600;
                            font-size: 20px;
                            font-family: 'Century Gothic', sans-serif;
                        }

                    </style>

                    <div class="order__header">
                        <div class="order__header-container">
                            <div class="element">№ Заказа</div>
                            <div class="element">Отзыв</div>
                            <div class="element">Товары</div>
                            <div class="element">Статус</div>
                        </div>
                        <div class="underline"></div>
                    </div>

                    <div class="orders">
                        @if($orders->isEmpty())
                            <div class="order__alert">
                                <p>Вы ещё не совершали покупок в нашем магазине</p>
                            </div>

                            <a href="{{ route('account.catalog') }}">перейти в каталог</a>

                        @else
                            @foreach($orders as $order)
                                <div class="order">
                                    <div class="order-header">
                                        <div class="article">
                                            <h3>
                                                Заказ № {{ $order->id }}
                                            </h3>
                                            <span>Оформлен: {{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</span>
                                        </div>

                                        <div class="promocode">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                  data-bs-trigger="hover focus"
                                                  data-bs-content="Пишите отзывы на товары, чтобы получить специальные скидочные промокоды!
                                                  Промокоды действуют на все виды продукции магазина.">
                                                <button class="btn btn-primary" type="button" disabled>
                                              <p>Оставить отзыв</p>
                                                </button>
                                            </span>

                                        </div>

                                        <button>{{ $order->products->count() }} Показать товары</button>

                                        <div class="order-status">
                                            {{ $order->status }}
                                        </div>
                                    </div>

                                    <div class="order-items" style="display: none;">
                                        @foreach($order->products as $product)
                                            <div class="order-item">
                                                <div class="product-details">
                                                    <a href="" class="item-img">
                                                        <img
                                                            src="{{ $product->product->images()->first()->path() }}"
                                                            alt="{{ $product->product->name }}"
                                                            class="product__img"
                                                        >
                                                    </a>
                                                    <div class="article">
                                                        <span>Название</span>
                                                        <p>{{ $product->product->name }}</p>
                                                        <span>Id товара: {{ $product->product->id }}</span>
                                                    </div>

                                                    <div class="article">
                                                        <span>Количество</span>
                                                        <p class="center">{{ $product->product->quantity }}</p>
                                                    </div>

                                                    <div class="article">
                                                        <span>Цена за шт.</span>
                                                        <p class="center">{{ $product->product->price() }}</p>
                                                    </div>

                                                    <div class="article">
                                                        <span>Итого</span>
                                                        <p class="center">{{ $product->totalProductPrice() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="order-item">
                                            <div class="product-details delivery">
                                                <a href="https://www.pochta.ru/tracking" target="_blank"
                                                   class="item-img">
                                                    <img
                                                        src="{{ asset('images/delivery/1200px-Russian_Post.webp') }}"
                                                        alt="{{ $order->delivery->DeliveryOption->name }}"
                                                        class="product__img"
                                                        title="Доставка {{ $order->delivery->DeliveryOption->name }}"
                                                    >
                                                </a>

                                                <div class="article">
                                                    <span>Доставка</span>
                                                    <p>{{ $order->delivery->DeliveryOption->name }}</p>
                                                    <span>Трек-код:
                                                        @if($order->delivery->DeliveryOption->name === 'Почта России')
                                                            <a href="https://www.pochta.ru/tracking?barcode={{ $order->delivery->track_code }}"
                                                               class="track"
                                                               target="_blank">{{ $order->delivery->track_code }}</a>
                                                        @else
                                                            <p>{{ $order->delivery->track_code }}</p>
                                                        @endif
                                                        </span>
                                                </div>

                                                <div class="article">
                                                    <span>Адрес доставки</span>
                                                    <span>Россия, {{ $order->user->index }}, {{ $order->user->city }}, {{ $order->user->address }}</span>
                                                </div>

                                                <div class="article">
                                                    <span>Итого</span>
                                                    <p class="center">{{ $order->delivery->deliveryPrice() }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="order-footer">
                                        <div class="article">
                                            @if($order->delivery)
                                                <p>Доставка:
                                                    <br> {{ $order->delivery->deliveryOption->name ?? 'Без доставки' }}
                                                </p>
                                            @else
                                                <p>Доставка: Без доставки</p>
                                            @endif
                                        </div>

                                        <div class="article">
                                            <p>Трек-код:</p>
                                            @if($order->delivery)
                                                @if($order->delivery->DeliveryOption->name === 'Почта России')
                                                    <a href="https://www.pochta.ru/tracking?barcode={{ $order->delivery->track_code }}"
                                                       class="track"
                                                       target="_blank">{{ $order->delivery->track_code }}</a>
                                                    <span>отследить</span>
                                                @else
                                                    <p>{{ $order->delivery->track_code }}</p>
                                                @endif
                                            @else
                                                <p>Не отправлен</p>
                                            @endif
                                        </div>

                                        <div class="article">
                                            <p>Итого</p>
                                            <p class="price">
                                                {{ $order->priceWithDelivery() }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endif

                        <style>
                            .order-items {
                                /*display: none;*/
                            }
                        </style>

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
