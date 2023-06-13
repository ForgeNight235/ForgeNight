@extends('layouts.layout')

@section('title', 'Админ панель')

@section('content')
    <section class="account admin">
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
                <a href="{{ route('admin.index') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>админ панель</p>
                </a>
                <a href="{{ route('admin.allUsers') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>все пользователи</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Все пользователи
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

                        <a href="{{ route('account.accountPassword') }}">
                            <h2>Смена пароля</h2>
                        </a>

                        @if(auth()->user()->role==='admin')
                            <a href="{{  route('admin.index') }}">
                                <h2 class="chosen">Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <div class="content">
                    @if(count($users))

                        <div class="users">
                            @foreach($users as $user)
                                <div class="user">
                                    <img src="{{ $user->avatarUrl() }}" alt="{{ $user->login }}" title="{{ $user->name }}">

                                    <div class="box">
                                        <p>{{ $user->name }}</p>
                                        <span>@.{{ $user->login }}</span>
                                    </div>
                                    <div class="user-details">
                                        <p>Адрес: {{ $user->address }}</p>
                                        <p>Индекс: {{ $user->index }}</p>
                                        <p>Город: {{ $user->city }}</p>
                                        <p>Мобильный телефон: {{ $user->mobile }}</p>
                                        <p>Дата рождения: {{ $user->birthDay }}</p>
                                        <p>Дата создания аккаунта: {{ $user->createdDate() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <style>
                            .user-details {
                                display: none;
                                padding: 15px;
                                width: 400px;
                                background: #fff;
                                border-radius: 20px;
                                max-height: 0;
                                transition: max-height 0.3s ease;
                                overflow: hidden;
                            }
                            .user-details.open {
                                display: block;
                                max-height: 400px;
                                transition: max-height 0.3s ease;
                            }
                            .user-details.closed {
                                max-height: 0;
                            }

                            .user-details p {
                                margin: 5px 0;
                            }
                        </style>

                        <script>
                            // Получите все блоки пользователей
                            const users = document.querySelectorAll('.user');

                            // Обработчик события для каждого блока пользователя
                            users.forEach(user => {
                                // Находим блок с подробной информацией внутри блока пользователя
                                const userDetails = user.querySelector('.user-details');

                                // Добавляем обработчик события на клик по блоку пользователя
                                user.addEventListener('click', () => {
                                    // Проверяем, активен ли уже блок с подробной информацией
                                    const isActive = userDetails.classList.contains('open');

                                    // Скрываем все блоки с подробной информацией
                                    users.forEach(u => {
                                        u.querySelector('.user-details').classList.remove('open');
                                        u.querySelector('.user-details').classList.add('closed');
                                    });

                                    // Если блок уже активен, скрываем его, иначе показываем
                                    if (isActive) {
                                        userDetails.classList.remove('open');
                                        userDetails.classList.add('closed');
                                    } else {
                                        userDetails.classList.remove('closed');
                                        userDetails.classList.add('open');
                                    }
                                });
                            });
                        </script>

                    @else
                        <h3>
                            Пользователей нет на сайте
                        </h3>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
