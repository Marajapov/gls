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
                      <h3 class="panel-title"><span>{{ trans('site.BaikoochuKeneshGallery') }}</span></h3>
                    </div>
                    <div class="panel-body second-panel-body">

                      <section>
                      @if($galleries)
                      @foreach($galleries as $gallery)
                        <div class="col-md-4">
                        {!! Form::open(['route' => ['front.ns.gallery', $gallery->id], 'method' => 'get', 'onclick' => "submit()"]) !!}
                          <div class="gallery-item">
                            <a href="#" class="thumb">
                              <img src="{{ asset($gallery->status) }}" alt="..." class="img-thumbnail">
                              <i class="fa fa-camera"></i>
                            </a>
                            <h2>
                              <div class="extra">
                                <span class="e-datetime">{{ $gallery->getDay() }} {{ $gallery->getMonthRu() }}, {{ $gallery->getTime() }}</span>
                              </div>
                              <a href="#">{{ $gallery->getName() }}</a>
                            </h2>
                          </div>
                          <input type="hidden" value="{{ $gallery->id }}" name="photoParentId">
                          {!! Form::close() !!}
                        </div>
                        @endforeach
                        @endif

                      </section>

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