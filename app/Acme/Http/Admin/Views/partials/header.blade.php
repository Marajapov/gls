<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/admin/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/admin/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    @yield('styles')

</head>
<body>

<div class="wrapper">