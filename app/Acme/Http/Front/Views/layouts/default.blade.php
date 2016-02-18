<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


</head>
<body>

@yield('content')


@include('Front::partials.footer')
