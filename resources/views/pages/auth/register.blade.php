@extends('layouts.layout')

@section('content')
    <section class="registration">
        <div class="container">
            <div class="register-img">
                <img src="{{ asset('public/images/registration/registration.webp') }}" alt="registration">
            </div>
            @include('components.errors')
            <form
                action="{{ route('auth.createUser') }}"
                method="post"
                enctype="multipart/form-data"
                id="registration"
            >
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
                <style>
                    .registration {
                        background: url('public/images/registration/Rectangle 53.png') no-repeat right;
                    }
                </style>
            </form>
        </div>

    </section>
@endsection
