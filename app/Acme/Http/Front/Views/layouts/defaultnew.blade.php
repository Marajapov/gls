<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын расмий сайты | Официальный сайт Общественной Телерадиовещательной корпорации Кыргызской Республики">
    <meta name="keywords" content="КТРК,ОТРК,телевидение,радиовещание,общественная телерадиовещательная корпорация,телерадиоберүү корпорациясы,Кыргызская Республика,Кыргыз Республикасы,сайт,официальный сайт,расмий сайт,улут,народ,новости,жаңылыктар,видео,медиа,фото,сүрөт,онлайн ктрк,генеральный директор,Ulut Soft">
    <meta name="author" content="КТРК">

    <title>
        @yield('title')
    </title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>

    <link rel="stylesheet" href="{{ asset('filter/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/reveal-menu.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/test.css') }}"/>

    <!-- GLOBAL SCRIPTS -->
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('js/fileinput.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('js/classie.js') }}"></script>
    <script>
        function init() {
            window.addEventListener('scroll', function(e){
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 50,
                    header = document.querySelector(".main-header");
                if (distanceY > shrinkOn) {
                    classie.add(header,"smaller");
                } else {
                    if (classie.has(header,"smaller")) {
                        classie.remove(header,"smaller");
                    }
                }
            });
        }
        window.onload = init();
    </script>

    @yield('styles')

    <script src="{{ asset('js/jquery.scrollspeed.js') }}"></script>

</head>
<body>

<!-- Facebook SDK -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '564062523746973',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<script>
    // $fn.scrollSpeed(step, speed, easing);
    jQuery.scrollSpeed(100, 800);
</script>

<div id="wrapper">

    <div id="overlay"></div>

    @include('Front::partials.sidebar')
    @include('Front::partials.modal')

    <!-- Page Content -->
    <div id="page-content-wrapper">

        @include('Front::partials.header')
        @include('Front::partials.banner')
        @yield('content')

        @include('Front::partials.footer')
