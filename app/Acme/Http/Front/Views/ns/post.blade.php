@extends('Front::layouts.default')
@section('title', trans('site.BaikoochuKeneshFull').' | КТРК')
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
            <div class="panel panel-default panel-kenesh">
              <div class="panel-heading">
                <h3 class="panel-title"><span>{{ trans('site.BaikoochuKeneshFull') }}</span></h3>
              </div>
              <div class="panel-body">

                @include('Front::ns.sidebar')

                <div class="col-md-10">
                  <div class="row">
                    <div class="panel-heading second-panel-heading">
                      <h3 class="panel-title"><span>{{ trans('site.Top news') }}</span></h3>
                    </div>
                    <div class="panel-body second-panel-body">

                      <div class="col-md-12 block news-block">
                        <h4 class="news-title">
                          {{ $post->getTitleRuOrKg() }}
                          <div class="extra">
                            <span class="art-date"><i class="fa fa-calendar"></i>{{ $post->getDay() }} {{ $post->getMonthRu() }}, {{ $post->getTime() }}</span>
                            <span class="art-view"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                          </div>
                        </h4>

                        <p class="post-thumb" href="#">
                          <img height="150" class="left" src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif" alt="image">
                        </p>

                        <p>
                          {!! $post->getContent() !!}
                        </p>

                         <div class="carousel-post">
                             @if($images != null)
                             @foreach($images as $image)
                             <div class="col-md-4">
                                <a href="#">

                                <img src="{{ asset('froala/uploads/'.$image->name) }}" alt=""/>
                                </a>
                             </div>
                             @endforeach
                             @endif
                          </div>

                      </div>

                      <footer>
                        <a href="{{ route('front.general') }}">
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

  <script>
    function getVote(int) {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          document.getElementById("poll").innerHTML=xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET","{{ asset('poll_vote.php') }}?vote="+int,true);
      xmlhttp.send();
    }
  </script>

@endsection