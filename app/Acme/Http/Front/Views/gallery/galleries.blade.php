@extends('Front::layouts.default')
@section('title', "Галереи")

@section('styles')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
@stop

@section('content')

    <div class="container main-wrapper">
        <div class="row">
            <section class="content clearfix">
                <div class="clearfix">
                    <div class="top-left-block col-xs-12 col-sm-12 col-md-12">
                        <div class="panel panel-default panel-kenesh">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span>Фотогалерея</span></h3>
                            </div>
                            <div class="panel-body" style="padding-bottom: 15px;">

                                <section class="clearfix">
                                    @if($galleries)
                                        @foreach($galleries as $gallery)

                                            <div class="col-md-4">

                                                <div class="gallery-item">
                                                    <a href="{{ route('front.gallery', $gallery) }}" class="thumb">
                                                        <img src="{{ asset($gallery->thumbnail_big) }}" alt="..." class="img-thumbnail">
                                                        <div class="overlay"></div>
                                                        <i class="fa-gallery"></i>
                                                    </a>
                                                    <h2>
                                                        <div class="extra">
                                                            <span class="e-datetime">{{ $gallery->getDay() }} {{ $gallery->getMonthRu() }}, {{ $gallery->getTime() }}</span>
                                                        </div>
                                                        <a href="{{ route('front.gallery', $gallery) }}">{{ $gallery->getName() }}</a>
                                                    </h2>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif

                                </section>

                                <nav>
                                    <ul class="pagination">

                                        <li>
                                            <a href="{{ route('front.gallery.galleries', ['page' => 1]) }}" class="btn btn-default @if($galleries->currentPage() == 1) disabled @endif">{{ trans('site.Start') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ $galleries->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ $galleries->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </li>

                                        @for($i = 0, $j = 1; $i < $galleries->total(); $i+=$perPage)
                                            <li>
                                                <a href="{{ route('front.gallery.galleries', ['page' => $j]) }}" class="btn btn-default @if($galleries->currentPage() == $j) active @endif">{{ $j++ }}</a>
                                            </li>
                                        @endfor

                                        <li>
                                            <a href="{{ route('front.gallery.galleries', ['page' => ceil($galleries->total()/$perPage)]) }}" class="btn btn-default @if($galleries->currentPage() == ceil($galleries->total()/$perPage)) disabled @endif">{{ trans('site.End') }}</a>
                                        </li>

                                    </ul>
                                </nav>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

@stop
@section('footerScript')

@endsection
