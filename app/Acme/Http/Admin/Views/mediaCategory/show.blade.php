@extends('Admin::layouts.default')
@section('title', $mediaCategory->getName())

@section('content')

  <div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title clearfix">

          <h4>{{ trans('site.Info') }}</h4>

          <a href="{{ route('admin.mediaCategory.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

          {!! Form::open(['route' => ['admin.mediaCategory.destroy', $mediaCategory], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
          <button type="submit" class="btn btn-danger" href="#">
            <i class="fa fa-times"></i>
            {{ trans('site.Delete') }}
          </button>
          {!! Form::close() !!}

          <a href="{{ route('admin.mediaCategory.edit', $mediaCategory) }}" class="btn btn-success pull-right">
            <i class="fa fa-edit"></i>
            {{ trans('site.Change') }}
          </a>

        </div>

        <div class="x_content post-info clearfix">

          <ul class="list-group">
            <li class="list-group-item">
              <p class="header">{{ trans('site.TitleKG') }}</p>
              <p class="body">
                {{ $mediaCategory->getName() }}
              </p>
            </li>
            <li class="list-group-item">
              <p class="header">{{ trans('site.TitleRU') }}</p>
              <p class="body">
                {{ $mediaCategory->getNameRu() }}
              </p>
            </li>
            <li class="list-group-item">
              <p class="header">{{ trans('site.TitleEN') }}</p>
              <p class="body">
                {{ $mediaCategory->videoType }}
              </p>
            </li>

          </ul>

        </div>

      </div>
    </div>
  </div>

@stop
