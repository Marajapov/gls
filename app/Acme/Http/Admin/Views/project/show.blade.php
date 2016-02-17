@extends('Admin::layouts.default')
@section('title', $project->getName())

@section('content')

  <div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title clearfix">

          <h4>{{ trans('site.Info') }}</h4>

          <a href="{{ route('admin.project.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

          {!! Form::open(['route' => ['admin.project.destroy', $project], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
          <button type="submit" class="btn btn-danger" href="#">
            <i class="fa fa-times"></i>
            {{ trans('site.Delete') }}
          </button>
          {!! Form::close() !!}

          <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-success pull-right">
            <i class="fa fa-edit"></i>
            {{ trans('site.Change') }}
          </a>

        </div>

        <div class="x_content post-info clearfix">

          <ul class="list-group">
            <li class="list-group-item">
              <p class="header">Миниатюра</p>
              <p class="body">
                <img src="{{ asset($project->thumbnail) }}" alt=""/>
              </p>
            </li>
            <li class="list-group-item">
              <p class="header">{{ trans('site.TitleKG') }}</p>
              <p class="body">
                {{ $project->getName() }}
              </p>
            </li>
            <li class="list-group-item">
              <p class="header">{{ trans('site.DescKG') }}</p>
              <p class="body">
                {{ $project->description }}
              </p>
            </li>
            <li class="list-group-item">
              <p class="header">{{ trans('site.TitleRU') }}</p>
              <p class="body">
                {{ $project->getNameRu() }}
              </p>
            </li>
            <li class="list-group-item">
              <p class="header">{{ trans('site.DescRU') }}</p>
              <p class="body">
                {{ $project->descriptionRu }}
              </p>
            </li>

          </ul>

        </div>

      </div>
    </div>
  </div>

@stop
