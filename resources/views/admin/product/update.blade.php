@extends('layouts.layout')

@section('title', 'Редактирование товара: ' . $product->name)

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

                <a href="{{ route('admin.showAllProducts') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>товары</p>
                </a>

                <a href="{{ route('admin.createProduct') }}">
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                    <p>{{ $product->name }}</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    {{ $product->name }}
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
                        action="{{ route('admin.product.updateProduct', $product) }}"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="account__box">
                            <label for="id">ID товара:</label>
                            <p>{{ $product->id }}</p>
                        </div>

                        <div class="account__box">
                            <label for="name">Название товара</label>
                            <input name="name" type="text" id="name" placeholder="Cerastus Knight-Castigator"
                                   value="{{ $product->name }}">
                            <div class="error-form">
                                <p>@error('name') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="price">Цена товара</label>
                            <input name="price" type="text" id="price" placeholder="1 250 ₱"
                                   value="{{ $product->price }}">
                            <div class="error-form">
                                <p>@error('price') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="account__box">
                            <label for="quantity">Количество товара</label>
                            <input name="quantity" type="number" id="quantity" placeholder="999 шт."
                                   value="{{ $product->quantity }}">
                            <div class="error-form">
                                <p>@error('quantity') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="account__box">
                            <label for="description">Описание товара</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="">
                                {{ $product->description }}
                            </textarea>
                            <div class="error-form">
                                <p>@error('description') {{ $message }} @enderror</p>
                            </div>

                        </div>

                        <div class="account__box">
                            <label for="is_published">Опубликовать сразу?</label>
                            <input
                                id="is_published"
                                type="checkbox"
                                name="is_published"
                                class="newsSubscription"
                                value="yes"
                                {{ $product->is_published ? 'checked' : '' }}
                            >
                            <div class="error-form">
                                <p>@error('is_published') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <select name="collection_id">
                            @foreach($collections as $item)
                                <option value="{{ $item->id }}" @if($item->id == $product->collection_id) selected
                                        @endif name="collection_id">
                                    {{ $item->name }} - ID: {{ $item->products->count() }} товаров
                                </option>
                            @endforeach
                        </select>
                        <div class="error-form">
                            <p>@error('collection_id') {{$message}} @enderror</p>
                        </div>

                        <div class="account__box">
                            <label for="image_path">Изображения товара</label>
                            <input type="file" name="images[]" id="image_path" multiple accept="image/*">

                            <div class="error-form">
                                <p>@error('image_path') {{$message}} @enderror</p>
                            </div>
                        </div>

                        @if ($product->images->count() > 0)
                            <div>
                                <label>Фотографии продукта:</label>
                                <ul class="gallery">
                                    @foreach($product->images()->get() as $image)
                                        <div class="image">
                                            <img
                                                src="{{ $image->path() }}"
                                                alt="{{ $product->name }}"
                                                style="width: 100px; height: 100px; object-fit: cover;"
                                            >
                                            <input type="checkbox" name="deleted_images[]" value="{{ $image->id }}"
                                                   id="delete_{{ $image->id }}">
                                            <label for="delete_{{ $image->id }}" class="delete-button">Удалить</label>

                                        </div>
                                    @endforeach

                                </ul>
                            </div>
                        @endif

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

                        <div class="account__box">
                            <label for="quantity">Дата создания:</label>
                            <p>{{ $product->created_at }}</p>
                        </div>

                        <div class="account__box">
                            <label for="quantity">Дата обновления:</label>
                            <p>{{ $product->updated_at }}</p>
                        </div>

                        <button type="submit">Сохранить изменения</button>
                    </form>

                    <div class="admin__product-btn">
                        <a href="{{ route('admin.showAllProducts') }}">
                            <button class="back-button">
                                Назад
                            </button>
                        </a>

                        <a href="{{ route('product.show', $product) }}" target="_blank">
                            <button>
                                Открыть страницу товара
                            </button>
                        </a>

                        <form action="{{ route('admin.deleteProduct', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete"
                                    onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">Удалить
                                товар
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
