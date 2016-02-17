@extends('Front::layouts.default')
@section('title', 'Редакционный советник | КТРК')
@section('styles')
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">--}}
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
@stop
@section('content')

  <div class="container main-wrapper">
    <div class="row">
      <section class="content clearfix">
        <div class="clearfix">
          <div class="top-left-block col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default panel-kenesh panel-rs">
              <div class="panel-heading">
                <h3 class="panel-title"><span>Редакционный советник</span></h3>
              </div>
              <div class="panel-body">

                @include('Front::rs.sidebar')

                <div class="col-md-9">
                  <div class="row">
                    <div class="panel-heading second-panel-heading">
                      <h3 class="panel-title"><span>Новости</span></h3>
                    </div>
                    <div class="panel-body second-panel-body">

                      {{--@include('Front::ns.lastPosts')--}}
                    <div class="row"> 
                      <div class="col-md-12 first-item">

                        @foreach($popPosts as $pop)
                        <div class="col-md-4">

                          <a href="{{ route('front.ns.post', $pop) }}" class="thumb">
                            <img src="@if(!($pop->getFile()))images/live_bg.png @else {{ asset($pop->thumbnail_big) }} @endif" alt=""/>
                          </a>
                          <div class="post-box">
                            <div class="extra">
                              <span class="e-datetime">{{ $pop->getDay() }} {{ $pop->getMonthRu() }}, {{ $pop->getTime() }}</span>
                              <span class="e-views"><i class="fa fa-eye"></i>{{ $pop->getViewed() }}</span>
                            </div>
                            <h2>
                              <a href="{{ route('front.ns.post', $pop) }}">{{ $pop->getTitleRuOrKg() }}</a>
                            </h2>
                          </div>

                        </div>
                        @endforeach

                      </div> 
                      </div>

                      <div class="col-md-6 hidden">
                        @include('Front::rs.lastPosts')
                      </div>
                      
                       <footer>
                        <a href="{{ route('front.rs.posts') }}">
                          <span>{{ trans('site.FrontPostAll') }} <i class="fa fa-arrow-circle-right"></i></span>
                        </a>
                      </footer>

                    </div>

                  </div>
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
@endsection