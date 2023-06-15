<footer>
    <div class="container">
        <div class="footer-section">
            <a href="/">
                <img
                    src="{{ asset('images/logo/webp/forgenight_logo.webp') }}"
                    alt="ForgeNight"
                    title="ForgeNight — это творчество и индивидуальность в каждой миниатюре"
                >
            </a>

            <div class="footer-section-links">
                <a target="_blank" href="https://vk.com/forgenight">
                    <img src="{{ asset('images/web-site_icons/vk.svg') }}" alt="ВКонтакте">
                </a>
                <a target="_blank" href="https://www.youtube.com/channel/UCG7Xhyi01dHEiHCgy3u9SPw">
                    <img src="{{ asset('images/web-site_icons/youtube.webp') }}" alt="YouTube">
                </a>
{{--                <a target="_blank" href="https://www.instagram.com/etozhecust/">--}}
{{--                    <img src="{{ asset('images/web-site_icons/instagram.svg') }}" alt="Instagram">--}}
{{--                </a>--}}
            </div>

        </div>
        <div class="footer-section">
            <ul>
                <li><a href="{{ route('page.contacts') }}">контакты</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('page.payment') }}">оплата</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('page.delivery') }}">доставка</a></li>
            </ul>
        </div>
        <div class="footer-section">
            @guest()
                <ul>
                    <li><a href="{{ route('page.login') }}">вход</a></li>
                </ul>
                <ul>
                    <li><a href="{{ route('page.register') }}">регистрация</a></li>
                </ul>
            @endguest
            @auth()
                <ul>
                    <li><a href="{{ route('account.account') }}">мой аккаунт</a></li>
                </ul>
                <ul>
                    <li><a href="/cart">моя корзина</a></li>
                </ul>
            @endauth

            <ul>
                <li><a href="{{ route('page.faq') }}">ЧаВо</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <ul>
                <li><a href="https://vk.com/forgenight">vk</a></li>
            </ul>
            <ul>
                <li><a href="https://t.me/ForgeNight">telegram</a></li>
            </ul>
{{--            <ul>--}}
{{--                <li><a href="/faq">instagram</a></li>--}}
{{--            </ul>--}}
        </div>
    </div>
    <div class="law">
        <p>
            * Вся представленная на сайте информация, включая комплектации, технические характеристики, цветовые сочетания и стоимость продукции, запасных частей и сервисного обслуживания, предоставляется исключительно в информационных целях. Эта информация не является публичной офертой в смысле, определенном положениями Статьи 437 (2) Гражданского кодекса Российской Федерации или аналогичными нормами законодательства других стран.
        </p>
    </div>
    <div class="copyrights">
        <p>@ForgeNight</p>
    </div>
    <style>
        .law
        {
            padding: 0 15px;
        }
        .law p{
            font-size: 14px;
            font-family: Montserrat, sans-serif;
        }
        .copyrights
        {
            background: #232323;
        }
        .copyrights p
        {
            color: #f4dc5e;
            text-align: center;
            font-family: "Century Gothic", Montserrat, sans-serif;
            margin: 0;
            font-size: 14px;
            padding: 4px;
        }
    </style>
</footer>
