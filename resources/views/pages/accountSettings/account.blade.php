@extends('layouts.layout')

@section('title', 'Личный кабинет')

@section('content')

    <script src="{{ asset('public/js/accountPage/imagePreview.js') }}"></script>
    <script src="{{ asset('public/js/accountPage/mobileFormatter.js') }}"></script>

    <section class="account">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('public/images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('account.account') }}">
                    <p>личный кабинет</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Личный кабинет
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
                            <h2 class="chosen">Личные данные</h2>
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
                            <a href="{{  route('admin.index') }}">
                                <h2>Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <div class="account__personal__data">
                    <form
                        action="{{ route('account.updateUser') }}"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="account__box">
                            <label for="email">Email</label>
                            <input name="email" type="email" value="{{ auth()->user()->email }}" id="email">
                            <div class="error-form">
                                <p>@error('email') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="name">Имя*</label>
                            <input name="name" type="text" value="{{ auth()->user()->name }}" id="name">
                            <div class="error-form">
                                <p>@error('name') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="surname">Фамилия*</label>
                            <input name="surname" type="text" value="{{ auth()->user()->surname }}" id="surname">
                            <div class="error-form">
                                <p>@error('surname') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="patronymic">Отчество</label>
                            <input name="patronymic" type="text" value="{{ auth()->user()->patronymic }}"
                                   id="patronymic">
                            <div class="error-form">
                                <p>@error('patronymic') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="mobile">Телефон*</label>
                            <input name="mobile" type="text" value="{{ auth()->user()->mobile }}" id="mobile"
                                   placeholder="+7 (905) 538-90-04" maxlength="18">
                            <div class="error-form">
                                <p>@error('mobile') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="account__box date">
                            <label for="mobile">День рождения*</label>
                            <input type="date" name="birthDay" value="{{ auth()->user()->birthDay }}" id="mobile"
                                   placeholder="Год:Месяц:Число">
                            <div class="error-form">
                                <p>@error('birthDay') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        {{--                        <div class="account__box">--}}
                        {{--                            <label for="mobile">Подписка на новости</label>--}}
                        {{--                            <input--}}
                        {{--                                type="checkbox"--}}
                        {{--                                name="newsSubscription"--}}
                        {{--                                class="newsSubscription"--}}
                        {{--                                value="yes"--}}
                        {{--                                @if(auth()->user()->newsSubscription === 'true')--}}
                        {{--                                    checked--}}
                        {{--                                @endif--}}
                        {{--                            >--}}
                        {{--                        </div>--}}

                        <div class="account__box">
                            <div class="avatar-user-form">
                                <label for="image">Изменение фото профиля:</label>
                                <input type="file" name="avatar" id="image" accept="image/*">
                                <div class="error-form">
                                    <p>@error('avatar') {{ $message }} @enderror</p>
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
                            ">
                        </div>

                        <button type="submit">Обновить данные</button>
                    </form>


                </div>


            </div>
        </div>
    </section>
@endsection
