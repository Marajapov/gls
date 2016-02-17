<!DOCTYPE html>
<html lang="ру">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>

    <link rel="shortcut icon" href="{{ asset('images/muz-favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/muz-favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('filter/css/layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>


    <link rel="stylesheet" type="text/css" href="{{ asset('css/custombox.css') }}"/>
    <link rel="stylesheet"  href="{{ asset('css/lightslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}"/>

    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>


    @yield('styles')

    <style>
        body{

        @if($backgroundMain != null) background: url('{{ asset($backgroundMain->getFile()) }}') no-repeat;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        @endif
    }
    </style>

    <script>
        $(document).ready(function () {
            $(".search-toggle").click(function () {
                $(".logo-block").addClass("search-show");
                $(".form-search").addClass("visible");
                $(".soc").addClass("hidden");
                $(".clangs").addClass("hidden");

            });
            $(".close-search").click(function () {
                $(".logo-block").removeClass("search-show");
                $(".form-search").removeClass("visible");
                $(".soc").removeClass("hidden");
                $(".clangs").removeClass("hidden");

            });
        });
    </script>

</head>
<body class="music">


@yield('content')

@include('Front::channel.muzkanal.footer')