@extends('Admin::layouts.default')
@section('title', trans('site.Info'))


@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title clearfix">

                    <h4>{{ trans('site.Info') }}</h4>

                    <a href="{{ route('admin.quote.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

                    {!! Form::open(['route' => ['admin.quote.destroy', $quote], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="fa fa-times"></i>
                        {{ trans('site.Delete') }}
                    </button>
                    {!! Form::close() !!}

                    <a href="{{ route('admin.quote.edit', $quote) }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i>
                        {{ trans('site.Change') }}
                    </a>

                </div>

                <div class="x_content post-info clearfix">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="header">Файл</p>
                            <p class="body">
                                <img src="{{ asset($quote->getFile()) }}" width="auto" height="100">
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminQuoteAuthor') }}</p>
                            <p class="body">{{ $quote->author }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminQuoteAuthorRU') }}</p>
                            <p class="body">{{ $quote->authorRu }}</p>
                        </li>                          

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminQuoteDesc') }}</p>
                            <p class="body">{{ $quote->description }}</p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminQuoteDescRU') }}</p>
                            <p class="body">{{ $quote->descriptionRu }}</p>
                        </li>                        

                        <li class="list-group-item">
                            <p class="header">{{ trans('site.PublishStatus') }}</p>
                            <p class="body tags">
                                @if($quote->published == '1')
                                    опубликован
                                @elseif($quote->published == '0')
                                    не опубликован
                                @endif
                            </p>
                        </li>
                    </ul>

                </div>

            </div>

        </div>
    </div>

@stop