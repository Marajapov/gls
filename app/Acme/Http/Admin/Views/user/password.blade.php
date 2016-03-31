@extends('Admin::layouts.default')
@section('title', $user->getName())

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@endsection

@section('content')

    <!-- include nav -->
    @include('Admin::user.nav')
    <!-- end nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Новый пароль</h4>
                        </div>
                        <div class="content">
{!! Form::model($user, ['route' => 'admin.user.newPassword']) !!}
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Пароль</label>
            <input name="password" type="password" class="form-control" placeholder="Пароль">
            <input name="userId" type="hidden" value="{{ $userId }}" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Пароль еще раз</label>
            <input name="password2" type="password" class="form-control" placeholder="Пароль еще раз">
        </div>
    </div>
</div>

<div class="action">
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="#" onclick="history.go(-1);" class="btn btn-default">Назад</a>
</div>
{!! Form::close() !!}

 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop