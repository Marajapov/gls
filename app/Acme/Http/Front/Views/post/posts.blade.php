@extends('Front::layouts.defaultnew')
@section('title', trans('site.PostAllNews'))

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/articles.css') }}">

@endsection

@section('title', 'Жаңылыктар')

@section('content')

    <div class="container main-wrapper">
        <div class="row">

            <section class="content clearfix">

                <div class="clearfix">
                    <div class="top-left-block col-md-9">
                        <div class="panel panel-default panel-articles">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{ trans('site.Top news') }}
                                </h3>
                            </div>
                            <div class="panel-body">

                                <div class="col-md-12 block news-block">

                                    <div class="date-filter clearfix hidden">
                                        <div class="row">

                                            <form action="{{ route('front.filterResult') }}" method="get">
                                                <div class="form-group col-md-2">
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

                                    <div class="row">

                                        <div class="col-md-4">
                                            @foreach($leftCategories as $leftCategory)
                                                <div class="category">

                                                    <a href="{{ route('front.category', $leftCategory) }}" class="cat-title">
                                                        {{ $leftCategory->getTitle() }}
                                                    </a>

                                                    <div class="cat-posts">
                                                        @foreach($headerPosts as $headerPost)
                                                            @if($headerPost->category_id == $leftCategory->id)
                                                                <div class="cat-post last-post">
                                                                    <div class="extra">
                                                                        <span class="e-datetime">{{ $headerPost->getDay() }} {{ $headerPost->getMonthRu() }} , {{ $headerPost->getTime() }}</span>
                                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $headerPost->getViewed() }}</span>
                                                                    </div>
                                                                    <a href="{{ route('front.post', $headerPost) }}">
                                                                        <img src="@if($headerPost->thumbnail_big) {{ asset($headerPost->thumbnail_big) }} @else {{ asset($headerPost->thumbnail) }}  @endif" alt=""/>
                                                                        <h4 class="media-heading">{{ $headerPost->getTitleRuOrKg() }}</h4>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @foreach($posts as $post)
                                                            @if($post->category_id == $leftCategory->id)
                                                                <div class="cat-post">
                                                                    <div class="extra">
                                                                        <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }} , {{ $post->getTime() }}</span>
                                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                                    </div>
                                                                    <a href="{{ route('front.post', $post) }}">
                                                                        <h4 class="media-heading">{{ $post->getTitleRuOrKg() }}</h4>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                        <div class="col-md-4">
                                            @foreach($middleCategories as $middleCategory)
                                                <div class="category">

                                                    <a href="{{ route('front.category', $middleCategory) }}" class="cat-title">
                                                        {{ $middleCategory->getTitle() }}
                                                    </a>

                                                    <div class="cat-posts">
                                                        @foreach($headerPosts as $headerPost)
                                                            @if($headerPost->category_id == $middleCategory->id)
                                                                <div class="cat-post last-post">
                                                                    <div class="extra">
                                                                        <span class="e-datetime">{{ $headerPost->getDay() }} {{ $headerPost->getMonthRu() }} , {{ $headerPost->getTime() }}</span>
                                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $headerPost->getViewed() }}</span>
                                                                    </div>
                                                                    <a href="{{ route('front.post', $headerPost) }}">
                                                                        <img src="@if($headerPost->thumbnail_big) {{ asset($headerPost->thumbnail_big) }} @else {{ asset($headerPost->thumbnail) }}  @endif" alt=""/>
                                                                        <h4 class="media-heading">{{ $headerPost->getTitleRuOrKg() }}</h4>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @foreach($posts as $post)
                                                            @if($post->category_id == $middleCategory->id)
                                                                <div class="cat-post">
                                                                    <div class="extra">
                                                                        <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }} , {{ $post->getTime() }}</span>
                                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                                    </div>
                                                                    <a href="{{ route('front.post', $post) }}">
                                                                        <h4 class="media-heading">{{ $post->getTitleRuOrKg() }}</h4>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                        <div class="col-md-4">
                                            @foreach($rightCategories as $rightCategory)
                                                <div class="category">

                                                    <a href="{{ route('front.category', $rightCategory) }}" class="cat-title">
                                                        {{ $rightCategory->getTitle() }}
                                                    </a>

                                                    <div class="cat-posts">
                                                        @foreach($headerPosts as $headerPost)
                                                            @if($headerPost->category_id == $rightCategory->id)
                                                                <div class="cat-post last-post">
                                                                    <div class="extra">
                                                                        <span class="e-datetime">{{ $headerPost->getDay() }} {{ $headerPost->getMonthRu() }} , {{ $headerPost->getTime() }}</span>
                                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $headerPost->getViewed() }}</span>
                                                                    </div>
                                                                    <a href="{{ route('front.post', $headerPost) }}">
                                                                        <img src="@if($headerPost->thumbnail_big) {{ asset($headerPost->thumbnail_big) }} @else {{ asset($headerPost->thumbnail) }}  @endif" alt=""/>
                                                                        <h4 class="media-heading">{{ $headerPost->getTitleRuOrKg() }}</h4>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @foreach($posts as $post)
                                                            @if($post->category_id == $rightCategory->id)
                                                                <div class="cat-post">
                                                                    <div class="extra">
                                                                        <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }} , {{ $post->getTime() }}</span>
                                                                        <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                                    </div>
                                                                    <a href="{{ route('front.post', $post) }}">
                                                                        <h4 class="media-heading">{{ $post->getTitleRuOrKg() }}</h4>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>

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