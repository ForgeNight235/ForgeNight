@extends('layouts.layout')

@section('title', 'Админ панель')

@section('content')
    <section class="account">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('account.account') }}">
                    <p>личный кабинет</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Добавление предмета
                </h1>
            </div>

            <div class="account-content">
                <aside>
                    <div class="aside-article">
                        <a href="{{ route('account.account') }}">
                            <img
                                src="{{ auth()->user()->avatarUrl() }}"
                                alt="{{ auth()->user()->login }}"
                                class="avatar"
                            >
                            <p>{{ auth()->user()->login }}</p>
                        </a>
                        <a href="{{ route('account.account') }}">
                            <h2>Личные данные</h2>
                        </a>

                        <a href="{{ route('account.accountAddresses') }}">
                            <h2>Адресная книга</h2>
                        </a>

                        <a href="{{ route('account.accountOrders') }}">
                            <h2>История заказов</h2>
                        </a>

                        <a href="{{ route('account.account') }}">
                            <h2>Смена пароля</h2>
                        </a>
                        @if(auth()->user()->role==='admin')
                            <a href="">
                                <h2 class="chosen">Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <div class="account__personal__data">
                    <form
                        action="{{ route('admin.product.createProduct') }}"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="account__box">
                            <label for="name">Название товара</label>
                            <input name="name" type="text" id="name">
                            <div class="error-form">
                                <p>@error('name') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="price">Цена товара</label>
                            <input name="price" type="text" id="price">
                            <div class="error-form">
                                <p>@error('price') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="mobile">Опубликовать сразу?</label>
                            <input
                                type="checkbox"
                                name="is_published"
                                class="newsSubscription"
                                value="yes"
                                checked
                            >
                        </div>

                        <select name="collection_id">
                            @foreach($collections as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }} - ID: {{ $item->id }}
                                </option>
                            @endforeach
                        </select>

                        <div class="account__box">
                            <label for="image_path">Изображения товара</label>
                            <input type="file" name="images[]" id="image_path" multiple>

                            <div class="error-form">
                                <p>@error('image_path') {{$message}} @enderror</p>
                            </div>
                        </div>
                        <img
                            id="preview"
                            alt="Image Preview"
                            style="
                                display: none;
                                --size: 75px;
                                width: var(--size);
                                height: var(--size);
                                margin: 0 0 0 auto;
                                border-radius: 50%;
                                object-fit: cover;
                            "
                        >

{{--                        <div class="account__box">--}}
{{--                            <div class="avatar-user-form">--}}
{{--                                <label for="image">Изменение фото профиля:</label>--}}
{{--                                <input type="file" name="avatar" id="image" accept="image/*">--}}
{{--                                <div class="error-form">--}}
{{--                                    <p>@error('avatar') {{ $message }} @enderror</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <img--}}
{{--                                id="preview"--}}
{{--                                alt="Image Preview"--}}
{{--                                style="--}}
{{--                                display: none;--}}
{{--                                --size: 75px;--}}
{{--                                width: var(--size);--}}
{{--                                height: var(--size);--}}
{{--                                margin: 0 0 0 auto;--}}
{{--                                border-radius: 50%;--}}
{{--                                object-fit: cover;--}}
{{--                            "--}}
{{--                            >--}}
{{--                        </div>--}}

                        <button type="submit">Обновить данные</button>
                    </form>


                </div>

            </div>
        </div>
    </section>
@endsection
