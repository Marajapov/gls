@extends('Admin::layouts.default')
@section('title', $user->getName())

@section('content')
    <!-- include bottom nav -->
    @include('Admin::partials.usernav')
    <!-- end bottom nav -->

<div class="row modals">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
          <div class="x_title clearfix">
            <h4>Информация</h4>
            <a href="{{ route('admin.user.index') }}" class="btn btn-default pull-right btn-back">Назад</a>

            {!! Form::open(['route' => ['admin.user.destroy', $user], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
            <button type="submit" class="btn btn-danger" href="#">
              <i class="fa fa-times"></i>
              Удалить
            </button>
            {!! Form::close() !!}

            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-success pull-right">
              <i class="fa fa-edit"></i>
              Изменить
            </a>
        </div>

        <div class="x_content post-info clearfix">
            <div class="list-group">
                <li class="list-group-item">
                    <p class="header">Имя</p>
                    <p class="body">{{ $user->getName() }}</p>
                </li>

                <li class="list-group-item">
                    <p class="header">E-mail</p>
                    <p class="body">{{ $user->email }}</p>
                </li>

            </div>
        </div>  

    </div>
  </div>
</div>

@stop




