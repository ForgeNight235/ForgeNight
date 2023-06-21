@extends('layouts.layout')

@section('title', 'Все заказы')

@section('content')

    @if(session('success'))
        <div class="success-form show" id="success-message">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('failure'))
        <div class="success-form show" id="success-message">
            <p>{{ session('failure') }}</p>
        </div>
    @endif

    <section class="account orders admin">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                </a>
                <a href="{{ route('account.account') }}">
                    <p>личный кабинет</p>
                </a>

                <a href="{{ route('admin.index') }}">
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>админ панель</p>
                </a>

                <a href="{{ route('admin.allOrders') }}">
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>заказы</p>
                </a>
            </div>

            <div class="section-article">
                <h1>Заказы</h1>
            </div>

            <div class="account-content">
                <aside>
                    <div class="aside-article">
                        <a href="{{ route('account.account') }}">
                            <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->login }}"
                                 class="avatar">
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
                                <p>В магазине ещё не было произведено заказов :(</p>
                            </div>
                        @else
                            @foreach($orders as $order)
                                <div class="order">
                                    <div class="order-header">
                                        <div class="article">
                                            <h3>Заказ № {{ $order->id }}</h3>
                                            <span>Оформлен: {{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</span>
                                        </div>

                                        {{--                                        <div class="promocode">--}}
                                        {{--                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"--}}
                                        {{--                                                  data-bs-trigger="hover focus"--}}
                                        {{--                                                  data-bs-content="Пишите отзывы на товары, чтобы получить специальные скидочные промокоды! Промокоды действуют на все виды продукции магазина.">--}}
                                        {{--                                                <button class="btn btn-primary" type="button" disabled>--}}
                                        {{--                                                    <p>Оставить отзыв</p>--}}
                                        {{--                                                </button>--}}
                                        {{--                                            </span>--}}
                                        {{--                                        </div>--}}

                                        <button class="showHide">
                                            {{ $order->products->count() }} Товары
                                        </button>

                                        <div class="order-status">
                                            <form
                                                action="{{ route('admin.order.updateOrderStatus', ['orderId' => $order->id]) }}"
                                                method="post"
                                                id="orderStatus"
                                            >
                                                @csrf
                                                <select name="orderStatus" id="orderStatus">
                                                    @foreach($orderStatuses as $status)
                                                        <option
                                                            value="{{ $status }}"
                                                            @if($status === $order->status) selected @endif
                                                        >
                                                            {{ $status }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button type="submit">Сохранить</button>
                                                <style>
                                                    section.account.orders.admin .order-status {
                                                        display: flex;
                                                        align-items: center;
                                                    }

                                                    section.account.orders.admin .order form#orderStatus {
                                                        display: grid;
                                                        gap: 5px;
                                                        margin-top: 49px;
                                                    }

                                                    section.account.orders.admin .order form#orderStatus select {
                                                        background: transparent;
                                                        border: transparent;
                                                    }

                                                    section.account.orders.admin .order form#orderStatus button {
                                                        display: flex;
                                                        align-items: center;
                                                    }
                                                </style>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="order-items" style="display:none;">
                                        @foreach($order->products as $key => $orderProduct)

                                            <div class="order-item">
                                                <div class="product-details">
                                                    <div class="article">
                                                        <span>Название</span>
                                                        <p>{{ $orderProduct->product->name }}</p>
                                                        <span>Id товара: {{ $orderProduct->product->id }}</span>
                                                    </div>

                                                    <form
                                                        action="{{ route('admin.order.updateProductQuantity', ['orderId' => $order->id]) }}"
                                                        method="post"
                                                    >
                                                        @csrf
                                                        <input type="hidden" name="productId"
                                                               value="{{ $orderProduct->product_id }}">
                                                        <div class="article">
                                                            <label for="quantity">Количество</label>
                                                            <input type="number" id="quantity" name="quantity"
                                                                   value="{{ $orderProduct->quantity }}" min="1">
                                                        </div>
                                                        <button>
                                                            обновить
                                                        </button>
                                                    </form>

                                                    <form
                                                        action="{{ route('admin.order.deleteOrderProduct', ['orderId' => $order->id, 'productId' => $orderProduct->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="article">
                                                            <span>Удалить товар</span>
                                                            <button type="submit" class="delete-product"
                                                                    onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">
                                                                Удалить
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <div class="article">
                                                        <span>Цена за шт.</span>
                                                        <p class="center">{{ $orderProduct->product->price() }}</p>
                                                    </div>

                                                    <div class="article last">
                                                        <span>Итого</span>
                                                        <p class="center">{{ $orderProduct->totalProductPrice() }}</p>
                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach
                                    </div>

                                    <div class="order-footer">
                                        <div class="article">
                                            @if($order->delivery)
                                                <p>
                                                    Доставка:<br> {{ $order->delivery->deliveryOption->name ?? 'Без доставки' }}
                                                </p>
                                            @else
                                                <p>Доставка: Без доставки</p>
                                            @endif
                                        </div>

                                        <div class="article">
                                            <form
                                                action="{{ route('admin.order.addTrackCode', $order->id) }}"
                                                method="post"
                                                class="track"
                                            >
                                                @csrf
                                                <input type="hidden" name="orderId" value="{{ $order->id }}">
                                                <label for="track_code">Трек-код:</label>
                                                <input type="number" id="track_code"
                                                       value="{{ $order->delivery->track_code }}"
                                                       placeholder="Трек-код доставки"
                                                       name="track"
                                                >
                                                <div class="error-form">
                                                    <p>@error('track') {{ $message }} @enderror</p>
                                                </div>
                                                <button>Сохранить</button>
                                            </form>

                                            @if($order->delivery)
                                                @if($order->delivery->DeliveryOption->name === 'Почта России')
                                                    <a href="https://www.pochta.ru/tracking?barcode={{ $order->delivery->track_code }}"
                                                       class="track"
                                                       target="_blank">Отследить:  {{ $order->delivery->track_code }}</a>
                                                @else
                                                    <p>{{ $order->delivery->track_code }}</p>
                                                @endif
                                            @else
                                                <p>Не отправлен</p>
                                            @endif
                                        </div>

                                        <style>
                                            section.account.orders.admin .article.last
                                            {
                                                margin: 0 0 auto auto !important;
                                            }
                                            section.account.orders.admin form.track
                                            {
                                                display: flex;
                                                align-items: center;
                                                gap: 24px;
                                                margin-left: 24px;
                                            }
                                        </style>

                                        <div class="article last">
                                            <p>Итогоr</p>
                                            <p class="price">
                                                {{ $order->totalOrderPrice() }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="order-footer">
                                        <div class="article">
                                            <p>
                                                Полное имя: <br>
                                                {!! $order->user->getFullName() !!}
                                            </p>
                                        </div>

                                        <div class="article">
                                            <p>
                                                Адрес:<br> {{ $order->user->fullAddress() }}
                                            </p>
                                        </div>

                                        <div class="article">
                                            <p>
                                                Телефон:<br> {{ $order->user->mobile() }}
                                            </p>
                                        </div>

                                        <div class="article">
                                            <p>
                                                Почта:<br> {{ $order->user->email() }}
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
        </div>
    </section>
@endsection
