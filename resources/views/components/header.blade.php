<header class="header">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="/">
                        <img
                            src="{{ asset('images/logo/webp/forgenight_logo.webp') }}"
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
                <form
                    action="{{ route('page.catalog') }}"
                    method="GET"
                    class="search"
                >
                    <input type="search" placeholder="я ищу..." name="searchRequest" value="{{ old('searchRequest') }}">
                    <div class="search-btn">
                        <button>
                            <img src="{{ asset('images/web-site_icons/search.svg') }}" alt="search">
                        </button>
                    </div>
                </form>

                <li class="account-settings">
                    <a href="/cart">
                        <img src="{{ asset('images/web-site_icons/cart-icon.svg') }}" alt="cart">
                    </a>
                    <a href="/wishlist">
                        <img src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">
                    </a>
                    <div class="header__account-container">
                        <a href="{{ route('page.register') }}" class="header__account-link">
                            <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
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
                                <li><p id="logout-btn" data-logouturl="{{ route('auth.logoutUser') }}">Выход</p></li>
                            </ul>
                        @endauth

                    </div>

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
                                <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                                Личный кабинет
                            </a>
                            <li><p href="" id="logoutMobile-btn">Выход</p></li>
                        </ul>
                    @endauth

                </div>
            </div>

        </div>

        <a href="/">
            <img
                src="{{ asset('images/logo/webp/forgenight_logo.webp') }}"
                alt="ForgeNight"
                title="ForgeNight — это творчество и индивидуальность в каждой миниатюре">
        </a>

        <li class="account-settings">
            <a href="/cart">
                <img src="{{ asset('images/web-site_icons/cart-icon.svg') }}" alt="cart">
            </a>
            <a href="/wishlist">
                <img src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">
            </a>
            <a href="{{ route('page.register') }}" class="account-link">
                <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
            </a>
        </li>

        <li class="account-settings-low-devices">
            <a href="/cart">
                <img src="{{ asset('images/web-site_icons/cart-icon.svg') }}" alt="cart">
            </a>
            <a href="/wishlist">
                <img src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">
            </a>
        </li>


    </div>

    <form
        action="{{ route('page.catalog') }}"
        method="GET"
        class="search"
    >
        <input type="search" placeholder="я ищу..." name="searchRequest" value="{{ old('searchRequest') }}">
        <div class="search-btn">
            <button>
                <img src="{{ asset('images/web-site_icons/search.svg') }}" alt="search">
            </button>
        </div>
    </form>

</header>
