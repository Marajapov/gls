<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    {{--<link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>
        @yield('title')
    </title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.css') }}"/>
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/ct-paper.css') }}" rel="stylesheet"/>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    @yield('styles')

</head>
<body>