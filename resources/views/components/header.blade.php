<header class="header">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="/">
                        <img
                            src="{{ asset('public/images/logo/webp/forgenight_logo.webp') }}"
                            alt="ForgeNight"
                            title="ForgeNight — это творчество и индивидуальность в каждой миниатюре">
                    </a>
                </li>
                <li class="header-link">
                    <a href="{{ route('page.catalog') }}">каталог</a>
                </li>
                <li class="header-link">
                    <a href="">контакты</a>
                </li>
                <li class="header-link">
                    <a href="">чаво</a>
                </li>
                <li class="search">
                    <input type="search" class="search">
                    <div class="search-btn">
                        <a href="/">
                            <img src="{{ asset('public/images/web-site_icons/search.svg') }}" alt="search">
                        </a>
                    </div>
                </li>

                <li class="account-settings">
                    <a href="/cart">
                        <img src="{{ asset('public/images/web-site_icons/cart-icon.svg') }}" alt="cart">
                    </a>
                    <a href="/wishlist">
                        <img src="{{ asset('public/images/web-site_icons/wishlist.svg') }}" alt="wishlist">
                    </a>
                    <div class="header__account-container">
                        <a href="{{ route('page.register') }}" class="header__account-link">
                            <img src="{{ asset('public/images/web-site_icons/account.svg') }}" alt="account">
                        </a>

                        @guest()
                            <ul class="header__account-menu">
                                <li><a href="{{ route('page.login') }}">Вход</a></li>
                                <li><a href="{{ route('page.register') }}">Регистрация</a></li>
                            </ul>
                        @endguest

                        @auth()
                            <ul class="header__account-menu" style="right: 0; text-align:right; top: 35px">
                                <li><a href="{{ route('account.account') }}">Личный кабинет</a></li>
                                <li><p href="" id="logout-btn">Выход</p></li>
                            </ul>
                        @endauth

                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.min.css">
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.min.js"></script>
                        @include('pages/auth/logout')

                    </div>

                    <script>
                        const link = document.querySelector('.header__account-link');
                        const menu = document.querySelector('.header__account-menu');
                        let timeoutId;

                        link.addEventListener('mouseenter', () => {
                            clearTimeout(timeoutId);
                            menu.style.display = 'block';
                        });

                        menu.addEventListener('mouseleave', () => {
                            timeoutId = setTimeout(() => {
                                menu.style.display = 'none';
                                menu.style.right = '0';
                                menu.style.textAlign = 'right';
                            }, 1000); // добавляем задержку в 500 миллисекунд (полсекунды)
                        });
                    </script>

                    <style>
                        .header__account-container ul{
                            width: max-content;
                            position: absolute;
                            display: none;
                            gap: 10px;
                        }
                        .header__account-container{
                            position: relative;
                        }
                        .header__account--link:hover + .header__account--menu {
                            display: block;
                        }

                        .header__account--menu {
                            display: none;
                            position: absolute;
                            top: 100%;
                            left: 0;
                            background-color: #f9f9f9;
                            border: 1px solid #ddd;
                            padding: 0;
                            margin: 0;
                            list-style: none;
                        }

                        .header__account--menu li {
                            margin: 0;
                        }

                        .header__account--menu a {
                            display: block;
                            padding: 10px;
                            text-decoration: none;
                            color: #333;
                        }

                        .header__account--menu a:hover {
                            background-color: #f2f2f2;
                        }
                    </style>

                </li>
            </ul>
        </nav>
    </div>
</header>

<header class="header__mobile">
    <div class="container">
        <!-- кнопка бургера -->
        <div class="burger">
            <div class="burger__line"></div>
            <div class="burger__line"></div>
            <div class="burger__line"></div>
        </div>

        <!-- меню -->
        <div class="menu">
            <div class="burger-container">
                <div class="menu__item">

                    @guest()
                        <ul class="header__account-menu">
                            <li><a href="{{ route('page.login') }}">Вход</a></li>
                            <li><a href="{{ route('page.register') }}">Регистрация</a></li>
                        </ul>
                    @endguest

                    @auth()
                        <ul class="header__account-menu" style="right: 0; text-align:right; top: 35px">
                            <a href="{{ route('page.catalog') }}" class="account-link">
                                <img src="{{ asset('public/images/web-site_icons/account.svg') }}" alt="account">
                                Личный кабинет
                            </a>
                            <li><p href="" id="logoutMobile-btn">Выход</p></li>
                        </ul>
                    @endauth
                    @include('pages/auth/logoutMobile')
                </div>
            </div>

        </div>

        <a href="/">
            <img
                src="{{ asset('public/images/logo/webp/forgenight_logo.webp') }}"
                alt="ForgeNight"
                title="ForgeNight — это творчество и индивидуальность в каждой миниатюре">
        </a>

        <li class="account-settings">
            <a href="/cart">
                <img src="{{ asset('public/images/web-site_icons/cart-icon.svg') }}" alt="cart">
            </a>
            <a href="/wishlist">
                <img src="{{ asset('public/images/web-site_icons/wishlist.svg') }}" alt="wishlist">
            </a>
            <a href="{{ route('page.register') }}" class="account-link">
                <img src="{{ asset('public/images/web-site_icons/account.svg') }}" alt="account">
            </a>
        </li>

        <li class="account-settings-low-devices">
            <a href="/cart">
                <img src="{{ asset('public/images/web-site_icons/cart-icon.svg') }}" alt="cart">
            </a>
            <a href="/wishlist">
                <img src="{{ asset('public/images/web-site_icons/wishlist.svg') }}" alt="wishlist">
            </a>
        </li>


    </div>

    <div class="header__container-search">
        <li class="search">
            <input type="search" placeholder="я ищу...">
            <div class="search-btn">
                <a href="/">
                    <img src="{{ asset('public/images/web-site_icons/search.svg') }}" alt="search">
                </a>
            </div>
        </li>
    </div>

</header>
