@extends('Front::channel.minkiyal.default')
@section('title', "Миң Кыял Фм")
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
  <body id="home" class="homepage">

  <header id="header">
    <nav id="main-menu" class="navbar navbar-default fixedheader2" role="banner">
      <div class="container" style="padding: 0px; position:relative;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Меню</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#features">Features</a></li>
            <li class="scroll"><a href="#services">Services</a></li>
          </ul>
        </div>
      </div><!--/.container-->
    </nav><!--/nav-->
  </header><!--/header-->

  <div class="container-fluid main">
    <div class="shows-slider slidermin">
      <div class="slider-overlay"></div>
      <div class="shows-carousel">
        <div>
          <div class="overlay"></div>
          <a href="#">
            <img src="{{ asset('images/channels/minkiyal/nonred.jpg') }}" alt=""/>
          </a>
        </div>
        <div>
          <div class="overlay"></div>
          <a href="#">
            <img src="{{ asset('images/channels/minkiyal/radio.jpg') }}" alt=""/>
          </a>
        </div>
        <div>
          <div class="overlay"></div>
          <a href="#">
            <img src="{{ asset('images/channels/minkiyal/red.jpg') }}" alt=""/>
          </a>
        </div>
      </div>
    </div>

  </div>

  @include('Front::channel.minkiyal.nav')
  <section id="features">
    <div class="contaner-fluid middleblock">
      <div class="container info">
        <div class="col-md-12">
          <div class="online">
            <h3><i class="fa fa-microphone"></i>Түз эфир</h3>
            <object width="65" height="40" data="http://ktrk.kg/online/uppod.swf">
              <param name="bgcolor" value="#ffffff" />
              <param name="allowFullScreen" value="false" />
              <param name="allowScriptAccess" value="false" />
              <param name="audio" value="http://ktrk.kg/online/uppod.swf" />
              <param name="flashvars" value="comment=KTRK&amp;st=03AEEZykN3Q3Q3QH3zkOk1mwXRWNvz3b1XAxYTtj1mzC5kA2uyb1kOk1mwXRWNvhzdwf9vwjzC5k=jQZi6jNf1kOk1mwXRWHNXzBGDY31X=jOkZ2sN6HsQfzC5kev0kttj1vL2NXzC5k1sQE3Q2GkTCGfFdGJTCHwXpvQXeWNhHm0X1hsNkTWwWTSUhTd0kNtj1JTWwf9vwnY31DX1CYLex5W=jaktjR1i6W0kbSal1C0V9Rv1XAuaTtj1tzC5kb42Qi63Gktj1ozfUrd&amp;file=http://212.112.96.232:8081" />
            </object>
          </div>
          <h2>Фоторепортаждар</h2>
          <div id="allposts" class="row">

            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/anjelika.png')}}" class="img-responsive" alt="">
              <a href="#"><h3>Анжелика жаны ырын тартуулады</h3></a>
            </div>
            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/ayana.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Аяна Касымова Интернетти кайра дүңгүрөттү</h3></a>
            </div>
            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/kalykov.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Гүлжигит Калыков биздин студияда</h3></a>
            </div>
            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/winter.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Анжелика жаны ырын тартуулады</h3></a>
            </div>
            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/red.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Аяна Касымова Интернетти кайра дүңгүрөттү</h3></a>
            </div>
            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/nonred.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Гүлжигит Калыков биздин студияда</h3></a>
            </div>

            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/red.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Аяна Касымова Интернетти кайра дүңгүрөттү</h3></a>
            </div>
            <div class="col-md-4 col-sm-12 postshow">
              <img src="{{asset('images/channels/minkiyal/nonred.jpg')}}" class="img-responsive" alt="">
              <a href="#"><h3>Гүлжигит Калыков биздин студияда</h3></a>
            </div>

            <div class="col-md-12 more">
              <a class="show-btn loadMore" href="#">
                дагы жүктөө
              </a>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>


  <section id="services" >
    <div class="container-fluid infobar">
      <div class="container contacts">

        <div class="row">
          <div class="col-md-12 xcontact">
            <h2>- КТРК  “Миң Кыял FM” радиосу -</h2>
          </div>
          <div class="col-md-4 address">
            <h3><i class="fa fa-map-marker"></i> Дареги</h3>
            <ul>
              <li><i class="fa fa-location-arrow"></i> Кыргызстан, Бишкек  шаары</li>
              <li><i class="fa fa-home"></i> Жаш Гвардия бульвары, 59</li>
            </ul>
          </div>
          <div class="col-md-4 address">
            <h3><i class="fa fa-phone"></i> Байланыш телефон:</h3>
            <ul>
              <li><i class="fa fa-microphone"></i> Түз эфир: 0312 65 37 14</li>
              <li><i class="fa fa-commenting-o"></i> sms-портал: 10 00</li>
            </ul>
          </div>
          <div class="col-md-4 address">
            <h3><i class="fa fa-envelope-o"></i>E-mail:</h3>
            <ul>
              <li><i class="fa fa-envelope"></i> mkfmradio@gmail.com</li>
              <li><i class="fa fa-facebook-official"></i> www.facebook.com/MinKyalFm</li>
            </ul>
          </div>
        </div>


      </div>
    </div>
  </section><!--/#services-->

</body>




@stop

@section('footerScript')
    <script>
        $(function(){
            $("#allposts .postshow").slice(0, 6).show(); // select the first six
            $("#allposts .loadMore").click(function(e){ // click event for load more
                e.preventDefault();
                $("#allposts .postshow:hidden").slice(0, 6).show(); // select next 6 hidden divs and show them
                if($("#allposts .postshow:hidden").length == 0){ // check if any hidden divs still exist
                    $("#allposts .loadMore").hide();
                }
            });
            if($("#allposts .postshow:hidden").length == 0){ // check if any hidden divs still exist
                $("#allposts .loadMore").hide();
            }
        });
    </script>
    <script>
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