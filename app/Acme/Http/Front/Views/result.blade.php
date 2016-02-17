@extends('Front::layouts.default')
@section('title', "Главная страница")

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/articles.css') }}">

@endsection

@section('content')

<div class="container main-wrapper">
    <div class="row">
        <section class="content clearfix">

            <div class="clearfix">
                <div class="top-left-block col-md-9">
                    <div class="panel panel-default panel-articles panel-search">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ trans('site.DataTableSearch') }}
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12 block news-block">

                                <h4 class="search-title">
                                    Результаты по запросу - <span>&laquo;{{ $searchKey }}&raquo;</span>
                                </h4>
                                
                                <div class="tags-search">
                                    @if(count($tag) > 0)
                                    @foreach($tag->posts as $post)

                                        <div class="media">

                                            <div class="media-left">
                                                <a href="{{ route('front.post', $post) }}">
                                                    <img class="media-object thumb" src="@if($post->getFile()) {{ asset($post->getFile()) }} @else {{ asset('images/ktrk_last.svg') }}  @endif" alt="image">
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                <div class="extra">
                                                    <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }} , {{ $post->getTime() }}</span>
                                                    <a class="e-cat text-uppercase" href="{{ route('front.category', $post->category) }}"><span>{{ $post->category('category_id')->first()->getTitle() }}</span></a>
                                                    <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                </div>
                                                <a class="media-heading" href="{{ route('front.post', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
                                            </div>

                                        </div>

                                    @endforeach
                                    @endif
                                </div>

                                <div class="posts-search">
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
                                                    <a class="e-cat text-uppercase" href="{{ route('front.category', $post->category) }}"><span>{{ $post->category('category_id')->first()->getTitle() }}</span></a>
                                                    <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                </div>
                                                <a class="media-heading" href="{{ route('front.post', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
                                            </div>

                                        </div>

                                    @endforeach

                                </div>


                                {{--<nav>--}}
                                    {{--<ul class="pagination">--}}

                                        {{--<li>--}}
                                            {{--<a href="{{ route('front.search', ['page' => 1]) }}" class="btn btn-default @if($posts->currentPage() == 1) disabled @endif">{{ trans('site.Start') }}</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="{{ $posts->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="{{ $posts->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>--}}
                                        {{--</li>--}}

                                        {{--@for($i = 0, $j = 1; $i < $posts->total(); $i+=$perPage)--}}
                                            {{--<li>--}}
                                                {{--<a href="{{ route('front.search', ['page' => $j]) }}" class="btn btn-default @if($posts->currentPage() == $j) active @endif">{{ $j++ }}</a>--}}
                                            {{--</li>--}}
                                        {{--@endfor--}}

                                        {{--<li>--}}
                                            {{--<a href="{{ route('front.search', ['page' => ceil($posts->total()/$perPage)]) }}" class="btn btn-default @if($posts->currentPage() == ceil($posts->total()/$perPage)) disabled @endif">{{ trans('site.End') }}</a>--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}
                                {{--</nav>--}}

                                {{--<div class="row">--}}
                                    {{--<ul class="grid" id="grid">--}}
                                    {{--@foreach($posts as $post)--}}
                                        {{--<li>--}}
                                            {{--<div class="pin">--}}
                                                {{--<div class="pin-body">--}}
                                                    {{--<a class="news-title" href="{{ route('front.post', $post) }}">--}}
                                                        {{--<h4>{{ $post->getTitle() }}</h4>--}}
                                                    {{--</a>--}}
                                                    {{--<div class="news-img">--}}
                                                        {{--<a class="main-img" href="article.html"><img src="images/image.jpeg" /><i class="fa fa-play-circle-o"></i></a>--}}
                                                        {{--<div class="news-channel">--}}
                                                            {{--<a href="channel.html"><img src="images/logo_notext.png" alt=""/></a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<p>--}}
                                                        {{--{!! $result = substr($post->getContent(),0,300) !!}--}}
                                                        {{----}}
                                                        {{--<a href="{{ route('front.post', $post) }}" class="read-more">толугу менен</a>--}}
                                                    {{--</p>--}}
                                                {{--</div>--}}
                                                {{--<div class="pin-footer">--}}
                                                    {{--<a class="news-ctg" href="#">--}}
                                                        {{--<h4>{{ $post->category('category_id')->first()->title }}</h4>--}}
                                                    {{--</a>--}}
                                                    {{--<h4 class="news-datetime pull-right">{{ $post->getViewed() }}, {{ $post->getCreated() }}</h4>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--@endforeach --}}
                                        {{----}}
                                    {{--</ul>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>

                

                </div>

                @include('Front::partials.leftCategories')

            </div>

        </section>
    </div>
</div>

@stop
