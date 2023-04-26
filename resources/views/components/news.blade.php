<section id="news">
    <div class="container">
        <div class="section-article">
            <h1>
                Новости
            </h1>
            <a href="/news">читать все</a>
        </div>

        <div class="news-grid">
            <div class="news-grid-item-articles news-grid-main">
                <img src="images/news/news-slider/new-main.jpg" alt="new">
            </div>
            <div class="news-grid-item-articles news-grid-secondary">
                text
            </div>
            <div class="news-grid-item-articles news-grid-tertiary">
                text
            </div>
            <div class="news-grid-item-articles news-grid-tertiary">
                tezxt
            </div>
            <div class="news-grid-item-articles news-grid-tertiary">
                text
            </div>
        </div>

        <style>
            .news-grid-item-articles{
                position: relative;
            }

            .news-grid-main::before{
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55) 0%, rgba(0, 0, 0, 0) 100%);
                z-index: 1; /* чтобы элемент был над блоком с контентом */
                border-radius: 20px;
            }

            .news-grid-item-articles img{
                width: 100%;
                border-radius: 20px;
            }

            .news-grid {
                display: grid;
                grid-template-columns: 2fr 1fr;
                grid-template-rows: auto auto;
                gap: 48px;
                transition: grid-template-columns 0.5s ease-out; /* добавляем анимацию */
            }

            /* вторая новость */
            .news-grid-secondary {
                max-width: 360px;
                transition: max-width 0.5s ease-out; /* добавляем анимацию */
            }

            @media screen and (min-width: 768px) {
                .news-grid {
                    grid-template-columns: repeat(3, 1fr);
                    grid-template-rows: auto;
                }
                .news-grid-secondary {
                    max-width: none;
                }
            }

            /* основная новость */
            .news-grid-main {
                grid-column: 1 / span 2; /* занимает две колонки */
            }

            @media screen and (min-width: 768px) {
                /* десктопные стили */
                .news-grid {
                    grid-template-columns: repeat(3, 1fr); /* 3 колонки */
                    grid-template-rows: auto; /* одна строка */
                }
                /* сброс стиля максимальной ширины для вышеописанного блока */
                .news-grid-secondary {
                    max-width: none;
                }
            }

        </style>

    </div>
</section>
