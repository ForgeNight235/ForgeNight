@extends('layouts.layout')

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
                            <div class="item">
                                <a href="{{ route('cart.product.show', $item) }}" class="item-img">
                                    <img
                                        src="{{ $item->images()->first()->path() }}"
                                        alt="{{ $item->name }}">
                                </a>

                                <div class="text-block">
                                    <a href="{{ route('cart.product.show', $item) }}" class="item-title">
                                        {{ $item->name }}
                                    </a>

                                    <a href="{{ route('cart.catalog.catalog', ['collection' => $item->collection_id]) }}">
                                        {{ $item->category->name }}
                                    </a>
                                </div>

                                <div class="item-checkout">
                                    <p>
                                        {{ $item->price() }}
                                    </p>
                                    <div class="item-options">
{{--                                        <form--}}
{{--                                            action=""--}}
{{--                                            method="post"--}}
{{--                                            enctype="multipart/form-data"--}}
{{--                                        >--}}
                                            <div class="product-quantity">
                                                <button type="button" class="btn btn-sm btn-minus"><i
                                                        class="fas fa-minus"></i></button>
                                                <input type="number" class="form-control form-control-sm" name="quantity"
                                                       min="1" value="1" >
                                                <button type="button" class="btn btn-sm btn-plus"><i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <button>
                                                <a href="{{ route('cart.remove', $item) }}" class="button">
                                                    <img src="{{ asset('public/images/web-site_icons/cart/delete.svg') }}"
                                                         alt="delete">
                                                </a>

                                            </button>
{{--                                        </form>--}}

                                    </div>
                                </div>

                                <script src="{{ asset('public/js/singlePage/productQuantity.js') }}" defer></script>
                                <script src="{{ asset('public/js/cart/cartDeleteItem.js') }}" defer></script>
                            </div>
                        @endforeach
                    @endif

                        @if($cart->isEmpty())
                        @else
                            <button>
                                <a href="{{ route('cart.clear') }}">
                                    <img src="{{ asset('public/images/web-site_icons/cart/delete.svg') }}"
                                         alt="delete">
                                    <span>удалить всё</span>
                                </a>
                            </button>
                        @endif


                </div>

                <!-- Подключение библиотеки jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <div class="order-checkout">
                    <div class="promocode">
                        <input type="text" placeholder="ввести промокод">
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                              data-bs-content="Используйте промокод, чтобы получить скидку на ваш заказ!
                          Введите его в поле ниже, чтобы применить. Мы предлагаем различные промо-коды
                          для праздников и особых случаев. Не упустите шанс сохранить деньги при покупке товаров.">
                      <button class="btn btn-primary" type="button" disabled>
                          <img src="{{ asset('public/images/web-site_icons/cart/promocodes-alert.svg') }}" alt="promocode">
                      </button>
                    </span>

                        <!-- Ваш JavaScript-код, который активирует Popover -->
                        <script>
                            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
                            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
                        </script>
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
                                <td>{{ $cart->getTotal() }}</td>
                            </tr>
                            <tr>
                                <td>скидка</td>
                                <td>15%</td>
                            </tr>
                            <tr>
                                <td>доставка</td>
                                <td>250 ₱</td>
                            </tr>
                            <tr>
                                <td>итоговая сумма</td>
                                <td>1 253 ₱</td>
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

            <style>
                .cart .cart__content .order-checkout button.order{
                    padding: 12px 16px;
                    background: #F4DC5E;
                    border-radius: 20px;
                    font-size: 20px;
                    line-height: 25px;
                    outline: transparent;
                    border: transparent;
                    width: fit-content;
                    display: block;
                    margin: 0 auto auto auto;
                }
                .cart .cart__content .order-checkout .checkout tbody{
                    display: grid;
                    gap: 25px;
                }
                .cart .cart__content .order-checkout .checkout table{
                    gap: 25px;
                    display: grid;
                    width: 100%;
                }
                .cart .cart__content .order-checkout .checkout table td{
                    width: 100%;
                    font-size: 20px;
                    line-height: 25px;
                    color: #1A1B22;
                }
                .cart .cart__content .order-checkout .checkout table td:nth-child(2)
                {
                    white-space: nowrap;
                    text-align: right;
                }
                .cart .cart__content .order-checkout span{
                    position: absolute;
                    right: 0;
                    top: -10px;
                }
                .cart .cart__content .order-checkout button.btn-primary{
                    background: transparent;
                    border: transparent;
                    margin: 0;
                    padding: 0;
                }
                .cart .cart__content span{
                    width: fit-content;
                    height: fit-content;
                }
                .cart .cart__content .order-checkout input {
                    height: 18px;
                    background: transparent;
                    border: transparent;
                    outline: transparent;
                    border-bottom: 1px solid #94959B;
                    width: 100%;
                    padding: 0 0 7px 0;
                }

                .cart .cart__content .order-checkout {
                    display: grid;
                    gap: 25px;
                    position: relative;
                    height: fit-content;
                }

                .cart .items button {
                    background: transparent;
                    border: transparent;
                    outline: transparent;
                    padding: 42px 0 0 0;
                }

                .cart .items .item .item-checkout .item-options button img {
                    --size: 20px;
                    width: var(--size);
                    height: var(--size);
                }

                .cart .items .item .item-checkout .item-options button {
                    height: fit-content;
                    width: fit-content;
                    background: transparent;
                    border: transparent;
                    margin: auto;
                    padding: 0;
                }

                .cart .items .item .item-checkout .item-options .product-quantity input {
                    height: fit-content;
                    background: transparent;
                    border: transparent;
                    outline: transparent;
                    appearance: none;
                    text-align: center;
                }

                .cart .items .item .text-block {
                    margin: auto auto auto 12px;
                }

                .cart .items .item .item-checkout .item-options .product-quantity
                input[type="number"] {
                    background: transparent;
                    border: none;
                    width: 35px;
                    text-align: center;
                    -webkit-appearance: none;
                    margin: 0;
                    -moz-appearance: textfield;
                }

                .cart .items .item .item-checkout .item-options .product-quantity
                input[type="number"]::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                    -moz-appearance: textfield;
                }

                .cart .items .item .item-checkout .item-options .product-quantity
                input[type="number"]::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                }


                .cart .items .item .item-checkout .item-options .product-quantity button {
                    height: fit-content;
                }

                .cart .items .item .item-checkout .item-options .product-quantity {
                    height: fit-content;
                    display: flex;
                    background: #F4DC5E;
                    border-radius: 12px;
                    padding: 4px 8px;
                }

                .cart .items .item {
                    display: flex;
                    gap: 12px;
                    max-width: 550px;
                    justify-content: space-between;
                }

                .cart {
                    font-family: 'Century Gothic', sans-serif;
                }

                .cart .items .item .text-block a.item-title {
                    text-decoration: none;
                    font-style: normal;
                    font-weight: 700;
                    font-size: 16px;
                    line-height: 20px;
                    text-transform: uppercase;
                    color: #1A1B22;
                }

                .cart .items .item .text-block a {
                    text-decoration: none;
                    font-family: 'Century Gothic', sans-serif;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 16px;
                    line-height: 20px;
                    color: #1A1B22;
                }

                .cart .items .item a.item-img {
                    margin: auto;
                    max-width: 100px;
                    width: 100%;
                    object-fit: contain;
                    height: 95px;
                }

                .cart .items .item a img {
                    max-width: 100px;
                    width: 100%;
                    object-fit: contain;
                    height: 95px;
                    margin: auto;
                }

                .cart .items .item .item-options form {
                    display: flex;
                    gap: 15px;
                }

                .cart .items .item .item-checkout {
                    gap: 18px;
                    padding: 12px 0 0 0;
                    display: grid;
                }

                .cart .items .item .item-checkout p {
                    font-size: 28px;
                    line-height: 44px;
                    color: #1A1B22;
                    margin: 0;
                }

                .cart .items .item .text-block {
                    display: grid;
                    justify-content: space-between;
                }

                .cart__content {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 80px;
                }

                .cart .container .section-article h1 {
                    font-weight: 700;
                    text-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
                }

                .cart .container .section-article {
                    display: flex;
                    gap: 10px;
                    justify-content: flex-start;
                }

                .cart .container .section-article span {
                    font: 40px/50px "Century Gothic", sans-serif;
                    font-weight: 500;
                    letter-spacing: 0.05em;
                }
            </style>

            </div>
        </div>

    </section>

    @include('components.bestBuysByCategory')

@endsection
