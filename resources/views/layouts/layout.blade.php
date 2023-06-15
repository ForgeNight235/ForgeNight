<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta-description')">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('https://unpkg.com/swiper/swiper-bundle.min.css') }}" />
{{--    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>--}}
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js') }}"></script>
    <script src="{{ asset('js/sliders.js') }}" defer></script>
    <script src="{{ asset('js/bestBySaleSlider.js') }}" defer></script>
    <link rel="icon" href="{{ asset('images/logo/svg/website icon.svg') }}" type="image/x-icon">
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css') }}" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js') }}" defer
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    {{--    Делаем кастомный скролл на веб-сайте--}}
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/overlayscrollbars/css/OverlayScrollbars.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/overlayscrollbars/js/OverlayScrollbars.min.js') }}"></script>
    <link rel="stylesheet"
          href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.min.css') }}">
    <script
        src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.min.js') }}"
        defer></script>
    <script src="{{ asset('js/header/headerAccount.js') }}" defer></script>
    <script src="{{ asset('js/customScrolls.js') }}" defer></script>
    <script src="{{ asset('js/burger.js') }}" defer></script>
{{--    <script src="{{ asset('js/logoutModal.js') }}" defer></script>--}}
    <script src="{{ asset('js/header/logoutBtn.js') }}" defer></script>
    <script src="{{ asset('js/messages/successMessage.js') }}" defer></script>
    <script src="{{ asset('js/messages/failureMessage.js') }}" defer></script>
    <script src="{{ asset('js/catalog/pageAnchor.js') }}" defer></script>
    <script src="{{ asset('/js/catalog/catalogFilterModal.js') }}" defer></script>
    <script src="{{ asset('js/accountPage/showAllProductsInOrder.js') }}" defer></script>
    <script src="{{ asset('js/accountPage/imagePreview.js') }}" defer></script>
    <script src="{{ asset('js/accountPage/mobileFormatter.js') }}" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>@yield('title') | ForgeNight</title>



    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(93983839, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true,
            ecommerce:"container"
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/93983839" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Varioqub experiments -->
    <script type="text/javascript">
        (function(e, x, pe, r, i, me, nt){
            e[i]=e[i]||function(){(e[i].a=e[i].a||[]).push(arguments)},
                me=x.createElement(pe),me.async=1,me.src=r,nt=x.getElementsByTagName(pe)[0],nt.parentNode.insertBefore(me,nt)})
        (window, document, 'script', 'https://abt.s3.yandex.net/expjs/latest/exp.js', 'ymab');
        ymab('metrika.93983839', 'init'/*, {clientFeatures}, {callback}*/);
    </script>
</head>
<body>

@include('components.header')

@yield('content')

@include('components.footer')

</body>
</html>
