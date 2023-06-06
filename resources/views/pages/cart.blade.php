@extends('layouts.layout')

<script src="{{ asset('js/singlePage/productQuantity.js') }}" defer></script>
<script src="{{ asset('js/cart/cartDeleteItem.js') }}" defer></script>
<script src="{{ asset('js/cart/checkout/saveBtnAttach.js') }}" defer></script>

@section('title', 'Корзина')

@section('content')
    <section class="cart">
        <div class="container">
            @if(session()->has('message'))
                <p>{{session()->get('message')}}</p>
            @endif
            <div class="section-article">
                <h1>
                    Корзина
                    <span>
                        @if($cart->isEmpty())
                        @else
                            {{ $cart->count() }} товара(ов)
                        @endif
                </span>

                </h1>

            </div>

            <div class="cart__content">

                <div class="items">

                    @if($cart->isEmpty())
                        <h2>В корзине нет товаров</h2>
                    @else

                        @foreach($cart->get() as $item)
                            <form
                                action="{{ route('cart.updateQuantity')}}"
                                method="post"
                                class="product__form"
                            >
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                @csrf
{{--                                @method('PUT')--}}
                                <div class="item">

                                    <a href="{{ route('product.show', $item) }}" class="item-img" target="_blank">
                                        <img
                                            src="{{ $item->images()->first()->path() }}"
                                            alt="{{ $item->name }}">
                                    </a>

                                    <div class="text-block">
                                        <a href="{{ route('product.show', $item) }}" class="item-title" target="_blank">
                                            {{ $item->name }}
                                        </a>

                                        <a href="{{ route('cart.catalog.catalog', ['collection' => $item->collection_id]) }}" target="_blank">
                                            {{ $item->category->name }}
                                        </a>
                                    </div>

                                    <div class="item-checkout">
                                        <p style="white-space: nowrap">
                                            {{ $item->price() }}
                                        </p>
                                        <div class="item-options">

                                            <div class="product-quantity">
                                                <button type="button" class="btn btn-sm btn-minus"><i class="fas fa-minus"></i></button>
                                                <input type="number" class="form-control form-control-sm" name="quantity" min="1" value="{{ $item->quantity }}">
                                                <button type="button" class="btn btn-sm btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
{{--                                            <button>--}}
                                                <a href="{{ route('cart.remove', $item) }}" class="button">
                                                    <img
                                                        src="{{ asset('images/web-site_icons/cart/delete.svg') }}"
                                                        alt="delete">
                                                </a>
{{--                                            </button>--}}

                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-sm btn-save">
                                    Сохранить изменения
                                </button>
                            </form>
                        @endforeach
                    @endif

                        <style>
                            .btn-save {
                                display: none !important;
                            }

                            .visible {
                                display: block !important;
                            }
                        </style>

                    @if($cart->isEmpty())
                    @else
                        <button>
                            <a href="{{ route('cart.clear') }}" style="text-decoration: none;">
                                <img src="{{ asset('images/web-site_icons/cart/delete.svg') }}"
                                     alt="delete">
                                <span style="color: #232323;">удалить всё</span>
                            </a>
                        </button>
                    @endif


                </div>

                <!-- Подключение библиотеки jQuery -->
                <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>

                <div class="order-checkout">
                    <div class="promocode">
                        <input type="text" placeholder="ввести промокод">
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                              data-bs-content="Используйте промокод, чтобы получить скидку на ваш заказ!
                          Введите его в поле ниже, чтобы применить. Мы предлагаем различные промо-коды
                          для праздников и особых случаев. Не упустите шанс сохранить деньги при покупке товаров.">
                      <button class="btn btn-primary" type="button" disabled>
                          <img src="{{ asset('images/web-site_icons/cart/promocodes-alert.svg') }}"
                               alt="promocode">
                      </button>
                    </span>

                        <!-- Ваш JavaScript-код, который активирует Popover -->
                        <script src="{{ asset('js/cart/promocodeNotificator.js') }}" defer></script>
                    </div>

                    <div class="checkout">
                        <table>
                            <tr>
                                <td>количество товаров</td>
                                <td>
                                    @if($cart->isEmpty())
                                        0
                                    @else
                                        {{ $cart->count() }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>стоимость</td>
                                <td>
                                    @if($cart->isEmpty())
                                    @else
                                        {{ $cart->getTotal() }} ₱
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>скидка</td>
                                <td>15%</td>
                            </tr>
                            <tr>
                                <td>доставка</td>
                                <td>350 ₱</td>
                            </tr>
                            <tr>
                                <td>итоговая сумма</td>
                                <td>{{ $cart->getTotalWithDelivery() }} ₱</td>
                            </tr>
                        </table>
                    </div>

                    @if($cart->isEmpty())
                    @else
                        <a href="{{ route('cart.orderIndex') }}">
                            <button class="order">
                                перейти к оформлению
                            </button>
                        </a>
                    @endif

                </div>

            </div>
        </div>

    </section>

    @include('components.bestBuysByCategory')

@endsection
