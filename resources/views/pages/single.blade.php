@extends('layouts.layout')

@section('title', $product->name)

@section('content')
    <section class="item">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                </a>
                <a href="{{ route('page.catalog') }}">
                    <p>каталог</p>
                </a>
                @if($collection)
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <a href="{{ route('page.catalog', ['collection' => $collection->id]) }}">
                        {{ $collection->name }}
                    </a>
                @else
                @endif

                <a href="{{ route('product.show', $product) }}">
                    <img src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}" alt="back">
                    <p>{{ $product->name }}</p>
                </a>

            </div>

            <div class="section-article">
                <h1>
                    {{ $product->name }}
                </h1>
                {{--Стили перемещать нельзя, т.к. php код не работает в css--}}
                <style>
                    .section-article h1 {
                        background: url({{ $product->images->last()->path() }}) no-repeat center center;
                        background-color: #320001;
                    }
                </style>

            </div>

            <div class="item__content__container">
                <div class="item-slider">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @foreach($product->images()->get() as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->path() }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($product->images()->get() as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->path() }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="item-info">
                    <div class="item-info-options">
                        <p id="product">доставка</p>
                        <p id="description">описание</p>
                        <p id="reviews">отзывы</p>
                    </div>

                    <div class="item-article">
                        <h2>
                            {{ $product->name }}
                        </h2>
                    </div>

                    <div class="item-id">
                        <span>Код товара: {{ $product->id }}</span>
                    </div>

                    <form
                        action=""
                        method="post"
                        enctype="multipart/form-data"
                    >
                        <div class="item-form-block">
                            <p>{{ $product->price() }}</p>

                            <div class="product-quantity">
                                <button type="button" class="btn btn-sm btn-minus"><i class="fas fa-minus"></i></button>
                                <input type="number" class="form-control form-control-sm" name="quantity" min="1" value="1">
                                <button type="button" class="btn btn-sm btn-plus"><i class="fa fa-plus"></i></button>
                            </div>

                        </div>

                        <div class="item-form-block">
                            <button>
                                в корзину
                                <img src="{{asset('images/web-site_icons/addToCart.webp')}}" alt="">
                            </button>

                            <button class="wishlist">
                                <img class="wishlist" src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">
                            </button>
                        </div>

                    </form>

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <p>доставка</p> <br>
                                    @if(auth()->check())
                                        <span><i class="fa-solid fa-location-dot"></i> в {{ auth()->user()->city }}</span>
                                    @endif
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <table>
                                        <tr>
                                            <td>Самовывоз</td>
                                            <td><span>Сегодня</span></td>
                                            <td>Бесплатно</td>
                                        </tr>
                                        <tr>
                                            <td>Курьерская доставка</td>
                                            <td><span>Послезавтра</span></td>
                                            <td>от 500р.</td>
                                        </tr>
                                        <tr>
                                            <td>Почта России</td>
                                            <td><span>Завтра</span></td>
                                            <td>от 250р.</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <p>оплата</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <p>
                                        Для оформления заказа в нашем магазине, оплата осуществляется переводом на карту. Вся необходимая информация и инструкции по оплате будут направлены вам на указанный электронный адрес.
                                        <br><br>
                                        После оплаты, наш администратор свяжется с вами для уточнения деталей заказа и подтверждения его оформления.
                                        <br><br>
                                        Благодарим вас за покупку в нашем магазине!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    <p>гарантии</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <p>
                                        Мы гарантируем качество всех изделий, которые вы приобретаете в нашем магазине. Каждое изделие проходит тщательную проверку перед отправкой. Мы также предоставляем бережную упаковку, чтобы ваш заказ достиг вас без повреждений.
                                        <br><br>
                                        В случае обнаружения некомплекта изделия, свяжитесь с нами в течение 7 дней с момента получения заказа. Мы с радостью отправим вам недостающие части в кратчайшие сроки.
                                        <br><br>
                                        Благодарим вас за выбор нашего магазина и надеемся на длительное сотрудничество!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-description closed">
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="item-reviews closed">
                        <div class="item-review-card">
                            @if(auth()->check())
                                <div class="block">
                                    <div class="avatar">

                                        <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->login }}">

                                    </div>
                                    <div class="nickname">
                                        <p>{{ auth()->user()->login}}</p>
                                    </div>

                                    <div class="review_data">
                                    <span>
                                        {{ auth()->user()->createdDate()}}
                                    </span>

                                        <div class="review-mark">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam doloribus incidunt ipsa laudantium praesentium quaerat recusandae. Deleniti facilis harum maiores modi nisi quos recusandae reiciendis repellat sequi! Assumenda consequatur corporis dolor doloremque incidunt inventore minus nemo possimus quibusdam voluptatibus! Ab adipisci alias aperiam aspernatur at aut blanditiis commodi consequatur deserunt dicta doloremque eaque eos eum fuga illo incidunt ipsam itaque laborum nemo odio odit officia officiis placeat quae quasi quis quo, recusandae rem sequi sunt vitae voluptas, voluptates voluptatibus? Ad aliquid architecto atque dolore ea eius esse, laborum numquam omnis, quasi quia quibusdam quo quod rem repellat sapiente tenetur totam.
                                    </p>
                                </div>

                                <div class="gallery">
                                    @foreach($product->images()->get() as $image)
                                        <div class="image">
                                            <img src="{{ $image->path() }}" alt="{{ $product->name }}">
                                        </div>
                                    @endforeach

                                    <script src=" {{ asset('js/singlePage/contentShowHide.js') }}" defer></script>

                                </div>
                            @else
                                Ещё нет отзывов на этот товар.
                                <br><br>
                                Станьте первым!
                            @endif
                        </div>

                    </div>

                </div>



                {{--Стили перемещать нельзя, иначе конфликт с js--}}
                <style>
                    .item-reviews.closed{
                        display: none;
                    }
                    .accordion.closed{
                        display: none;
                    }
                    .item-description.closed{
                        display: none;
                    }
                    .item-description{
                        display: grid;
                    }
                </style>

            </div>
            <script src="{{ asset('js/singlePage/reviewsPhotos.js') }}" defer></script>

            <script src="{{ asset('js/singlePage/productQuantity.js') }}" defer></script>

            <script src="{{ asset('js/singlePage/slider.js') }}" defer></script>

            <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js') }}"></script>
        </div>
    </section>

    @include('components.bestBuysByCategory')

@endsection
