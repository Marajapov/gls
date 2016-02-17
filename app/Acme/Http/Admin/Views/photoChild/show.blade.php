@extends('Admin::layouts.default')
@section('title', $photoChild->getName())

@section('content')
    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title clearfix">

                    <h4>{{ trans('site.Info') }}</h4>

                    <a href="{{ route('admin.photoChild.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

                    {!! Form::open(['route' => ['admin.photoChild.destroy', $photoChild], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="fa fa-times"></i>
                        {{ trans('site.Delete') }}
                    </button>
                    {!! Form::close() !!}

                    <a href="{{ route('admin.photoChild.edit', $photoChild) }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i>
                        {{ trans('site.Change') }}
                    </a>

                </div>

                <div class="x_content post-info clearfix">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="header">Файл</p>
                            <p class="body">@if($photoChild->isImage())
                                    <img src="{{ asset($photoChild->getFile()) }}" width="200" height="120">
                                @else
                                    <object width="200" height="120" type="application/x-shockwave-flash" data="{{ asset($photoChild->getFile()) }}"></object>
                                @endif
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TitleKG') }}</p>
                            <p class="body">{{ $photoChild->name }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TitleRU') }}</p>
                            <p class="body">{{ $photoChild->nameRu }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AuthorKG') }}</p>
                            <p class="body">{{ $photoChild->author }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AuthorRU') }}</p>
                            <p class="body">{{ $photoChild->authorRu }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">Фото галерея</p>
                            <p class="body">{{ $photoChild->PhotoParentList }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">Источник на кыргызском</p>
                            <p class="body">{{ $photoChild->description }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">Источник на русском</p>
                            <p class="body">{{ $photoChild->descriptionRu }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TagsKG') }}</p>
                            <p class="body tags">
                                @foreach($photoChild->getTagListAttributeKg() as $tag)
                                    @if($tag != '')
                                        <span class="label">{{ $tag->name }}</span>
                                    @endif
                                @endforeach
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TagsRU') }}</p>
                            <p class="body tags">
                                @foreach($photoChild->getTagListAttributeRu() as $tag)
                                    @if($tag != '')
                                        <span class="label">{{ $tag->name }}</span>
                                    @endif
                                @endforeach
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminPostCreatedDate') }}</p>
                            <p class="body">{{ $photoChild->getDateFormatted() }}</p>
                        </li>
                    </ul>

                </div>




            </div>
        </div>
    </div>
@stop

