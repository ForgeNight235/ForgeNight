@section('meta-description', "Купите $product->name $collection->name в нашем магазине по выгодной цене. $product->name - идеальный выбор для вас. Заказывайте сейчас и получите быструю доставку.")



@extends('layouts.layout')

<script src=" {{ asset('js/singlePage/contentShowHide.js') }}" defer></script>
<script src="{{ asset('js/singlePage/reviewsPhotos.js') }}" defer></script>
<script src="{{ asset('js/singlePage/productQuantity.js') }}" defer></script>
<script src="{{ asset('js/singlePage/slider.js') }}" defer></script>

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

            </div>

            <div class="item__content__container">
                <div class="item-slider">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                         class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @if(empty($product->images->last()))
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('storage/product_photos/item_default_comp.webp') }}"
                                             alt="{{ $product->name }}">
                                    </div>
                                </div>
                            @else
                                @foreach($product->images()->get() as $image)
                                    <div class="swiper-slide">
                                        <div class="swiper-zoom-container">
                                            <img src="{{ $image->path() }}" alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>

                        @if($product->images()->count() > 1)
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        @endif

                    </div>

                    @if($product->images()->count() > 1)
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($product->images()->get() as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image->path() }}" alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <div class="item-info">
                    <div class="item-info-options">
                        <p id="product">доставка</p>
                        <p id="description">описание</p>
{{--                        <p id="reviews">отзывы</p>--}}
                    </div>

                    <div class="item-article">
                        <h2>
                            {{ $product->name }}
                        </h2>
                    </div>

                    <div class="item-id">
                        <span>Код товара: {{ $product->id }}</span>
                    </div>

                    @if($product->quantity > 0)
                    <form
                        action="{{ route('product.addToCart', $product->id) }}"
                        method="post"
                        enctype="multipart/form-data"
                        id="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <div class="item-form-block">
                            <p>{{ $product->price() }}</p>
                        </div>


                        <div class="item-form-block">
                            <button type="submit">
                                в корзину
                                <img src="{{asset('images/web-site_icons/addToCart.webp')}}" alt="addToCart">
                            </button>
                        </div>


                    </form>
                    @else
                        <div class="quantity-alert">
                            <p>
                                Извините, данное предложение больше недействительно.
                            </p>
                        </div>
                        <style>
                            .quantity-alert {
                                margin: 25px 0;
                            }
                            .quantity-alert p {
                                font-family: "Century Schoolbook", sans-serif;
                                font-size: 24px;
                                color: #ff0000; /* Красный цвет для предупреждения */
                            }
                        </style>
                    @endif


                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    <p>доставка</p> <br>
                                    @if(auth()->check())
                                        <span><i
                                                class="fa-solid fa-location-dot"></i> в {{ auth()->user()->city }}</span>
                                    @endif
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                    <p>оплата</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <p>
                                        Для оформления заказа в нашем магазине, оплата осуществляется переводом на
                                        карту. Вся необходимая информация и инструкции по оплате будут направлены вам на
                                        указанный электронный адрес.
                                        <br><br>
                                        После оплаты, наш администратор свяжется с вами для уточнения деталей заказа и
                                        подтверждения его оформления.
                                        <br><br>
                                        Благодарим вас за покупку в нашем магазине!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    <p>гарантии</p>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <p>
                                        Мы гарантируем качество всех изделий, которые вы приобретаете в нашем магазине.
                                        Каждое изделие проходит тщательную проверку перед отправкой. Мы также
                                        предоставляем бережную упаковку, чтобы ваш заказ достиг вас без повреждений.
                                        <br><br>
                                        В случае обнаружения некомплекта изделия, свяжитесь с нами в течение 7 дней с
                                        момента получения заказа. Мы с радостью отправим вам недостающие части в
                                        кратчайшие сроки.
                                        <br><br>
                                        Благодарим вас за выбор нашего магазина и надеемся на длительное сотрудничество!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-description closed">
                        <p>
                            @if(empty($product->description))
                                Добро пожаловать в наш магазин 3D-печатных моделей ForgeNight! Мы специализируемся на
                                производстве и продаже высококачественных моделей для любителей варгеймов и настольных
                                игр, особенно во вселенной Warhammer 40 000.
                                <br><br>
                                Наша продукция отличается уникальной детализацией и высокой прочностью благодаря
                                использованию SLA-печати с использованием смолы Anycubic. Каждая модель создается с
                                большой тщательностью, чтобы воссоздать самые малейшие детали и придать вашим игровым
                                сценариям неповторимый реализм.
                                <br><br>
                                Мы гордимся своим превосходным качеством печати, достигнутым благодаря слою печати в 15
                                микрон. Это позволяет нам воплотить в жизнь даже самые сложные и тонкие детали, делая
                                наши модели восхитительными визуально и приятными на ощупь.
                                <br><br>
                                В нашем магазине мы также предлагаем различные услуги и дополнительные возможности для
                                наших клиентов. Мы готовы оказать консультации по выбору моделей, помочь в поиске нужных
                                вам изделий и предоставить помощь со сборкой и покраской моделей.
                                <br><br>
                                Наш интернет-магазин уже имеет множество довольных клиентов и успешно реализованных
                                проектов. Мы стремимся к постоянному расширению ассортимента и обеспечению
                                удовлетворения потребностей наших клиентов.
                                <br><br>
                                Присоединяйтесь к нашей страсти к варгеймам и настольным играм! Откройте для себя
                                уникальные модели, созданные с любовью к деталям и непревзойденному качеству. Будем рады
                                помочь вам воплотить ваши игровые миры в реальность.
                            @else
                                {{ $product->description }}
                            @endif
                        </p>
                    </div>

