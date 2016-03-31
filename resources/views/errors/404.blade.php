@extends('Front::layouts.login')
@section('title', "Ошибка")

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}" />
@stop

@section('content')

    <div class="overlay"></div>

    <div class="card card-error">

        <div class="header">
            <h4 class="title">
                <span>Ошибка</span>
                <b>404</b>
            </h4>
            <p class="category">К сожалению, запрашиваемой Вами страницы не существует на сайте.</p>
        </div>

        <div class="content">

            
            <p class="text-center">
                <a class="logo" href="{{ route('front.home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Логотип"/>
                </a>
                <a class="btn btn-primary btn-fill btn-wd" href="{{ route('front.home') }}">
                    На главную
                </a>
            </p>
        </div>

    </div>

@endsection