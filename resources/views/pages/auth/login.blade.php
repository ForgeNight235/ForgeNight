@extends('layouts.layout')

@section('title', 'Авторизация')

@section('content')
    <section class="registration">
        <div class="container">
            <div class="register-img">
                <img src="{{ asset('images/registration/registration.webp') }}" alt="registration">
            </div>
            <form
                action="{{ route('auth.loginUser') }}"
                method="post"
                enctype="multipart/form-data"
                id="registration"
            >
                <div class="form__article">
                    <h1>
                        Вход
                    </h1>
                </div>
                @csrf
                <div class="login-box">
                    <div class="user-box">
                        <input id="login" type="text" name="login" value="{{ old('login') }}" placeholder="username" autocomplete="login">
                        <label for="login">Логин</label>
                    </div>

                    <div class="user-box">
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="*** ***" id="password" autocomplete="password">
                        <div class="show-password" onclick="showPassword()">
                            <img src="{{ asset('images/web-site_icons/free-icon-show-8527944.png') }}" alt="Показать пароль">
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

                        <style>
                            .user-box button img{
                                height: 100%;
                            }
                            .show-password button{
                                padding: 0;
                                position: absolute;
                                top: 0;
                                right: 0;
                                bottom: 0;
                                left: auto;
                            }
                            .user-box.remember{
                                display: flex;
                                justify-content: end;
                            }
                            .user-box.remember input{
                                --size: 35px;
                                width: var(--size);
                                height: var(--size);
                                cursor: pointer;
                            }
                            .user-box.remember label{
                                top: -10px !important;
                                font-size: 16px !important;
                            }

                        </style>

                        <label for="password">Пароль</label>
                    </div>

                    <div class="user-box remember">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Запомнить меня</label>
                    </div>

                    <div class="error-form">
                        <p>
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                        </p>
                    </div>

                    <button type="submit">Войти</button>

                    <div class="form-suggestion">
                        <p>Не зарегистрированы? </p>
                        <a href="{{ route('page.register') }}">зарегистрируйтесь</a>
                    </div>
                </div>

                <style>

                </style>
            </form>
        </div>

    </section>
@endsection
