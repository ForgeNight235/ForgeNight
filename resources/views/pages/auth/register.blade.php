@extends('layouts.layout')

@section('content')
    <section class="registration">
        <div class="container">
            <div class="register-img">
                <img src="{{ asset('public/images/registration/registration.webp') }}" alt="registration">
            </div>
{{--            @include('components.errors.errors')--}}
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
                <div class="login-box">
                    <div class="user-box">
                        <input type="text" name="name" placeholder="имя" value="{{ old('name') }}" id="name">
                        <label for="name">Ваше имя</label>
                        <div class="error-form">
                            <p>@error('name') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="login-box">
                    <div class="user-box">
                        <input type="text" name="login" placeholder="логин" value="{{ old('login') }}" id="login">
                        <label for="login">Имя пользователя</label>
                        <div class="error-form">
                            <p>@error('login') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>


                <div class="login-box">
                    <div class="user-box">
                        <input type="text" name="email" placeholder="e-mail" value="{{ old('email') }}" id="email">
                        <label for="email">Электронная почта</label>
                        <div class="error-form">
                            <p>@error('email') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>


                <div class="login-box">
                    <div class="user-box">
                        <input type="password" name="password" placeholder="секретный пароль" value="{{ old('password') }}" id="password">
                        <label for="password">Секретный пароль</label>
                        <div class="show-password" onclick="showPassword()">
                            <img src="{{ asset('public/images/web-site_icons/free-icon-show-8527944.png') }}" alt="Показать пароль">
                        </div>

                        <script>
                            function showPassword() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>


                        <div class="error-form">
                            <p>@error('password') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>


                <div class="login-box">
                    <div class="user-box">
                        <input type="password" name="repeat_password" placeholder="введите пароль ещё раз" id="repeat_password">
                        <label for="repeat_password">Повторите пароль</label>
                        <div class="error-form">
                            <p>@error('repeat_password') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>


                <div class="form-group">

                </div>


                <div class="form-group">
                    <label class="checkbox">
                        <input type="checkbox" name="rules" required id="privacy_policy">
                        <p>Я согласен(-на) с правилами регистрации</p>
                        <img src="{{ asset('public/images/registration/question.webp') }}" alt="agreement"
                             title="Пользуясь веб-сайтом ForgeNight, Вы доверяете нам свою личную информацию. Мы делаем все для обеспечения ее безопасности и в то же время предоставляем Вам возможность управлять своими данными.">
                    </label>
                    <div class="error-form">
                        <p>@error('rules') {{ $message }} @enderror</p>
                    </div>
                </div>


                <button id="form-btn" type="submit">Зарегистрироваться</button>

                <div class="form-suggestion">
                    <p>Уже есть аккаунт? </p>
                    <a href="{{ route('page.login') }}">войти</a>
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
