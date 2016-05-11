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
                <i class="pe-7s-close-circle"></i>
                <span>404</span>
            </h4>
            <p class="category">Страница не найдена</p>
        </div>

        <div class="content">
            <a class="btn btn-neutral btn-round btn-fil btn-wd" href="{{ route('front.home') }}">
                На главную
            </a>
        </div>

    </div>

@endsection

@section('scripts')
    {{-- Sweet Alert --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        @if(session('status') == 'error')
        swal("Не удается войти.", "Пожалуйста, проверьте правильность написания логина и пароля.", "error");
        @endif
    </script>
@stop