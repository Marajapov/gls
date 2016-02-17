@extends('Front::layouts.default')
@section('title', $post->getTitle())
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
@endsection()
@section('content')
    <div class="container main-wrapper">
        <div class="row">
            <section class="content clearfix">
                <div class="clearfix">
                    <div class="top-left-block col-md-9">
                        <div class="panel panel-default panel-article">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{ trans('site.Top news') }} <span class="divider"><i class="fa fa-circle"></i></span>
                                    <a href="{{ route('front.category', $post->category) }}"><span class="ctg">
                        @if(app()->getlocale() == 'kg')
                                                {{ $post->category('category_id')->first()->title }}
                                            @else
                                                {{ $post->category('category_id')->first()->titleRu }}
                                            @endif
                        </span></a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12 block news-block">
                                    <h4 class="news-title">
                                        {{ $post->getTitleRuOrKg() }}
                                        <div class="extra">
                                            <span class="art-date"><i class="fa fa-calendar"></i>{{ $post->getDay() }} {{ $post->getMonthRu() }}, {{ $post->getYear() }}</span>
                                            <span class="art-view"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                        </div>
                                    </h4>
                                    <p class="post-thumb" href="{{ route('front.post', $post) }}">
                                        <img height="100" class="left" src="@if(empty($post->getFile()))images/2.jpg @else {{  asset($post->getFile()) }} @endif" alt="image">
                                    </p>
                                    @if(!empty($post->related2))
                                        <div class="related2">
                                            <a href="{{ route('front.post', $post->related2) }}">{{ $related2Post->getName() }}</a>
                                        </div>
                                    @endif
                                    @if(!empty($post->related3))
                                        <div class="related3">
                                            <a href="{{ route('front.post', $post->related3) }}">{{ $related3Post->getName() }}</a>
                                        </div>
                                    @endif
                                    <p>
                                        {!! $post->getContent() !!}
                                    </p>
                                    <div class="carousel-post">
                                        @if($parentId != '0')
                                            @foreach($photoChilds as $photoChild)
                                                <div class="col-md-4">
                                                    <a href="#">
                                                        <img src="{{ asset($photoChild->getFile()) }}" alt=""/>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @if(!empty($post->related1))
                                    <aside>
                                        <div class="topics-box">
                                            <h2>{{ trans('site.MatpoTeme') }}</h2>
                                            <div class="topics">
                                                <div class="topic clearfix">
                                                    <div class="t-date">
                                    <span class="date">
                                    <span class="time">{{ $related1Post->getTime() }}</span>
                                        {{ $related1Post->getDay() }} {{ $related1Post->getMonthRu() }} {{ $related1Post->getYear() }}
                                    </span>
                                                    </div>
                                                    <a class="t-thumb" href="{{ route('front.post', $post->related1) }}">
                                                        <img alt="alt photo text" src="{{ asset($related1Post->getFile()) }}">
                                                    </a>
                                                    <div class="t-info">
                                                        <h4>
                                                            <a class="js-dh" href="{{ route('front.post', $post->related1)}}">{{ $related1Post->getTitle() }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                @endif
                                <footer>
                                    @if(auth()->user())
                                        <a class="post-edit" href="{{ route('admin.post.edit', $post) }}" target="_blank"><i class="fa fa-pencil"></i>{{ trans('site.AdminPostEdit') }}</a>
                                    @endif
                                    <a href="{{ route('front.general') }}">
                                        <span>{{ trans('site.PostAllNews') }}<i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                </footer>
                            </div>
                        </div>
                        @include('Front::partials.postBanner')
                        <div class="panel panel-default panel-related">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{ trans('site.TekteshNews') }}
                                </h3>
                            </div>
                            <div class="panel-body">
                                @foreach($relatedPosts as $relatedPost)
                                    @if($relatedPost->id == $post->id)
                                    @else
                                        <div class="col-md-4 block">
                                            <a href="{{ route('front.post', $relatedPost) }}" class="news-thumb">
                                                <img src="@if(empty($relatedPost->getFile()))images/live_bg.png @else {{ asset($relatedPost->getFile()) }} @endif" alt=""/>
                                            </a>
                                            <a class="related-title" href="{{ route('front.post', $relatedPost) }}">
                                                {{ $relatedPost->getTitle() }}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @include('Front::partials.leftCategories')
                </div>
            </section>
        </div>
    </div>
@stop