{{--                    <div class="item-reviews closed">--}}
{{--                        <div class="item-review-card">--}}
{{--                            @if(auth()->check())--}}
{{--                                <div class="block">--}}
{{--                                    <div class="avatar">--}}

{{--                                        <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->login }}">--}}

{{--                                    </div>--}}
{{--                                    <div class="nickname">--}}
{{--                                        <p>{{ auth()->user()->login}}</p>--}}
{{--                                    </div>--}}

{{--                                    <div class="review_data">--}}
{{--                                    <span>--}}
{{--                                        {{ auth()->user()->createdDate()}}--}}
{{--                                    </span>--}}

{{--                                        <div class="review-mark">--}}
{{--                                            <i class="fa-solid fa-star"></i>--}}
{{--                                            <i class="fa-solid fa-star"></i>--}}
{{--                                            <i class="fa-solid fa-star"></i>--}}
{{--                                            <i class="fa-solid fa-star"></i>--}}
{{--                                            <i class="fa-solid fa-star"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="text">--}}
{{--                                    <p>--}}
{{--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam doloribus--}}
{{--                                        incidunt ipsa laudantium praesentium quaerat recusandae. Deleniti facilis harum--}}
{{--                                        maiores modi nisi quos recusandae reiciendis repellat sequi! Assumenda--}}
{{--                                        consequatur corporis dolor doloremque incidunt inventore minus nemo possimus--}}
{{--                                        quibusdam voluptatibus! Ab adipisci alias aperiam aspernatur at aut blanditiis--}}
{{--                                        commodi consequatur deserunt dicta doloremque eaque eos eum fuga illo incidunt--}}
{{--                                        ipsam itaque laborum nemo odio odit officia officiis placeat quae quasi quis--}}
{{--                                        quo, recusandae rem sequi sunt vitae voluptas, voluptates voluptatibus? Ad--}}
{{--                                        aliquid architecto atque dolore ea eius esse, laborum numquam omnis, quasi quia--}}
{{--                                        quibusdam quo quod rem repellat sapiente tenetur totam.--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="gallery">--}}
{{--                                    @foreach($product->images()->get() as $image)--}}
{{--                                        <div class="image">--}}
{{--                                            <img src="{{ $image->path() }}" alt="{{ $product->name }}">--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}


{{--                                </div>--}}
{{--                            @else--}}
{{--                                Ещё нет отзывов на этот товар.--}}
{{--                                <br><br>--}}
{{--                                Станьте первым!--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                    </div>--}}

                </div>


                {{--Стили перемещать нельзя, иначе конфликт с js
                и php разметка не работает в xxx.css--}}
                <style>
                    @if(empty($product->images->last() ) )
                    .section-article h1 {
                        background-color: #320001;
                    }

                    @else
                    .section-article h1 {
                        background: url({{ $product->images->last()->path() }}) no-repeat center center;
                        background-color: #320001;
                    }
                    @endif
                    .item-reviews.closed {
                        display: none;
                    }

                    .accordion.closed {
                        display: none;
                    }

                    .item-description.closed {
                        display: none;
                    }

                    .item-description {
                        display: grid;
                    }
                </style>
                <script>
                    // Слайдер для страницы одного товара

                    const itemSlider = () => {
                        var thumbsSwiper = new Swiper(".item__content__container .mySwiper", {
                            loop: true,
                            spaceBetween: 10,
                            slidesPerView: 3,
                            freeMode: true,
                            watchSlidesProgress: true,
                        });

                        var gallerySwiper = new Swiper(".item__content__container .mySwiper2", {
                            loop: true,
                            spaceBetween: 10,
                            navigation: {
                                nextEl: ".item__content__container .swiper-button-next",
                                prevEl: ".item__content__container .swiper-button-prev",
                            },
                            thumbs: {
                                swiper: thumbsSwiper,
                            },
                            zoom: {
                                enabled: true,
                                maxRatio: 3,
                            }
                        });
                    };

                    const initItemSlider = () => {
                        itemSlider();
                    };

                    document.addEventListener('DOMContentLoaded', initItemSlider);

                    // Скрытие - открытие секций о доставке товаров, описание товара и отзывы
                    const itemConfig = () => {
                        const itemInfo = document.querySelector('.accordion');
                        const itemDescription = document.querySelector('.item-description');
                        // const itemReviews = document.querySelector('.item-reviews');

                        const itemInfoBtn = document.getElementById("product");
                        const itemDescriptionBtn = document.getElementById("description");
                        // const itemReviewsBtn = document.getElementById("reviews");

                        itemDescriptionBtn.addEventListener('click', () => {
                            itemInfo.classList.toggle('closed', true);
                            // itemReviews.classList.toggle('closed', true);
                            itemDescription.classList.toggle('closed', false);
                        });

                        itemInfoBtn.addEventListener('click', () => {
                            itemInfo.classList.toggle('closed', false);
                            itemDescription.classList.toggle('closed', true);
                            // itemReviews.classList.toggle('closed', true);
                        });

                        // itemReviewsBtn.addEventListener('click', () => {
                        //     itemReviews.classList.toggle('closed', false);
                        //     itemDescription.classList.toggle('closed', true);
                        //     itemInfo.classList.toggle('closed', true);
                        // });
                    }

                    const initItemConfig = () => {
                        itemConfig();
                    }

                    document.addEventListener('DOMContentLoaded', initItemConfig);



                </script>

            </div>

        </div>
        @include('components.bestBuysByCategory')
    </section>



@endsection
