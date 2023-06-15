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
</head>
<body>

@include('components.header')

@yield('content')

@include('components.footer')

</body>
</html>
