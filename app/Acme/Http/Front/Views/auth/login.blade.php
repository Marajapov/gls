@extends('Front::layouts.login')
@section('title', "Вход")

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}" />
@stop

@section('content')

    <div class="overlay"></div>

    <div class="card">

        <div class="header">
            <h4 class="title">Авторизация</h4>
        </div>

        <div class="content">
            {!! Form::open(['route' => 'front.login', 'role' => 'form', 'method' => 'POST']) !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Логин</label>
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Пароль</label>
                            {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-fill" type="submit">Вход</button>
                    </div>
                </div>

            {!! Form::close() !!}
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