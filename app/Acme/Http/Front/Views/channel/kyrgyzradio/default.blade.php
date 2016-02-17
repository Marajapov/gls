<!DOCTYPE html>
<html lang="ру">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
<!--     
    <link rel="stylesheet" href="{{ asset('css/radios2.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('css/landing/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/landing/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/landing/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/landing/owl.transitions.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/landing/prettyPhoto.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/landing/responsive.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custombox.css') }}"/>
    <link rel="stylesheet"  href="{{ asset('css/lightslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}"/>


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



</head>
<body>


    @yield('content')




@include('Front::channel.kyrgyzradio.footer')

    
