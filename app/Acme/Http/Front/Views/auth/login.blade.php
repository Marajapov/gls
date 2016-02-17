@extends('Front::layouts.login')
@section('title', "Вход")

@section('content')

<div class="loginform">

    <div class="logintitle clearfix">
      <img src="{{ asset('images/ktrk_last.svg') }}" alt=""/>

      <h4>Авторизация</h4>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 buttonscry">

            {!! Form::open(['route' => 'front.login', 'role' => 'form', 'method' => 'POST']) !!}

            <div class="input-group bottom-padding">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => true, 'maxlength' => 100, 'title' => "Email", 'placeholder' => "Email"]) !!}
            </div>

            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                {!! Form::password('password', ['class' => 'form-control', 'required' => true, 'maxlength' => 100, 'placeholder'=>'Сырсөз']) !!}
            </div>

            <button class="btn loginbutton" type="submit">Кирүү</button>
            {!! Form::close() !!}

            @include('Front::messages.flash')
            @stop

        </div><!-- end row-->
    </div>

</div>