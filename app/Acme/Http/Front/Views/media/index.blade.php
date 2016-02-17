@extends('Front::layouts.defaultnew')
@section('title', 'Видеопортал | КТРК')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/videoportal.css') }}"/>
@endsection

@section('content')

    <div class="shows-slider">
        <div class="slider-overlay"></div>
        <div class="shows-carousel container">
            {{--<div>--}}
                {{--<div class="overlay"></div>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('images/projects/ala-too.jpg') }}" alt=""/>--}}
                {{--</a>--}}
                {{--<div class="show-info">--}}
                    {{--<h4>Ала-Тоо</h4>--}}
                    {{--<span class="show-day">{{ trans('site.Monday') }} - {{ trans('site.Friday') }}</span>--}}
                    {{--<span class="show-time">19:30 / 21:30</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<div class="overlay"></div>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('images/projects/zamana.jpg') }}" alt=""/>--}}
                {{--</a>--}}
                {{--<div class="show-info">--}}
                    {{--<h4>Замана</h4>--}}
                    {{--<span class="show-day">{{ trans('site.Monday') }} - {{ trans('site.Friday') }}</span>--}}
                    {{--<span class="show-time">07:00</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<div class="overlay"></div>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('images/projects/hit-parad.jpg') }}" alt=""/>--}}
                {{--</a>--}}
                {{--<div class="show-info">--}}
                    {{--<h4>Хит-Парад</h4>--}}
                    {{--<span class="show-day">{{ trans('site.Sunday') }}</span>--}}
                    {{--<span class="show-time">22:00</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            @if($anons)
                @foreach($anons as $row)
                    <div>
                        <div class="overlay"></div>
                        <a href="{{ $row->url }}">
                            <img src="{{ asset($row->thumbnail) }}" alt=""/>
                        </a>
                        <div class="show-info">
                            <h4>{{ $row->getNameOne() }}</h4>
                            <span class="show-day">{{ $row->getWeekDayOne() }}</span>
                            <span class="show-time">{{ $row->time }}</span>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="container main-wrapper">

        <div class="row">
            <section class="content clearfix">

                <div class="clearfix">
                    <div class="top-left-block col-md-12">
                        <div class="panel panel-default panel-videos">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Видеопортал
                                </h3>
                            </div>
                            <div class="panel-body">

                                <ul id="myTabs" class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#all">{{ trans('site.AllVideos') }}</a>
                                    </li>
                                    @foreach($mediaCategories as $key=>$MediaCategory)
                                        <li>
                                            <a href="#{{ $MediaCategory->getVideoType() }}" data-toggle="tab">{{ $MediaCategory->getGlobalName() }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active clearfix" id="all">
                                        <div class="row">
                                            {{-- @foreach($mediaAll as $media) --}}
                                            <div class="col-md-3 media-ctg">
                                                @include('Front::partials.leftMediaCategories')
                                            </div>
                                            <div class="col-md-9 panel panel-default media-videos">
                                                <div class="row">

                                                    <div class="panel-heading">
                                                        <h3>{{ trans('site.LastVideos') }}</h3>
                                                    </div>

                                                    <div class="panel-body">
                                                        @foreach($mediaLastVideos as $key=>$mediaLastVideo)
                                                            <article class="col-md-4" data-cat="all-videos">
                                                                <div class="img">
                                                                    <a href="{{ route('front.media.video', $mediaLastVideo) }}">
                                                                        <img src="@if($mediaLastVideo->thumbnail_big) {{ asset($mediaLastVideo->thumbnail) }} @else http://img.youtube.com/vi/{{ $mediaLastVideo->getUrl() }}/hqdefault.jpg @endif" alt=""/>
                                                                        <div class="overlay">
                                                                            <i class="fa-view"></i>
                                                                            <span class="media-view">{{ $mediaLastVideo->viewed }}</span>
                                                                            @if(($mediaLastVideo->getProgramName()))
                                                                                <span class="media-project">
                                                                                    {{ $mediaLastVideo->getProgramName() }}
                                                                                </span>
                                                                            @endif
                                                                            <span class="media-date">{{ $mediaLastVideo->getDateFormatted() }}</span>
                                                                        </div>
                                                                        <i class="fa-video"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="media-title">
                                                                    <a href="{{ route('front.media.video', $mediaLastVideo) }}">
                                                                        <h4>{{ $mediaLastVideo->getName() }}</h4>
                                                                    </a>
                                                                </div>
                                                            </article>
                                                        @endforeach

                                                    </div>

                                                    <div class="panel-heading">
                                                        <h3>{{ trans('site.TopVideos') }}</h3>
                                                    </div>

                                                    <div class="panel-body">

                                                        @if($mediaPops)
                                                            @foreach($mediaPops as $pop)
                                                                <article class="col-md-4" data-cat="all-videos">
                                                                    <div class="img">
                                                                        <a href="{{ route('front.media.video', $pop) }}">
                                                                            <img src="@if($pop->thumbnail_big) {{ asset($pop->thumbnail) }} @else http://img.youtube.com/vi/{{ $pop->getUrl() }}/hqdefault.jpg @endif" alt=""/>
                                                                            <div class="overlay">
                                                                                <i class="fa-view"></i>
                                                                                <span class="media-view">{{ $pop->viewed }}</span>
                                                                                @if(($pop->getProgramName()))
                                                                                    <span class="media-project">
                                                                                        {{ $pop->getProgramName() }}
                                                                                    </span>
                                                                                @endif
                                                                                <span class="media-date">{{ $pop->getDateFormatted() }}</span>
                                                                            </div>
                                                                            <i class="fa-video"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-title">
                                                                        <a href="{{ route('front.media.video', $pop) }}">
                                                                            <h4>{{ $pop->getName() }}</h4>
                                                                        </a>
                                                                    </div>
                                                                </article>
                                                            @endforeach
                                                        @endif

                                                        <footer>
                                                            <a href="{{ route('front.media.all') }}">
                                                                <span>{{ trans('site.AllVideos') }}<i class="fa fa-arrow-circle-right"></i></span>
                                                            </a>
                                                        </footer>

                                                    </div>

                                                </div>
                                            </div>

                                            {{-- @endforeach --}}
                                        </div>
                                    </div>
                                    @foreach($mediaCategories as $key=>$MediaCategory)
                                        <div role="tabpanel" class="tab-pane @if($MediaCategory->getVideoType() == 'all') active @endif clearfix" id="{{ $MediaCategory->getVideoType() }}">
                                            <div class="row">
                                                {{-- @foreach($mediaAll as $media) --}}
                                                <div class="col-md-3 media-ctg">
                                                    @include('Front::partials.leftMediaCategories')
                                                </div>
                                                <div class="col-md-9 panel panel-default media-videos">
                                                    <div class="row">

                                                        <div class="panel-heading">
                                                            <h3>{{ trans('site.LastVideos')}}</h3>
                                                        </div>

                                                        <div class="panel-body">

                                                            @foreach($categoriesVideos as $key => $media)
                                                                @foreach($media as $row)
                                                                    @if($row->videoType == $MediaCategory->videoType)
                                                                        <article class="col-md-4" data-cat="all-videos">
                                                                            <div class="img">
                                                                                <a href="{{ route('front.media.video', $row) }}">
                                                                                    <img src="@if($row->thumbnail_big) {{ asset($row->thumbnail) }} @else http://img.youtube.com/vi/{{ $row->getUrl() }}/hqdefault.jpg @endif" alt=""/>
                                                                                    <div class="overlay">
                                                                                        <i class="fa-view"></i>
                                                                                        <span class="media-view">{{ $row->viewed }}</span>
                                                                                        @if(($row->getProgramName()))
                                                                                            <span class="media-project">
                                                                                                {{ $row->getProgramName() }}
                                                                                            </span>
                                                                                        @endif
                                                                                        <span class="media-date">{{ $row->getDateFormatted() }}</span>
                                                                                    </div>
                                                                                    <i class="fa-video"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-title">
                                                                                <a href="{{ route('front.media.video', $row) }}">
                                                                                    <h4>{{ $row->getName() }}</h4>
                                                                                </a>
                                                                            </div>
                                                                        </article>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach

                                                            <footer>
                                                                <a href="{{ route('front.media.category',$MediaCategory) }}">
                                                                    <span>{{ trans('site.AllVideos') }}<i class="fa fa-arrow-circle-right"></i></span>
                                                                </a>
                                                            </footer>

                                                        </div>

                                                        <div class="panel-heading">
                                                            <h3>{{ trans('site.TopVideos') }}</h3>
                                                        </div>

                                                        <div class="panel-body">

                                                            @if($topCategoriesVideos)
                                                                @foreach($topCategoriesVideos as $key => $topCatVideo)
                                                                    @foreach($topCatVideo as $row)
                                                                        @if($row->videoType == $MediaCategory->videoType)
                                                                            <article class="col-md-4" data-cat="all-videos">
                                                                                <div class="img">
                                                                                    <a href="{{ route('front.media.video', $row) }}">
                                                                                        <img src="@if($row->thumbnail_big) {{ asset($row->thumbnail)  }} @else http://img.youtube.com/vi/{{ $row->getUrl() }}/hqdefault.jpg @endif" alt=""/>
                                                                                        <div class="overlay">
                                                                                            <i class="fa-view"></i>
                                                                                            <span class="media-view">{{ $row->viewed }}</span>
                                                                                            @if(($row->getProgramName()))
                                                                                                <span class="media-project">
                                                                                                    {{ $row->getProgramName() }}
                                                                                                </span>
                                                                                            @endif
                                                                                            <span class="media-date">{{ $row->getDateFormatted() }}</span>
                                                                                        </div>
                                                                                        <i class="fa-video"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="media-title">
                                                                                    <a href="{{ route('front.media.video', $row) }}">
                                                                                        <h4>{{ $row->getName() }}</h4>
                                                                                    </a>
                                                                                </div>
                                                                            </article>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif

                                                            <footer>
                                                                <a href="{{ route('front.media.category',$MediaCategory) }}">
                                                                    <span>{{ trans('site.AllVideos') }}<i class="fa fa-arrow-circle-right"></i></span>
                                                                </a>
                                                            </footer>

                                                        </div>

                                                    </div>
                                                </div>

                                                {{-- @endforeach --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

@stop

@section('footerScript')

    <script>
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

    <script>

        //    var current = $('.shows-carousel').slick('slickCurrentSlide');

        $('.shows-carousel').slick({
//        autoplay: true,
//        autoplaySpeed: 2000,
            centerPadding: '0',
            dots: true,
            infinite: true,
            slidesToShow: 1,
            speed: 600
        });
    </script>
@stop
