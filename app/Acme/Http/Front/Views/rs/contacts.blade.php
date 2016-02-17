@extends('Front::layouts.default')
@section('title', 'Как связаться с Редакционным Советником? | КТРК')
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
            <div class="panel panel-default panel-kenesh panel-rs">
              <div class="panel-heading">
                <h3 class="panel-title"><span>Редакционный советник</span></h3>
              </div>
              <div class="panel-body">

                @include('Front::rs.sidebar')

                <div class="col-md-9">
                  <div class="row">
                    <div class="panel-heading second-panel-heading">
                      <h3 class="panel-title"><span>Как связаться с Редакционным Советником?</span></h3>
                    </div>
                    <div class="panel-body second-panel-body panel-ns-contacts">

                      <div class="col-md-12">
                        <h4><strong>Контактные данные Редакционного Советника КТРК КР:</strong></h4>
                        <p>
                          <span><i class="fa fa-map-marker"></i></span>
                          720010, г.Бишкек, бульвар Молодой Гвардии 59.
                        </p>

                        <p>
                          <span><i class="fa fa-phone"></i></span>
                          0(312) 65-67-21
                        </p>

                        <p>
                          <span><i class="fa fa-envelope"></i></span>
                          rkktrkkg@gmail.com, t.valieva@ktrk.kg
                        </p>

                        <p>
                          <span><i class="fa fa-user"></i></span>
                          Омбудсмен/Редакционный Советник КТРК КР - <strong>Валиева Тамара Бектурсуновна</strong>
                        </p>

                      </div>

                      <div class="col-md-12">
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
@endsection