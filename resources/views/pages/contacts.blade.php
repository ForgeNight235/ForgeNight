@extends('layouts.layout')

@section('title', 'Контакты')

@section('meta-description', 'Свяжитесь с нами для получения дополнительной информации, задайте вопросы или оставьте отзыв. Наши контактные данные и форма обратной связи доступны для удобного общения. Мы готовы помочь вам с выбором, предоставить консультацию и решить любые вопросы, связанные с нашими продуктами и услугами.')

@section('content')
    <section class="contacts">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('page.contacts') }}">
                    <p>контакты</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Контакты магазина
                </h1>
            </div>

            <div class="contacts-information">
                <div class="contact-info">
                    <i class="fa-solid fa-mobile"></i>
                    <a href="tel:+79172546005">+7 (917) 254-60-05</a>
                </div>

                <div class="contact-info">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:forgenight@mail.ru">forgenight@mail.ru</a>
                </div>

                <div class="contact-info">
                    <i class="fa-solid fa-location-crosshairs"></i>
                    <a href="https://bit.ly/forgenightlocation" target="_blank">пр-т. Победы, 182Б, Казань, Респ. Татарстан, 420025</a>
                </div>
            </div>


            <div class="text">
                <p>
                    Мы готовы предоставить вам удобные варианты оплаты и доставки. Посетите наши страницы <a
                        href="{{ route('page.payment') }}">"Оплата"</a> и <a href="{{ route('page.delivery') }}">"Доставка"</a>, чтобы узнать подробности о доступных методах оплаты и вариантах доставки. Мы стремимся сделать ваше покупательское путешествие максимально удобным и безопасным.
                </p>
            </div>

            <style>
                section.contacts .text
                {
                    margin: 100px auto 0;
                    font-family: Montserrat, sans-serif;
                    font-size: 18px;
                }

                section.contacts .contacts-information
                {
                    margin: 100px;
                }
                section.contacts .contact-info {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 12px;
                    margin-bottom: 20px;
                }

                section.contacts .contact-info a
                {
                    margin: 0;
                    font-size: 18px;
                    transition: .3s ease-in-out;
                    font-family: "Century Gothic", Montserrat, sans-serif;
                    text-decoration: none;
                    color: #232323;
                }
                section.contacts .contact-info a:hover,
                section.contacts .contact-info a:target
                {
                    font-size: 22px;
                    cursor: pointer;
                }
            </style>
        </div>
    </section>
@endsection
