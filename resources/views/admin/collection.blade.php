@extends('layouts.layout')

@section('title', 'Изменение категорий')

@section('content')

    @if(session('success'))
        <div class="success-form show" id="success-message">
            <p>{{ session('success') }}</p>
        </div>
    @endif

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

                <a href="{{ route('admin.createProduct') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>добавление товара</p>
                </a>

                <a href="{{ route('admin.collectionPage') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>категории</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Категории
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
                            <a href="{{ route('admin.index') }}">
                                <h2 class="chosen">Админ панель</h2>
                            </a>
                        @endif
                    </div>
                </aside>

                <div class="account__personal__data">

                    <!-- Добавление категории -->
                    <div class="form__category">
                        <h3>
                            Добавление категории
                        </h3>
                        <form action="{{ route('admin.collection.store') }}" method="post" enctype="multipart/form-data" class="create">
                            @csrf
                            <input type="text" name="name" placeholder="Название категории" required>
                            <button type="submit">Добавить категорию</button>
                        </form>
                    </div>


                    <!-- Редактирование категории -->
                    <div class="form__category">
                        <h3>
                            Редактирование категории
                        </h3>
                        @foreach ($collection as $category)
                            <form action="{{ route('admin.collection.update', ['collection' => $category->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="category">
                                    <input type="text" name="name" value="{{ $category->name }}" required>
                                    <button type="submit">Сохранить изменения</button>
                                </div>
                            </form>
                        @endforeach
                        {{ $collection->links('pagination::bootstrap-5') }}



                    </div>


                    <!-- Удаление категории -->
                    <div class="form__category">
                        <h3>
                            Удаление категории
                        </h3>
                        @foreach ($collection as $category)
                            <form
                                action="{{ route('admin.collection.destroy', ['collection' => $category->id]) }}"
                                method="post"
                                enctype="multipart/form-data"
                                onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?')"
                                class="destroy"
                            >
                                @csrf
                                @method('DELETE')
                                <div class="category">
                                    <span>ID: {{ $category->id }} -- {{ $category->name }}</span>
                                    <button type="submit">Удалить категорию</button>
                                </div>
                            </form>
                        @endforeach
                        {{ $collection->links() }}
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
