@extends('Front::channel.balastan.default')
@section('title', $balastanLastVideo->hasProject()->first()->getNameOne())
@section('styles')
@endsection
@section('content')
    <div class="container-fluid pages-header">
        <div class="row">
            @include('Front::channel.balastan.nav')
            <div class="container pages-title video-page">
                <div class="row">
                    <div class="title col-md-12">
                        @if($balastanLastVideo )
                            <h3>{{ $balastanLastVideo->getName() }}</h3>
                             <div class="fromcat">
                                <p>
                                    @if($balastanProjects)
                                    @foreach($balastanProjects->take(1) as $row)
                                        <a href="{{ route('balastan.project.videos', $row) }}">
                                            {{ $balastanLastVideo->hasProject()->first()->getNameOne()}}
                                        </a>
                                    @endforeach
                                    @endif
                                </p>
                             </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid fullvideo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($balastanLastVideo)
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$balastanLastVideo->getUrl()}}?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" controls=0 allowfullscreen></iframe>
                        </div>
                        <div class="episode-info">
                            <div class="episode-desc">{!! $balastanLastVideo->description !!}</div>
                                @if($balastanProjects)
<<<<<<< HEAD
                                @foreach($balastanProjects as $row)
                                    @if($balastanLastVideo->program == $row->id)
                                        <a href="{{ route('balastan.project.videos', $row) }}">
                                            <em>{{ $balastanLastVideo->hasProject()->first()->getNameOne()}}</em>
                                        </a>
                                    @endif
=======
                                @foreach($balastanProjects->take(1) as $row)
                                    <a href="{{ route('balastan.project.videos', $row) }}">
                                        <em>{{ $balastanLastVideo->hasProject()->first()->getNameOne()}}</em>
                                    </a>
>>>>>>> bd2f21e91b8745592528423791fb13b48f423499
                                @endforeach
                                @endif    
                            <span>{{ $balastanLastVideo->getDateFormatted() }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid relatedvideos">
        <div class="container">
            <div class="row">
                <div class="title col-md-12">
                    <h3>{{ trans('site.CategoryVideos') }}</h3>
                </div>
            </div>
            <div id="relatedVideos" class="row">
                @if($balastanMedias)
                    @foreach($balastanMedias as $media)
                        <div class="col-md-4 video-block">
                            <a href="{{ route('balastan.video', $media)}}" class="video-img">
                                @if($media->thumbnail_big)
                                    <img src="{{ asset($media->thumbnail_big) }}" alt="" />
                                @else
                                    <img src="http://img.youtube.com/vi/{{ $media->getUrl()}}/0.jpg" alt="" />
                                @endif
                                <span class="video-overlay"></span>
                            </a>
                            <div class="video-info">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <i class="fa fa-youtube-play video-icon"></i>
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <h4 class="media-heading video-name"><a href="{{ route('balastan.video', $media)}}">{{ $media->getName() }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <a class="show-btn loadMore" href="#">
                            {{ trans('site.LoadMore') }}
                        </a>
                    </div>

                @endif
            </div>
        </div>
    </div>
@stop

@section('footerScript')
    <script>
        $(function(){
            $("#relatedVideos .video-block").slice(0, 6).show(); // select the first six
            $("#relatedVideos .loadMore").click(function(e){ // click event for load more
                e.preventDefault();
                $("#relatedVideos .video-block:hidden").slice(0, 6).show(); // select next 6 hidden divs and show them
                if($("#relatedVideos .video-block:hidden").length == 0){ // check if any hidden divs still exist
                    $("#relatedVideos .loadMore").hide();
                }
            });
            if($("#relatedVideos .video-block:hidden").length == 0){ // check if any hidden divs still exist
                $("#relatedVideos .loadMore").hide();
            }
        });
    </script>
@stop
