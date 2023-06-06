@extends('layouts.layout')

@section('title', 'Редактирование товара: ' . $product->name)

@section('content')

    @if(session('success'))
        <div class="success-form show" id="success-message">
            <p>{{ session('success') }}</p>
        </div>
    @endif

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
                            <input name="name" type="text" id="name" placeholder="Cerastus Knight-Castigator" value="{{ $product->name }}">
                            <div class="error-form">
                                <p>@error('name') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="account__box">
                            <label for="price">Цена товара</label>
                            <input name="price" type="text" id="price" placeholder="1 250 ₱" value="{{ $product->price }}">
                            <div class="error-form">
                                <p>@error('price') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="account__box">
                            <label for="quantity">Количество товара</label>
                            <input name="quantity" type="number" id="quantity" placeholder="999 шт." value="{{ $product->quantity }}">
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

                            <style>
                                .account__box p
                                {
                                    margin: 0;
                                }
                                .account .account-content .account__box textarea#description
                                {
                                    padding: 35px 15px;
                                }
                            </style>

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
                                <option value="{{ $item->id }}" @if($item->id == $product->collection_id) selected @endif name="collection_id">
                                    {{ $item->name }} - ID: {{ $item->products->count() }} шт.
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

                        <style>
                            section.account .account__personal__data form ul.gallery
                            {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 15px;
                                margin: 15px 0;
                                padding: 0;
                            }

                            section.account .account__personal__data form ul.gallery .image
                            {
                                display: grid;
                                gap: 8px;
                            }
                            section.account .account__personal__data form ul.gallery .image label.delete-button
                            {
                                text-align: center;
                            }
                            .delete-button {
                                display: inline-block;
                                padding: 6px 12px;
                                background-color: #ff6347;
                                color: #ffffff;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                                text-decoration: none;
                            }

                            .delete-button:hover {
                                background-color: #ff4d32;
                            }

                            .delete-button:focus {
                                outline: none;
                                box-shadow: 0 0 0 3px rgba(255, 99, 71, 0.3);
                            }

                            section.account .account__personal__data form
                            {
                                align-items: center;
                                font-family: 'Century Gothic', sans-serif;
                                font-style: normal;
                                font-weight: 400;
                                font-size: 20px;
                                line-height: 25px;
                                color: #232323;
                            }
                        </style>

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
                                            <input type="checkbox" name="deleted_images[]" value="{{ $image->id }}" id="delete_{{ $image->id }}">
                                            <label for="delete_{{ $image->id }}" class="delete-button">Удалить</label>

                                        </div>
                                    @endforeach
{{--                                    @foreach ($product->images->get() as $image)--}}
{{--                                        <li>--}}
{{--                                            @if($product->images()->count() > 0)--}}
{{--                                                <img--}}
{{--                                                    src="{{ $product->path() }}"--}}
{{--                                                     alt="{{ $product->name }}"--}}
{{--                                                    style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;"--}}
{{--                                                >--}}
{{--                                            @endif--}}
{{--                                            <input type="checkbox" name="deleted_images[]" value="{{ $image->id }}"> Удалить--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
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
                            <button type="submit" class="delete" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">Удалить товар</button>
                        </form>
                    </div>


                    <style>
                        .admin__product-btn {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin: 20px 0;
                        }

                        .admin__product-btn a {
                            text-decoration: none;
                        }

                        .admin__product-btn button {
                            padding: 10px 20px;
                            border-radius: 5px;
                            font-size: 16px;
                            font-weight: bold;
                            color: #ffffff;
                            background-color: #f4dc5e;
                            border: none;
                            cursor: pointer;
                            transition: background-color 0.3s ease;
                        }

                        .admin__product-btn button:hover {
                            background-color: #f2f2f2;
                            color: #212529;
                        }

                        .admin__product-btn .delete {
                            padding: 10px 20px;
                            border-radius: 5px;
                            font-size: 16px;
                            font-weight: bold;
                            color: #ffffff;
                            background-color: #ff6347;
                            border: none;
                            cursor: pointer;
                            transition: background-color 0.3s ease;
                        }

                        .admin__product-btn .delete:hover {
                            background-color: #e0e0e0;
                            color: #212529;
                        }

                        .admin__product-btn .back-button {
                            padding: 10px 20px;
                            border-radius: 5px;
                            font-size: 16px;
                            font-weight: bold;
                            color: #ffffff;
                            background-color: #0d6efd;
                            border: none;
                            cursor: pointer;
                            transition: background-color 0.3s ease;
                        }

                        .admin__product-btn .back-button:hover {
                            background-color: #e0e0e0;
                            color: #212529;
                        }

                        .account__personal__data form
                        {
                            width: fit-content;
                        }

                    </style>
                </div>

            </div>
        </div>
    </section>
@endsection
