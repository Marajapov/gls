@extends('Admin::layouts.default')
@section('title', $media->getName())

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">

                    <h4>{{ trans('site.AdminMediaArticles') }}</h4>

                    <a href="{{ route('admin.media.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

                    {!! Form::open(['route' => ['admin.media.destroy', $media], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="fa fa-times"></i>
                        {{ trans('site.Delete') }}
                    </button>
                    {!! Form::close() !!}

                    <a href="{{ route('admin.media.edit', $media) }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i>
                        {{ trans('site.Change') }}
                    </a>

                </div>

                <div class="x_content post-info clearfix">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.Title') }}</p>
                            <p class="body">
                                {{ $media->getName() }}
                            </p>
                        </li>
                        {{--<li class="list-group-item">--}}
                        {{--<p class="header">{{ trans('site.TitleRU') }}</p>--}}
                        {{--<p class="body">--}}
                        {{--{{ $media->getNameRu() }}--}}
                        {{--</p>--}}
                        {{--</li>--}}
                        <li class="list-group-item">
                            <p class="header">Видео</p>
                            <p class="body">
                                @if($media->isImage())
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $media->getUrl() }}?rel=0" frameborder="0" allowfullscreen></iframe>
                                @else
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $media->getUrl() }}?rel=0" frameborder="0" allowfullscreen></iframe>
                                @endif
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">Категория</p>
                            <p class="body">
                                @if($mediaCategory != '')
                                    <a href="{{ route('admin.mediaCategory.show', $mediaCategory->id) }}">
                                        {{ $mediaCategory->getName() }} ({{ $mediaCategory->getNameRu() }})
                                    </a>
                                @endif
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminMediaProject') }}</p>
                            <p class="body">
                                @if($project != '')
                                    <a href="{{ route('admin.mediaCategory.show', $project->id) }}">
                                        {{ $project->getName() }} ({{ $project->getNameRu() }})
                                    </a>
                                @endif
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TagsKG') }}</p>
                            <p class="body tags">
                                @foreach($media->getTagListAttributeKg() as $tag)
                                    @if($tag != '')
                                        <span class="label">{{ $tag->name }}</span>
                                    @endif
                                @endforeach
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.TagsRU') }}</p>
                            <p class="body tags">
                                @foreach($media->getTagListAttributeRu() as $tag)
                                    @if($tag != '')
                                        <span class="label">{{ $tag->name }}</span>
                                    @endif
                                @endforeach
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">Автор</p>
                            <p class="body tags">
                                {{ $media->owner()->first()->name }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminPostCreatedDate') }}</p>
                            <p class="body tags">
                                {{ $media->getTime().', '.$media->getDateFormatted() }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.PublishStatus') }}</p>
                            <p class="body tags">
                                @if($media->published == '1')
                                    опубликован
                                @elseif($media->published == '0')
                                    не опубликован
                                @endif
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminMediaView') }}</p>
                            <p class="body tags">
                                <i class="fa fa-eye"></i>
                                {{ $media->getViewed() }}
                            </p>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

@stop