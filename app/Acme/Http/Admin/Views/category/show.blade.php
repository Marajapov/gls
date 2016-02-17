@extends('Admin::layouts.default')

@section('title', $category->getTitle())

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">

                    <h4>{{ trans('site.Info') }}</h4>

                    <a href="{{ route('admin.category.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

                    {!! Form::open(['route' => ['admin.category.destroy', $category], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="fa fa-times"></i>
                        {{ trans('site.Delete') }}
                    </button>
                    {!! Form::close() !!}

                    <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i>
                        {{ trans('site.Change') }}
                    </a>

                </div>

                <div class="x_content post-info clearfix">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TitleKG') }}</p>
                            <p class="body">
                                {{ $category->title }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TitleRU') }}</p>
                            <p class="body">
                                {{ $category->titleRu }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">Канал</p>
                            <p class="body">
                                @if($category->general == '1')
                                    Главная,
                                @endif
                                @if($category->birinchi == '1')
                                    Биринчи Радио,
                                @endif
                            </p>
                        </li>

                        @if($category->birinchi == '1')
                            <li class="list-group-item">
                                <p class="header">Порядок</p>
                                <p class="body">
                                    {{ $category->orderBirinchi }}
                                </p>
                            </li>
                        @endif

                    </ul>

                </div>

            </div>
        </div>
    </div>
@stop