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

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('filter/css/layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/date-filter.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/jasny-bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/fileinput.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/reveal-menu.css') }}"/>


    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('js/fileinput.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>

    @yield('styles')

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

</head>
<body>

{{--Facebook SDK--}}
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

<div id="wrapper">

    <div id="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Меню
                </a>
            </li>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">Team</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="https://twitter.com/maridlcrmn">Follow me</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="main-header-xs visible-xs">
            <a href="{{ route('front.home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"/>
            </a>
        </div>

        <button type="button" class="hamburger is-closed visible-xs" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>

        @include('Front::partials.modal')
        @include('Front::partials.header')
        @include('Front::partials.banner')
        @yield('content')

@include('Front::partials.footer')
