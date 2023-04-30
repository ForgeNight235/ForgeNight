<header class="header">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="/">
                        <img
                            src="{{ asset('images/logo/svg/forgenight_logo.svg') }}"
                            alt="ForgeNight"
                            title="ForgeNight — это творчество и индивидуальность в каждой миниатюре">
                    </a>
                </li>
                <li class="header-link">
                    <a href="">о нас</a>
                </li>
                <li class="header-link">
                    <a href="">контакты</a>
                </li>
                <li class="header-link">
                    <a href="">чаво</a>
                </li>
                <li class="search">
                    <input type="search">
                    <div class="search-btn">
                        <a href="/">
                            <img src="{{ asset('images/web-site_icons/search.svg') }}" alt="search">
                        </a>
                    </div>
                </li>

                <li class="account-settings">
                    <a href="/cart">
                        <img src="{{ asset('images/web-site_icons/cart-icon.svg') }}" alt="cart">
                    </a>
                    <a href="/wishlist">
                        <img src="{{ asset('images/web-site_icons/wishlist.svg') }}" alt="wishlist">
                    </a>
                    <a href="/account">
                        <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
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
                    <a href="/account" class="account-link">
                        <img src="{{ asset('images/web-site_icons/account.svg') }}" alt="account">
                        Личный кабинет
                    </a>
                    <a href="?">О нас</a>
                    <a href="?">Контакты</a>
                    <a href="?">Чаво</a>
                    <a href="?">Вход</a>
                    <a href="?">Регистрация</a>
                    </div>
            </div>

        </div>

        <a href="/">
            <img
                src="{{ asset('images/logo/svg/forgenight_logo.svg') }}"
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
            <a href="/account" class="account-link">
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



        <style>
            @media screen and (max-width: 425px) {
                .header__mobile .container img {
                    max-height: 40px !important;
                }
                .account-settings-low-devices{
                    display: flex !important;
                    gap: 10px;
                }
                .header__mobile .container .account-link{
                    display: none;
                }
                .header__mobile .container .burger-container .account-link{
                    display: block !important;
                }
                .header__mobile .burger, .header__mobile .account-settings{
                    width: 80px !important;
                }
                .header__mobile .account-settings{
                    gap: 10px;
                }
                .account-settings{
                    display: none;
                }
            }

            .header__mobile .container .burger-container .account-link{
                display: none;
            }

            .account-settings-low-devices{
                display: none;
            }

            .header__container-search{
                padding: 0 35px;
                max-width: 1200px;
                margin: 0 auto;
            }
            .header__container-search .search input{
                min-height: 27px;
                padding: 6px 16px;
                font-family: 'Century Gothic', sans-serif;
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 15px;
                color: #827D7D;
                outline: none;
            }

            .header__mobile li{
                list-style: none;
            }

            .header__mobile input{
                background: none;
                border-radius: 5px;
                width: 100%;
                border: 1px solid #232323;
            }

            .header__mobile .container .account-settings, .burger{
                width: 130px;
            }

            .header__mobile .container{
                display: grid;
                grid-template-columns: repeat(3, auto);
                align-items: center;
                justify-content: space-between;
            }

            .header__mobile .container img{
                max-height: 60px;
            }

            .header__mobile .container .account__management{

            }
            /* стили для кнопки бургера */
            .burger-container{
                padding: 90px 35px;
            }
            .burger {
                z-index: 123;
                cursor: pointer;
                flex-direction: column;
            }
            .burger-container{
                max-width: 500px;
                width: 85%;
                height: 100%;
                background: #f2f2f2;
            }

            .burger__line {
                width: 30px;
                height: 4px;
                background-color: #000;
                margin: 6px 0;
                transition: all .3s ease;
            }

            /* стили для меню */
            .menu {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.3);
                z-index: 100;
                overflow-y: auto;
                transition: .3s ease-in-out;
            }

            .menu__item {
                display: grid;
                padding: 20px;
                gap: 15px;
                cursor: pointer;
                transition: all .3s ease;
            }

            .menu__item a{
                font-family: 'century gothic', sans-serif;
                color: #232323;
                font-size: 24px;
                font-weight: bold;
                text-transform: uppercase;
                text-decoration: none;
            }

            /* отображаем меню при клике на бургер */
            .burger.active .burger__line:first-child {
                transform: translateY(10px) rotate(45deg);
            }
            .burger.active .burger__line:nth-child(2) {
                opacity: 0;
            }
            .burger.active .burger__line:last-child {
                transform: translateY(-10px) rotate(-45deg);
            }
            .menu.active {
                display: block;
            }

            /* стили для анимации меню */
            .menu {
                opacity: 0;
                transform: translateY(-100%);
                transition: all .3s ease;
            }

            .menu.active {
                opacity: 1;
                transform: translateY(0%);
            }

            body.locked{
                overflow: hidden;
            }



        </style>



        <script>
            const burger = document.querySelector('.burger');
            const body = document.querySelector('body');
            const menu = document.querySelector('.menu');
            const closeMenuButton = document.querySelector('.close-menu');

            // обработчик клика на бургер
            burger.addEventListener('click', () => {
                burger.classList.toggle('active');
                body.classList.toggle('locked');
                menu.classList.toggle('active');
            });

            // обработчик клика на кнопку закрытия меню
            closeMenuButton.addEventListener('click', () => {
                burger.classList.remove('active');
                menu.classList.remove('active');
            });

        </script>

    </div>

    <div class="header__container-search">
        <li class="search">
            <input type="search" placeholder="я ищу...">
            <div class="search-btn">
                <a href="/">
                    <img src="{{ asset('images/web-site_icons/search.svg') }}" alt="search">
                </a>
            </div>
        </li>
    </div>

</header>
