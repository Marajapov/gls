@extends('Front::channel.balastan.default')
@section('title', trans('radiopages.Photos'))
@section('styles')
@endsection
@section('content')

    <div class="container-fluid pages-header">
        <div class="row">

            @include('Front::channel.balastan.nav')

            <div class="container pages-title">
                <div class="row">
                    <div class="title col-md-12">
                        <h3>{{ trans('radiopages.Photos') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid allphotos">
        <div class="row">
            <div class="container">
                <div class="row">
                    @if($photoGalleries != null)
                        @foreach($photoGalleries as $photoGallery)
                            <div class="col-md-4 video-block">
                                <a href="{{ route('balastan.photos', $photoGallery) }}" class="video-img">
                                    <img src="{{ asset($photoGallery->thumbnail_big) }}" alt="" />
                                    <span class="video-overlay"></span>
                                </a>
                                <div class="video-info">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fa fa-camera video-icon"></i>
                                            </a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="media-heading video-name"><a href="{{ route('balastan.photos', $photoGallery) }}">{{ $photoGallery->getName() }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="container">
                        <nav class="kidspaginate">
                            <ul class="pagination">
                                <li>
                                    <a href="{{ route('balastan.allphotos', ['page' => 1]) }}" class="btn btn-default @if($postAll->currentPage() == 1) disabled @endif">{{ trans('site.Start') }}</a>
                                </li>
                                <li>
                                    <a href="{{ $postAll->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                </li>
                                <li>
                                    <a href="{{ $postAll->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                </li>
                                @for($i = 0, $j = 1; $i < $postAll->total(); $i+=$perPage)
                                    <li>
                                        <a href="{{ route('balastan.allphotos', ['page' => $j]) }}" class="btn btn-default @if($postAll->currentPage() == $j) active @endif">{{ $j++ }}</a>
                                    </li>
                                @endfor
                                <li>
                                    <a href="{{ route('balastan.allphotos', ['page' => ceil($postAll->total()/$perPage)]) }}" class="btn btn-default @if($postAll->currentPage() == ceil($postAll->total()/$perPage)) disabled @endif">{{ trans('site.End') }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
