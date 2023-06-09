@if(session('success'))
    <div class="success-form show" id="success-message">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session('failure'))
    <div class="failure-form show" id="failure-message">
        <p>{{ session('failure') }}</p>
    </div>
@endif
<script src="{{ asset('js/header/logoutBtn.js') }}" defer></script>

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
{{--                    <a href="/wishlist">--}}
{{--                        <img src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">--}}
{{--                    </a>--}}
                    <div class="header__account-container">
                        @if(auth()->user())
                            <a href="{{ route('account.account') }}" class="header__account-link">
                                <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                            </a>
                        @else
                            <a href="{{ route('page.register') }}" class="header__account-link">
                                <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                            </a>
                        @endif

                        @guest()
                            <ul class="header__account-menu">
                                <li><a href="{{ route('page.login') }}">Вход</a></li>
                                <li><a href="{{ route('page.register') }}">Регистрация</a></li>
                            </ul>
                        @endguest

                        @auth()
                            <ul class="header__account-menu" style="text-align:left; top: 35px">
                                <li><a href="{{ route('account.account') }}">Мой аккаунт</a></li>
                                <li><p class="logout-btn" data-logouturl="{{ route('auth.logoutUser') }}">Выход</p></li>
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
                            <li><a href="{{ route('page.catalog') }}">Каталог</a></li>
                            <li><a href="/cart">Корзина</a></li>
                        </ul>
                    @endguest

                    @auth()
                        <ul class="header__account-menu" style="text-align:left; top: 35px; padding: 0">
                            <li><a href="{{ route('account.account') }}">Мой аккаунт</a></li>
                            <li><a href="{{ route('page.catalog') }}">Каталог</a></li>
                            <li><a href="/cart">Корзина</a></li>
                            <li><p class="logout-btn" data-logouturl="{{ route('auth.logoutUser') }}">Выход</p></li>
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
{{--            <a href="/wishlist">--}}
{{--                <img src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">--}}
{{--            </a>--}}
            @if(auth()->user())
                <a href="{{ route('account.account') }}" class="account-link">
                    <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                </a>
            @else
                <a href="{{ route('page.register') }}" class="account-link">
                    <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                </a>
            @endif
        </li>

        <li class="account-settings-low-devices">
            <a href="/cart">
                <img src="{{ asset('images/web-site_icons/cart-icon.svg') }}" alt="cart">
            </a>
            @if(auth()->user())
                <a href="{{ route('account.account') }}" class="account-link">
                    <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                </a>
            @else
                <a href="{{ route('page.register') }}" class="account-link">
                    <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                </a>
            @endif
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
