@extends('Admin::layouts.default')
@section('title', $user->getName())

@section('content')

<div class="row modals">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
          <div class="x_title clearfix">
            <h4>{{ trans('site.AdminUserInfo') }}</h4>
            <a href="{{ route('admin.user.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

            {!! Form::open(['route' => ['admin.user.destroy', $user], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
            <button type="submit" class="btn btn-danger" href="#">
              <i class="fa fa-times"></i>
              {{ trans('site.Delete') }}
            </button>
            {!! Form::close() !!}

            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-success pull-right">
              <i class="fa fa-edit"></i>
              {{ trans('site.Change') }}
            </a>
        </div>

        <div class="x_content post-info clearfix">
            <div class="list-group">
                <li class="list-group-item">
                    <p class="header">{{ trans('site.AdminUserName') }}</p>
                    <p class="body">{{ $user->getName() }}</p>
                </li>

                <li class="list-group-item">
                    <p class="header">E-mail</p>
                    <p class="body">{{ $user->email }}</p>
                </li>

                <li class="list-group-item">
                    <p class="header">Канал</p>
                    <p class="body">{{ $user->channel()->first()->display }}</p>
                </li>

                <li class="list-group-item">
                    <p class="header">Роль</p>
                    <p class="body">{{ $user->role }}</p>
                </li>

            </div>
        </div>  

    </div>
  </div>
</div>

@stop




