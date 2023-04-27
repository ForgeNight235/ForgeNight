<section id="subscribe" class="subscribe">
    <img src="images/subscribe/subscribe.webp" alt="" title="" class="subscribe-image">
    <div class="container">
        <div class="subscribe-form">

            <h3>
                ПОДПИШИСЬ
            </h3>

            <p>
                Не упускай новости и новые релизы,
                подписку можно отменить в любой момент
            </p>

            <input type="email" placeholder="введите email">

            <button>подписаться</button>
        </div>

    </div>

    <style>
        .subscribe .container{
            max-width: 1200px;
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
            margin: 0 auto;
        }

        .subscribe-form{
            max-width: 450px;
            display: grid;
            gap: 20px;
            top: 0;
            left: 0;
        }
        .subscribe{
            margin: 35px 0;
            position: relative;
        }

        .subscribe-image{
            object-fit: cover;
            width: 100%;
            min-height: 300px;
            max-height: 350px;
        }
        .subscribe h3{
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 40px;
            line-height: 49px;
            text-transform: uppercase;
            color: #232323;
        }
        .subscribe p{
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 29px;
            text-transform: lowercase;

            color: #232323;

        }
        .subscribe input{
            width: 100%;
            background: none;
            border: 1px solid #232323;
            border-radius: 20px;
            outline: none;
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 29px;
            text-transform: lowercase;
            color: #A58181;
            padding: 12px 18px;
        }

        .subscribe button{
            border: none;
            outline: none;
            width: fit-content;
            height: fit-content;
            background: none;
            font-family: 'Century Gothic', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 29px;
            text-decoration-line: underline;
            text-transform: lowercase;

            color: #232323;
        }
    </style>
</section>
