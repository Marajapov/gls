@extends('Front::layouts.default')
@section('title', $category->getTitle())

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/articles.css') }}">

@endsection

@section('content')
    <div class="container main-wrapper">

        <div class="row">


            <section class="content clearfix">

                <div class="clearfix">
                    <div class="top-left-block col-md-9">
                        <div class="panel panel-default panel-articles">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a class="ctg" href="{{ route('front.general') }}">{{ trans('site.Top news') }}</a>
                                    <span class="divider"><i class="fa fa-circle"></i></span>
                                    {{ $category->getTitle()}}
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12 block news-block">

                                    <div class="date-filter clearfix">
                                        <div class="row">
                                            <form action="{{ route('front.filterResultCategory',$category) }}" method="get">
                                                <div class="form-group col-md-2">
                                                    <input type="hidden" name="category" value="{{ $category->id}}">
                                                    <div class="input-group date" id="datetimepicker1">
                                                        <input type="text" class="form-control" name="dateFrom" />

                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    </div>
                                                </div>

                                                <div class="pull-left form-divider">
                                                    -
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <div class="input-group date" id="datetimepicker2">
                                                        <input type="text" class="form-control" name="dateTo" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <button type="submit" class="btn btn-default btn-filter">
                                                        фильтр
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- end row -->
                                    </div>

                                    <div class="">

                                        @foreach($posts as $post)

                                            <div class="media">

                                                <div class="media-left">
                                                    <a href="{{ route('front.post', $post) }}">
                                                        <img class="media-object thumb" src="@if($post->getFile()) {{ asset($post->getFile()) }} @else {{ asset('images/ktrk_last.svg') }}  @endif" alt="image">
                                                    </a>
                                                </div>

                                                <div class="media-body">
                                                    <div class="extra">
                                                        <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }} , {{ $post->getTime() }}</span>
                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                    </div>

                                                    <a class="media-heading" href="{{ route('front.post', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                    <nav>
                                        <ul class="pagination">

                                            <li>
                                                <a href="{{ route('front.category', ['category' => $category, 'page' => 1]) }}" class="btn btn-default @if($posts->currentPage() == 1) disabled @endif">{{ trans('site.Start') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ $posts->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                            </li>

                                            @for($i = 0, $j = 1; $i < $posts->total(); $i+=$perPage)
                                                <li class="@if(($j > $posts->currentPage()+3) || ($j < $posts->currentPage()-3)) hidden @endif">
                                                    <a href="{{ route('front.category', ['category' => $category, 'page' => $j]) }}" class="btn btn-default @if($posts->currentPage() == $j) active @endif">
                                                        {{ $j++ }}
                                                    </a>
                                                </li>
                                            @endfor

                                            <li>
                                                <a href="{{ $posts->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                            </li>

                                            <li>
                                                <a href="{{ route('front.category', ['category' => $category, 'page' => ceil($posts->total()/$perPage)]) }}" class="btn btn-default @if($posts->currentPage() == ceil($posts->total()/$perPage)) disabled @endif">{{ trans('site.End') }}</a>
                                            </li>

                                        </ul>
                                    </nav>

                                </div>
                            </div>
                        </div>

                        @include('Front::partials.postBanner')

                    </div>
                    @include('Front::partials.leftCategories')
                </div>

            </section>

        </div>

    </div>

@stop
@section('footerScript')
    <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ru.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/transition.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/collapse.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#datetimepicker1').datetimepicker({
                locale: 'ru',
                format: 'L'
            });
            $('#datetimepicker2').datetimepicker({
                locale: 'ru',
                format: 'L'
            });
        });
    </script>

@stop