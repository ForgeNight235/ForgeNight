@extends('layouts.layout')

@section('title', 'Оформление заказа')

@section('content')
    <section class="ordering">

        <div class="container">
            <div class="section-article">
                <h1>
                    Оформление заказа
                </h1>

            </div>

            <div class="ordering__content">
                <div class="order-checkout">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    <p>доставка</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">

                                    <img
                                        src="{{ asset('public/images/web-site_icons/cart/infograph/infograph1.webp') }}"
                                        alt="1">

                                    <div class="forms">

                                        <form action="">
                                            @csrf
{{--                                            @foreach($deliverers as $delivery)--}}

{{--                                                <div class="form__group">--}}
{{--                                                    <label for="delivery">{{ $delivery->name }}</label>--}}
{{--                                                    <input--}}
{{--                                                        type="radio"--}}
{{--                                                        id="delivery_{{ $delivery->id }}"--}}
{{--                                                        name="delivery_type"--}}
{{--                                                        value="{{ $delivery->id }}"--}}
{{--                                                        data-delivery-name="{{ $delivery->name }}"--}}
{{--                                                        >--}}
{{--                                                </div>--}}

{{--                                            @endforeach--}}

                                        </form>

                                        <form
                                            action="{{ route('cart.checkout.updateUserAddress') }}"
                                            method="post"
                                            class="address"
                                        >
                                            @csrf
                                            <span>адрес</span>
                                            <div class="form__group">
                                                <input type="text" name="address" class="large" placeholder="улица и дом"
                                                       value="{{ auth()->user()->address }}">
                                                <p class="error">@error('address') {{ $message }} @enderror</p>
                                            </div>

                                            <div class="block">
                                                <input type="text" name="city" placeholder="город"
                                                       value="{{ auth()->user()->city }}">
                                                <p class="error">@error('city') {{ $message }} @enderror</p>

                                                <input type="text" name="index" placeholder="индекс"
                                                       value="{{ auth()->user()->index }}">
                                                <p class="error">@error('index') {{ $message }} @enderror</p>
                                            </div>

                                            <button type="submit" class="btn-save" style="display: none;">сохранить данные
                                            </button>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <script src="{{ asset('public/js/cart/checkout/buttonHideShow.js') }}" defer></script>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                    <p>контакты</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">

                                    <img
                                        src="{{ asset('public/images/web-site_icons/cart/infograph/infograph2.webp') }}"
                                        alt="2">

                                    <form
                                        action="{{ route('cart.checkout.updateUserContacts') }}"
                                        method="post"
                                        class="contacts"
                                    >
                                        @csrf
                                        <div class="form__group">
                                            <input type="text" name="name" placeholder="имя*"
                                                   value="{{ auth()->user()->name }}">
                                            <p class="error">@error('name') {{ $message }} @enderror</p>
                                        </div>

                                        <div class="form__group">
                                            <input type="text" name="surname" placeholder="фамилия*"
                                                   value="{{ auth()->user()->surname }}">
                                            <p class="error">@error('surname') {{ $message }} @enderror</p>
                                        </div>

                                        <div class="form__group">
                                            <input type="text" name="patronymic" placeholder="отчество"
                                                   value="{{ auth()->user()->patronymic }}">
                                            <p class="error">@error('patronymic') {{ $message }} @enderror</p>
                                        </div>

                                        <div class="form__group">
                                            <input type="text" name="mobile" placeholder="номер телефона"
                                                   value="{{ auth()->user()->mobile }}">
                                            <p class="error">@error('mobile') {{ $message }} @enderror</p>
                                        </div>

                                        <div class="form__group">
                                            <input type="email" name="email" placeholder="example@mail.tu"
                                                   value="{{ auth()->user()->email }}">
                                            <p class="error">@error('email') {{ $message }} @enderror</p>
                                        </div>

                                        <button type="submit" class="btn-save" style="display: none;">сохранить данные
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    <p>оплата</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <img
                                        src="{{ asset('public/images/web-site_icons/cart/infograph/infograph3.webp') }}"
                                        alt="3">
                                    <p>
                                        Уважаемый покупатель!
                                        <br><br>
                                        После оформления заказа и оплаты вы получите электронное письмо с инструкциями по оплате. Пожалуйста, внимательно прочитайте информацию в письме и следуйте инструкциям.
                                        <br><br>
                                        После оплаты с вами свяжется администратор магазина для подтверждения деталей заказа. Если у вас возникли вопросы или проблемы, пожалуйста, свяжитесь с нами, используя контактную информацию, указанную на сайте.
                                        <br><br>
                                        Спасибо за покупки у нас! Мы надеемся на долгосрочное сотрудничество с вами.
                                        <br><br>
                                        В случае обнаружения некомплекта изделия, свяжитесь с нами в течение 7 дней с
                                        момента получения заказа. Мы с радостью отправим вам недостающие части в
                                        кратчайшие сроки.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="order-items-info">
                    <div class="article">
                        <p>ваш заказ/ {{ $cart->count() }} товара(ов)</p>
                        <a href="/cart">изменить</a>
                    </div>

                    <div class="cart-items">
                        @foreach($cart->get() as $item)
                            <div class="cart-item">
                                <a href="{{ route('cart.product.show', $item) }}">
                                    <img
                                        src="{{ $item->images()->first()->path() }}"
                                        alt="{{ $item->name }}"
                                    >
                                </a>
                            </div>

                            <script src="{{ asset('public/js/singlePage/reviewsPhotos.js') }}" defer></script>
                        @endforeach

                    </div>

                    <div class="order-total">
                        <div class="row">
                            <div class="header">
                                <p>стоимость товаров</p>
                            </div>
                            <div class="underline"></div>
                            <div class="price">{{ $cart->getTotal() }} ₱</div>
                        </div>

                        <div class="row">
                            <div class="header">
                                <p>доставка</p>
                            </div>
                            <div class="underline"></div>
                            <div class="price">350 ₱</div>
                        </div>

                        <div class="row">
                            <div class="header">
                                <p>скидка</p>
                            </div>
                            <div class="underline"></div>
                            <div class="price">15%</div>
                        </div>

                        <div class="row">
                            <div class="header">
                                <p>итоговая стоимость</p>
                            </div>
                            <div class="underline"></div>
                            <div class="price">{{ $cart->getTotalWithDelivery() }} ₱</div>
                        </div>
                    </div>

                    <form
                        class="order"
                        id="js-checkout"
                    >
                        @csrf
                        <input type="password" name="password" placeholder="Для подтверждения заказа введите пароль"/>

                        @foreach($deliverers as $delivery)

                            <div class="form__group">

                                <label for="delivery_type_{{ $delivery->id }}">
                                    {{ $delivery->name }}
                                </label>

                                <input type="radio" id="delivery_type_{{ $delivery->id }}" name="delivery_type" value="{{ $delivery->id }}" data-delivery-name="{{ $delivery->name }}">

                            </div>
                        @endforeach

                        <button>оплатить</button>
                    </form>

                </div>
                <script src="{{ asset('public/js/cart/checkout/createOrder.js') }}" defer></script>

            </div>
        </div>

    </section>
@endsection
