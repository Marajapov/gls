@extends('Front::channel.kyrgyzradio.default')
@section('title', $gallery->getName())
@section('styles')
<link rel="stylesheet" href="{{ asset('css/radios.css')}}">
<link rel="stylesheet" href="{{ asset('css/landing/dostuk.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/lightslider.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.6/css/lightgallery.min.css">
@endsection
@section('content')
<body id="home" class="homepage">
    <div class="container-fluid switch">
            <nav class="navbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                        <span class="sr-only">Меню</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="{{ asset('images/channels/dostuk.png')}}"><h4>Достук</h4></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav channel_switch">
                        <li class="sitemenu" id="site-channel1">
                            <a href="{{ route('front.home') }}"><img src="{{ asset('images/ktrk_last.svg')}}" style="height:40px;"><span>КТРК</span><h4>КТРК</h4></a></li>
                        <li class="sitemenu" id="site-channel1">
                            <a href="{{ route('birinchi.home') }}"><img src="{{ asset('images/channels/1-radio.png')}}" ><span>Биринчи радио</span><h4>Биринчи радио</h4></a></li>
                        <li class="sitemenu" id="site-channel1">
                            <a href="{{ route('kyrgyzradio.home') }}"><img src="{{ asset('images/channels/kg-radio.png')}}"><span>Кыргыз радиосу</span><h4>Кыргыз радиосу</h4></a></li>
                        <li class="sitemenu" id="site-channel1">
                            <a href="{{ route('minkiyal.home') }}"><img src="{{ asset('images/channels/min-kiyal.png')}}"><span>Миң кыял FM</span><h4>Миң кыял FM</h4></a></li>
                        <li class="sitemenu" id="site-channel1">
                            <a class="active" href="{{ route('dostuk.home') }}"><img src="{{ asset('images/channels/dostuk.png')}}"><span>Достук</span><h4>Достук</h4></a></li>    
                    </ul>   
                </div><!-- /.navbar-collapse -->
            </nav>
    </div>

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default fixedheader2" role="banner">
            <div class="container" style="padding: 0px;position:relative;">
                <div class="languages">
                    <ul>
                        <li @if(app()->getlocale() == 'kg') class="active" @endif><a href="/locale/kg">кырг <span></span></a></li>
                        <li @if(app()->getlocale() == 'ru') class="active" @endif><a href="/locale/ru">рус <span></span></a></li>
                    </ul>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Меню</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('dostuk.home') }}"><img src="{{ asset('images/channels/dostuk.png')}}" alt="logo">Достук</a>
                    <div class="onetime"><a href=""><button class="btn"><i class="fa fa-microphone"></i><span>{{ trans('radiopages.Live') }}</span></button></a></div>       
                </div>                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       <li><a href="{{route('dostuk.home')}}">{{ trans('radiopages.Home') }}</a></li>
                       <li class="dropdown">
                          <a class="dropdown-toggle" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('radiopages.Peredachi') }}<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                             @if($dostukProjects) 
                             @foreach($dostukProjects as $dostukProject)
                             <li>
                                <a href="{{ route('dostuk.project', $dostukProject) }}">{{ $dostukProject->getName() }}</a>
                             </li>
                             @endforeach
                             @endif
                          </ul>
                       </li>
                       <li><a href="{{route('dostuk.allphotos')}}">{{ trans('radiopages.Photos') }}</a></li>
                       <li><a href="{{route('dostuk.home')}}#about">{{ trans('radiopages.About') }}</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
   <!-- Main slider -->
   <div class="container" style="background: #fff;padding: 0px; margin: 20px auto;">


    <section id="portfolio2 " style="padding:20px 0px;">
        <div class="container">
            <div class="section-header2" style="margin:0px">
                <h2 class="section-title2 text-center wow fadeInDown" style="margin:0px;">{{ $gallery->getName() }}</h2>

            </div>

               <div class="panel-body">
                  <div class="row">
                   <p style="text-align:center;color: #272727;font-size: 18px;">{{ $gallery->getDescription() }}</p>
                     <ul id="imageGallery">
                     @foreach($images as $image)

                        <li data-thumb="{{ asset('froala/uploads/'.$image->name) }}" data-src="{{ asset('froala/uploads/'.$image->name) }}">
                           <img class="resizegallery" src="{{ asset('froala/uploads/'.$image->name) }}" />
                        </li>
                     @endforeach
                        
                     </ul>
                  </div>
               </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->

   </div>
   @stop
   @section('footerscript2')
   <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
   <script src="{{ asset('slick/slick.min.js') }}"></script>
   <script src="{{ asset('js/lightslider.js') }}"></script>
   <script src="{{ asset('js/lightgallery/picturefill.min.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lightgallery.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-fullscreen.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-thumbnail.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-video.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-autoplay.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-zoom.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-hash.js') }}"></script>
   <script src="{{ asset('js/lightgallery/lg-pager.js') }}"></script>
   <script src="{{ asset('jslightgallery/jquery.mousewheel.min.js') }}"></script>
   <script type="text/javascript">
      $(document).ready(function() {
      $('#imageGallery').lightSlider({
        gallery:true,
        item:1 ,
        loop:true,
        thumbItem:8,
        slideMargin:0,
        enableDrag: true,
        currentPagerPosition:'right',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
      });  
      });
   </script>
   @stop