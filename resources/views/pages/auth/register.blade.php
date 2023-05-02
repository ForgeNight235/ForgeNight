@extends('layouts.layout')

@section('content')
    <section class="registration">
        <div class="container">
            <div class="register-img">
                <img src="{{ asset('public/images/registration/registration.webp') }}" alt="registration">
            </div>
            <form action="" id="registration">
                <div class="form__article">
                    <h1>
                        Регистрация
                    </h1>
                </div>
                @csrf
                <input type="text" name="name" placeholder="имя" value="{{ old('name') }}">
                <input type="text" name="login" placeholder="логин" value="{{ old('login') }}">
                <input type="text" name="email" placeholder="e-mail" value="{{ old('email') }}">
                <input type="password" name="password" placeholder="секретный пароль" value="{{ old('password') }}">
                <input type="password" name="repeat_password" placeholder="введите пароль ещё раз"
                       value="{{ old('repeat_password') }}">
                <label class="checkbox">
                    <input type="checkbox" name="rules" required id="privacy_policy">
                    <p>Я согласен(-на) с правилами регистрации</p>
                    <img src="{{ asset('public/images/registration/question.webp') }}" alt="agreement"
                         title="Пользуясь веб-сайтом ForgeNight, Вы доверяете нам свою личную информацию. Мы делаем все для обеспечения ее безопасности и в то же время предоставляем Вам возможность управлять своими данными.">
                </label>

                <button type="submit">Зарегистрироваться</button>

                <div class="form-suggestion">
                    <p>Уже есть аккаунт? </p>
                    <a href="?auth">войти</a>
                </div>
            </form>
        </div>

        <style>
            .registration {
                background: url('public/images/registration/Rectangle 53.png') no-repeat right;
            }

            .registration .register-img {
                margin: auto 0;
            }

            .registration .container form {
                margin: 0 0 0 auto;
            }

            .registration .container form .form-suggestion p {
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 20px;
                line-height: 25px;
                text-transform: lowercase;
            }

            .registration .container form .form-suggestion a {
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 20px;
                line-height: 25px;
                text-transform: lowercase;
                color: #f2f2f2;
            }

            .registration .container form .form-suggestion {
                display: flex;
                gap: 5px;
            }

            .registration .container form button {
                background: #F4DC5E;
                border-radius: 20px;
                width: 100%;
                padding: 20px;
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 700;
                font-size: 32px;
                line-height: 39px;
                border: none;
                outline: none;
                cursor: pointer;
            }

            .registration .container form .checkbox {
                display: flex;
                gap: 20px;
            }

            .registration .container form .checkbox input {
                --size: 35px;
                width: var(--size);
                height: var(--size);
                cursor: pointer;
            }

            /* изменяем цвет фона чекбокса */
            input[type="checkbox"] {
                background-color: #CC0000; /* здесь указывается ваш цвет в формате HEX, RGB или названии */
            }

            .registration .container form .checkbox img {
                --size: 35px;
                width: var(--size);
                height: var(--size);
                cursor: pointer;
            }

            .registration .container .register-img img {
                min-width: 350px;
                max-width: 550px;
                width: 100%;
            }

            .registration .container {
                display: flex;
                gap: 10px;
                color: #232323;
            }

            .form__article h1 {
                text-align: center;
                font-family: 'Inter', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 36px;
                line-height: 44px;
            }

            .registration .container form {
                display: grid;
                gap: 30px;
            }

            .registration .container form input {
                width: 100%;
                padding: 25px 30px;
                max-width: 500px;
                max-height: 60px;
                border: 1px solid #F4DC5E;
                outline: none;
                border-radius: 20px;
            }
        </style>

    </section>
@endsection
