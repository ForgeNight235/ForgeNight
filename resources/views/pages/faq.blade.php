@extends('layouts.layout')

@section('title', 'Чаво - ЧАстые Вопросы и Ответы')

@section('meta-description', 'Найдите ответы на часто задаваемые вопросы о нашей компании, продуктах и услугах. Узнайте больше о нашей команде и как мы можем помочь вам.')

@section('content')
    <section class="faq">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('page.home') }}">
                    <p>forgenight</p>
                    <img
                        src="{{ asset('images/web-site_icons/big__breadcrumbs.webp') }}"
                        alt="back"
                    >
                </a>
                <a href="{{ route('page.faq') }}">
                    <p>чаво</p>
                </a>
            </div>

            <div class="section-article">
                <h1>
                    Ответы на часто задаваемые вопросы
                </h1>
            </div>

            <div class="questions">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Нужно ли мне регистрироваться перед тем, как сделать заказ?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Да. Зарегистрировавшись на сайте Вы получаете доступ к личному кабинету, а также возможность сделать заказ. </li>
                                    <li>Авторизованный пользователь имеет доступ к системе накопительных скидок, которые скоро появятся на сайте. Все ваши старые покупки будут учтены.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Есть бесплатная доставка?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Доставка будет бесплатной при заказе от десяти тысяч рублей.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Какой срок отправки заказа после его оформления?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Всё зависит от загрузки магазина заказами. Средний срок ожидания отправки после оформления заказа 3-5 дней.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Остальные элементы аккордеона с уникальными идентификаторами -->
                    <!-- Пример для четвертого элемента аккордеона -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Что, если мне приехал некомплект?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Если произошла столь неловкая ситуация, мы отправим вам недостающую часть заказа бесплатно, в кротчайшие сроки.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Пример для пятого элемента аккордеона -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Того, чего я хочу нет в каталоге! Что делать?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Напишите нам на любой удобный вам контактный адрес. Пришлите фото или скажите, что бы вы хотели заказать.</li>
                                    <li><a href="{{ route('page.personalOrder') }}" target="_blank">Здесь</a> вы можете прочитать об индивидуальном заказе. Всё максимально быстро, просто и комфортно!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Пример для шестого элемента аккордеона -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Как добавить товары к уже имеющемуся заказу?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Мы всегда открыты к общению)<br>Средства связи с нами:</li>
                                    <li>TG: <a href="https://t.me/ForgeNight" target="_blank">https://t.me/ForgeNight</a></li>
                                    <li>E-mail: <a href="mailto:forgenight@mail.ru">forgenight@mail.ru</a></li>
                                    <li>Телефон: <a href="tel:+7(917)254-60-05">+7(917)254-60-05</a> (связаться с руководителем)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
