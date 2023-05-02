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
                    <a href="{{ route('page.register') }}">
                        <img src="{{ asset('public/images/web-site_icons/account.svg') }}" alt="account">
                    </a>
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
                    <a href="{{ route('page.register') }}" class="account-link">
                        <img src="{{ asset('public/images/web-site_icons/account.svg') }}" alt="account">
                        Личный кабинет
                    </a>
                    <a href="{{ route('page.catalog') }}">каталог</a>
                    <a href="?">Контакты</a>
                    <a href="?">Чаво</a>
                    <a href="?">Вход</a>
                    <a href="?">Регистрация</a>
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
