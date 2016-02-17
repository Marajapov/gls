@extends('Front::layouts.default')
@section('title', $project->getNameOne().' | КТРК')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/videoportal.css') }}"/>
@endsection

@section('content')

    <div class="container main-wrapper">

        <div class="row">

            <section class="content clearfix">

                <div class="clearfix">
                    <div class="top-left-block col-md-9">
                        <div class="panel panel-default panel-show">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a href="{{ route('front.media.index') }}">Видеопортал</a>
                                    <span class="divider"><i class="fa fa-circle"></i></span>
                                    <span>{{ $project->getNameOne() }}</span>
                                </h3>
                            </div>

                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-md-12 block show-block">
                                        <div class="media">
                                            <div class="media-left media-top">
                                                <a>
                                                    <img class="media-object" src="@if(!($project->getFile())) {{ asset('images/project_default.png') }} @else {{ asset($project->getFile()) }} @endif" alt="{{ $project->getNameOne() }}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="show-title media-heading">{{ $project->getNameOne() }}</h4>
                                                <p class="show-desc">
                                                    {{ $project->getDescription() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="panel panel-default panel-related-videos">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{ trans('site.Episodes') }}
                                </h3>
                            </div>
                            <div class="panel-body" id="relatedVideos">

                                @if($relatedVideos)
                                    @foreach($relatedVideos as $relatedVideo)
                                        <div class="col-md-4 block">
                                            <a href="{{ route('front.media.video',$relatedVideo) }}" class="video-thumb">
                                                <img src="http://img.youtube.com/vi/{{$relatedVideo->url}}/mqdefault.jpg" alt=""/>
                                                <div class="overlay">
                                                    <i class="fa-view"></i>
                                                    <span class="media-view">{{ $relatedVideo->viewed }}</span>
                                                    @if(($relatedVideo->getProgramName()))
                                                        <span class="media-project">
                                                            {{ $relatedVideo->getProgramName() }}
                                                        </span>
                                                    @endif
                                                    <span class="media-date">{{ $relatedVideo->getDateFormatted() }}</span>
                                                </div>
                                                <i class="fa-video"></i>
                                            </a>
                                            <a href="{{ route('front.media.video',$relatedVideo) }}" class="video-title">
                                                {{$relatedVideo->getName()}}
                                            </a>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="col-md-12">
                                    <button class="loadMore btn btn-default">Показать еще</button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="top-right-block col-md-3">

                        @include('Front::partials.leftMediaCategories')

                    </div>

                </div>

            </section>
        </div>

    </div>

@stop

@section('footerScript')
    <script>
        $(function(){
            $("#relatedVideos .block").slice(0, 12).show(); // select the first ten
            $("#relatedVideos .loadMore").click(function(e){ // click event for load more
                e.preventDefault();
                $("#relatedVideos .block:hidden").slice(0, 12).show(); // select next 10 hidden divs and show them
                if($("#relatedVideos .block:hidden").length == 0){ // check if any hidden divs still exist
                    $("#relatedVideos .loadMore").hide();
                }
            });
            if($("#relatedVideos .block:hidden").length == 0){ // check if any hidden divs still exist
                $("#relatedVideos .loadMore").hide();
            }
        });
    </script>
@stop
