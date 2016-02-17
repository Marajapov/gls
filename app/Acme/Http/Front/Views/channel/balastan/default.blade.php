<!DOCTYPE html>
<html lang="ру">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet"  href="{{ asset('css/lightslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}"/>
    <script src="{{ asset('js/gallery/modernizr.custom.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/balastan.css') }}"/>

    <link rel="shortcut icon" href="{{ asset('images/balastan-favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/balastan-favicon.ico') }}" type="image/x-icon">


    @yield('styles')

    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>

</head>
<body class="balastan" id="balastan">

<!--BEGIN MAIN HEADER MENU for all channels  -->
<div class="switch">
    <nav class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                <span class="sr-only">Меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/channels/balastan_white_notext.png')}}">
                <h4>Баластан</h4>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav channel_switch">
                <li class="sitemenu" id="site-channel1">
                    <a href="{{ route('front.home') }}">
                        <img src="{{ asset('images/ktrk_last.svg')}}"><span>КТРК</span>
                        <h4>КТРК</h4>
                    </a>
                </li>
                <li class="sitemenu" id="site-channel1">
                    <a href="{{ route('muzkanal.home') }}">
                        <img src="{{ asset('images/channels/muztv_color.png')}}" ><span>Музыка</span>
                        <h4>Музыка</h4>
                    </a>
                </li>
                <li class="sitemenu" id="site-channel1">
                    <a href="{{ route('madaniyat.home') }}">
                        <img src="{{ asset('images/channels/madaniyat_color.png')}}"><span>Маданият</span>
                        <h4>Маданият</h4>
                    </a>
                </li>
                <li class="sitemenu" id="site-channel1">
                    <a class="active" href="{{ route('balastan.home') }}">
                        <img src="{{ asset('images/channels/balastan_color.png')}}"><span>Баластан</span>
                        <h4>Баластан</h4>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
<!--END -->

@yield('content')

@include('Front::channel.balastan.footer')