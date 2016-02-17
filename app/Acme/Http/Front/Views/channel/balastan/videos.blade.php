@extends('Front::channel.balastan.default')
@section('title', trans('site.AllVideos'))
@section('styles')
@endsection
@section('content')
    <div class="container-fluid pages-header">
        <div class="row">

            @include('Front::channel.balastan.nav')

            <div class="container pages-title">
                <div class="row">
                    <div class="title col-md-12">
                        <h3>{{ trans('site.AllVideos') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid allvideos">
        <div class="mainnav">
            <div class="container">
                <ul>
                    <li><a class="category @if(!$project) active @endif" href="{{ route('balastan.videos') }}">{{ trans('site.All') }}</a></li>
                    @if($balastanProjects)
                        @foreach($balastanProjects as $row)
                            @if($row->status != 1)
                                <li>
                                    <a class="category @if($project && $row->id == $project->id) active @endif" href="{{ route('balastan.project.videos', $row) }}">
                                        {{ $row->getName() }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        @foreach($balastanProjects as $row)
                            @if($row->status == 1)
                                <li>
                                    <a class="category @if($project && $row->id == $project->id) active @endif" href="{{ route('balastan.project.videos', $row) }}">
                                        {{ $row->getName() }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div id="allVideos" class="row">


                    @if($project && ($project->status !=1))
                        <p class="show-desc">
                            <span>{{ $project->getNameOne() }}</span>
                            {!! $project->getDescription() !!}
                        </p>
                    @endif

                    @if($balastanMedias)
                        @foreach($balastanMedias as $media)
                            <div class="col-md-4 video-block">
                                <a href="{{ route('balastan.video', $media)}}" class="video-img">
                                    <img src="http://img.youtube.com/vi/{{ $media->getUrl()}}/0.jpg" alt="" />
                                    <span class="video-overlay"></span>
                                </a>
                                @if(!$project && $media->hasProject()->first())
                                    <h5 class="video-category">{{ $media->hasProject()->first()->getNameOne() }}</h5>
                                @endif
                                <div class="video-info">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="{{ route('balastan.video', $media)}}">
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
    </div>
@stop

@section('footerScript')
    <script>
        $(function(){
            $("#allVideos .video-block").slice(0, 6).show(); // select the first six
            $("#allVideos .loadMore").click(function(e){ // click event for load more
                e.preventDefault();
                $("#allVideos .video-block:hidden").slice(0, 6).show(); // select next 6 hidden divs and show them
                if($("#allVideos .video-block:hidden").length == 0){ // check if any hidden divs still exist
                    $("#allVideos .loadMore").hide();
                }
            });
            if($("#allVideos .video-block:hidden").length == 0){ // check if any hidden divs still exist
                $("#allVideos .loadMore").hide();
            }
        });
    </script>
@stop