@extends('Admin::layouts.default')
@section('title', $anons->getNameOne())

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title clearfix">

                    <h4>{{ trans('site.Info') }}</h4>

                    <a href="{{ route('admin.anons.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

                    {!! Form::open(['route' => ['admin.anons.destroy', $anons], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="fa fa-times"></i>
                        {{ trans('site.Delete') }}
                    </button>
                    {!! Form::close() !!}

                    <a href="{{ route('admin.anons.edit', $anons) }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i>
                        {{ trans('site.Change') }}
                    </a>

                </div>

                <div class="x_content post-info clearfix">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="header">Файл</p>
                            <p class="body">
                                <img src="{{ asset($anons->getThumbnail()) }}" width="auto" height="100">
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TitleKG') }}</p>
                            <p class="body">{{ $anons->name }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TitleRU') }}</p>
                            <p class="body">{{ $anons->name }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">Ссылка</p>
                            <p class="body">{{ $anons->url }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminAnonsWeekDay') }}</p>
                            <p class="body">{{ $anons->weekday }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminAnonsWeekDayRu') }}</p>
                            <p class="body">{{ $anons->weekdayRu }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminAnonsTime') }}</p>
                            <p class="body">{{ $anons->time }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.PublishStatus') }}</p>
                            <p class="body tags">
                                @if($anons->published == '1')
                                    опубликован
                                @elseif($anons->published == '0')
                                    не опубликован
                                @endif
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminPostCreatedDate') }}</p>
                            <p class="body">{{ $anons->getDateFormatted() }}</p>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

@stop