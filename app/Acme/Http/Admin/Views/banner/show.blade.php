@extends('Admin::layouts.default')
@section('title', $banner->getName())

@section('content')

<div class="row modals">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title clearfix">

          <h4>{{ trans('site.Info') }}</h4>

          <a href="{{ route('admin.banner.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

          {!! Form::open(['route' => ['admin.banner.destroy', $banner], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
          <button type="submit" class="btn btn-danger" href="#">
            <i class="fa fa-times"></i>
            {{ trans('site.Delete') }}
          </button>
          {!! Form::close() !!}

          <a href="{{ route('admin.banner.edit', $banner) }}" class="btn btn-success pull-right">
            <i class="fa fa-edit"></i>
            {{ trans('site.Change') }}
          </a>

      </div>  

      <div class="x_content post-info clearfix">
        <ul class="list-group">
          <li class="list-group-item">
            <p class="header">Файл</p>
            <p class="body">
              @if($banner->isImage())
              <img src="{{ asset($banner->getFile()) }}" width="200" height="120">
              @else
              <object width="200" height="120" type="application/x-shockwave-flash" data="{{ asset($banner->getFile()) }}"></object>
              @endif
            </p>
          </li>

          <li class="list-group-item">
            <p class="header">Название</p>
            <p class="body">{{ $banner->getName() }}</p>
          </li>

          <li class="list-group-item">
            <p class="header">{{ trans('site.AdminPostCreatedDate') }}</p>
            <p class="body">{{ $banner->getDateFormatted() }}</p>
          </li>

          <li class="list-group-item">
            <p class="header">Расположение</p>
            <p class="body">
              @if($banner->positionTop == 1) Сверху 
              @elseif($banner->positionCenter == 1) По центру 
              @elseif($banner->positionRight == 1) Справа 
              @elseif($banner->positionLeft == 1) Слева 
              @elseif($banner->positionBottom == 1) Снизу 
              @endif
            </p>
          </li>

          <li class="list-group-item">
            <p class="header">Ссылка</p>
            <p class="body">
                {{ $banner->linkTo }}              
            </p>
          </li>
      </div>    
      
  </div>

</div>

@stop
