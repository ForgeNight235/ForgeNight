@extends('layouts.layout')

@section('title', 'Изготовление миниатюр по вашему запросу')

@section('meta-description', 'Закажите индивидуальную миниатюру у команды ForgeNight! Мы создаем уникальные миниатюры по специальным запросам и изготавливаем модели, которых нет в нашем магазине. Свяжитесь с нами сейчас и получите уникальную работу идеально подходящую для ваших потребностей.')

@section('content')
    <section class="personal__order">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('page.personalOrder') }}">
                    <p>личный заказ</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Изготовление миниатюр по вашему запросу
                </h1>
            </div>

            <div class="welcome-section">
                <div class="infographic">
                    <div class="image-container">
                        <div class="image">
                            <img src="{{ asset('images/web-site_icons/cart/infograph/infograph1.webp') }}" alt="1st step">
                        </div>
                        <div class="text">
                            <h3 class="first">Загрузите вашу модель в форму заявки</h3>
                        </div>
                        <div class="dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image">
                            <img src="{{ asset('images/web-site_icons/cart/infograph/infograph2.webp') }}" alt="Second step">
                        </div>
                        <div class="text">
                            <h3>Получите расчёт стоимости</h3>
                        </div>
                        <div class="dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image">
                            <img src="{{ asset('images/web-site_icons/cart/infograph/infograph3.webp') }}" alt="third step">
                        </div>
                        <div class="text">
                            <h3>Оформите заказ</h3>
                        </div>
                        <div class="dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <div class="image-container">
                        <div class="image">
                            <img src="{{ asset('images/web-site_icons/cart/infograph/infograph4.webp') }}" alt="fourth step">
                        </div>
                        <div class="text">
                            <h3>Радуйтесь</h3>
                        </div>
                    </div>
                </div>

                <div class="banner">
                    <img src="{{ asset('images/personal-order/personal-order.webp') }}" alt="personal order">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Написать магазину
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <a class="dropdown-item" href="mailto:forgenight@mail.ru?subject=%D0%98%D0%BD%D0%B4%D0%B8%D0%B2%D0%B8%D0%B4%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9%20%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7&body=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5%21%0D%0A%0D%0A%D0%AF%20%D1%85%D0%BE%D1%87%D1%83%20%D1%81%D0%B4%D0%B5%D0%BB%D0%B0%D1%82%D1%8C%20%D0%B8%D0%BD%D0%B4%D0%B8%D0%B2%D0%B8%D0%B4%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9%20%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7.%20%D0%9C%D0%B5%D0%BD%D1%8F%20%D0%B8%D0%BD%D1%82%D0%B5%D1%80%D0%B5%D1%81%D1%83%D0%B5%D1%82%20" target="_blank">
                                    на почту
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="https://t.me/ForgeNight" target="_blank">в телеграм</a></li>
                            <li><a class="dropdown-item" href="https://wa.me/79172546005" target="_blank">в whatsapp</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="tel:+79600525985">позвонить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="processing">
                <div class="process">
                    <div class="wrapper">
                        <h2>Переговоры</h2>
                        <p>
                            При индивидуальном заказе с вами связывается наше доверенное лицо для уточнения данных о заказе.
                        </p>
                    </div>
                </div>
                <div class="process">
                    <div class="wrapper">
                        <h2>поиск модели</h2>
                        <p>
                            поиск модели
                            мы берем вашу модель или ищем и приобретаем сами модель, которая вам нужна.
                        </p>
                    </div>
                </div>
                <div class="process">
                    <div class="wrapper">
                        <h2>уточняем детали</h2>
                        <p>
                            показываем вам 3д модель и удтверждаем размеры, масштаб и ваши личные пожелания.
                        </p>
                    </div>
                </div>
                <div class="process">
                    <div class="wrapper">
                        <h2>Оплата заказа</h2>
                        <p>
                            вы оплачиваете заказ, подтверждаете данные для отправки. после, происходит подготовка модели печати и отправка в печать.
                        </p>
                    </div>
                </div>
                <div class="process">
                    <div class="wrapper">
                        <h2>обработка</h2>
                        <p>
                            на этом этапе происходит печать изделий, их постобратка и подготовка к отправке.
                        </p>
                    </div>
                </div>
                <div class="process">
                    <div class="wrapper">
                        <h2>отправка</h2>
                        <p>
                            на этом этапе мы предоставляем вам фотоотчет о проделаной работе, бережно упаковываем и отправляем заказ.
                            Всё четко и прозрачно!
                        </p>
                    </div>
                </div>
            </div>


            <style>
                section.personal__order .processing
                {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 40px;
                }
                section.personal__order .process
                {
                    color: #232323;
                    font-family: 'Century Gothic', sans-serif;
                }
                section.personal__order .process .wrapper
                {
                    background: linear-gradient(180deg, #FFFFFF 0%, rgba(0, 0, 0, 0) 100%);
                    border-radius: 20px;
                    padding: 15px 15px clamp(15px, 30vh, 100px);
                }
                section.personal__order .process h2
                {
                    font-size: clamp(20px, 4vw, 39px);
                    line-height: clamp(28px, 4vw, 39px);
                    text-transform: uppercase;
                }

            </style>
        </div>
    </section>
@endsection
