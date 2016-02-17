@extends('Front::layouts.default')
@section('title', trans('site.BaikoochuKeneshContactsFull').' | '.trans('site.BaikoochuKeneshFull').' | КТРК')
@section('styles')
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">--}}
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>

  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script>

    var ktrk=new google.maps.LatLng(42.878037, 74.576290);

    function initialize() {
      var mapProp = {
        center:ktrk,
        zoom:18,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

      var marker=new google.maps.Marker({
        position:ktrk,
        {{--icon:'{{ asset('images/ktrk_last.png') }}'--}}
      });
      marker.setMap(map);

      var infowindow = new google.maps.InfoWindow({
        content:"{{ trans('site.Ktrk') }}"
      });
      infowindow.open(map,marker);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
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
                      <h3 class="panel-title"><span>{{ trans('site.BaikoochuKeneshContactsFull') }}</span></h3>
                    </div>
                    <div class="panel-body second-panel-body panel-ns-contacts">

                      <div class="col-md-6">
                        <p>
                          <span><i class="fa fa-map-marker"></i></span>
                          {{ trans('site.BaikoochuKeneshContactsAdresText') }}
                        </p>

                        <p>
                          <span><i class="fa fa-phone"></i></span>
                          0(312) 65-67-21
                        </p>

                        <p>
                          <span><i class="fa fa-envelope"></i></span>
                          sovetotv@gmail.com
                        </p>
                      </div>

                      <div class="col-md-6">
                        <div id="googleMap"></div>
                      </div>



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