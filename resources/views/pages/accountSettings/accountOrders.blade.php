@extends('layouts.layout')

<script src="{{ asset('js/accountPage/reviewNotificator.js') }}" defer></script>

@section('meta-description', 'Магазин 3D-печатных моделей ForgeNight. Добро пожаловать в наш магазин 3D-печатных моделей ForgeNight! Мы специализируемся на производстве и продаже высококачественных моделей для любителей варгеймов и настольных игр, особенно во вселенной Warhammer 40 000. Наша продукция отличается уникальной детализацией и высокой прочностью благодаря использованию SLA-печати с использованием смолы Anycubic. Приобретайте модели высокого качества для воплощения своих игровых сценариев.')
@section('title', 'История заказов')

@section('content')

    <section class="account orders">
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
                    История заказов
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
                            <h2 class="chosen">История заказов</h2>
                        </a>

                        <a href="{{ route('account.accountPassword') }}">
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
                                            <p>
                                                {{ $order->status }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="order-items" style="display: none;">
                                        @foreach($order->products as $product)
                                            <div class="order-item">
                                                <div class="product-details">
                                                    <a href="{{ route('product.show', $product->product) }}" target="_blank" class="item-img">
{{--                                                    <a href="{{ route('product.show', $product->id, $product->name) }}" class="item-img">--}}
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
                                                        <p class="center">{{ $product->quantity }}</p>
{{--                                                        <p class="center">{{ $order->products->OrderProduct->quantity }}</p>--}}
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
                                {{ $orders->links() }}
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
