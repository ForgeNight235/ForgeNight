@extends('layouts.layout')

@section('content')
    <section class="registration">
        <div class="container">
            <div class="register-img">
                <img src="{{ asset('public/images/registration/registration.webp') }}" alt="registration">
            </div>
            @include('components.errors')
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
                <input type="text" name="login" placeholder="логин" value="{{ old('login') }}">
                <input type="password" name="password" placeholder="секретный пароль" value="{{ old('password') }}">

                <button type="submit">Войти</button>

                <div class="form-suggestion">
                    <p>Не зарегистрированы? </p>
                    <a href="?auth">зарегистрируйтесь</a>
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
