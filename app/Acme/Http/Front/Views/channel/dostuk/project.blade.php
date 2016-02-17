@extends('Front::channel.kyrgyzradio.default')
@section('title', $project->getNameOne())
@section('styles')
<link rel="stylesheet" href="{{ asset('css/radios.css')}}">
<link rel="stylesheet" href="{{ asset('css/landing/dostuk.css')}}">
<link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
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
            <a class="navbar-brand" href="#">
               <img src="{{ asset('images/channels/dostuk.png')}}">
               <h4>Достук</h4>
            </a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav channel_switch">
               <li class="sitemenu" id="site-channel1">
                  <a href="{{ route('front.home') }}">
                     <img src="{{ asset('images/ktrk_last.svg')}}" style="height:40px;"><span>КТРК</span>
                     <h4>КТРК</h4>
                  </a>
               </li>
               <li class="sitemenu" id="site-channel1">
                  <a href="{{ route('birinchi.home') }}">
                     <img src="{{ asset('images/channels/1-radio.png')}}" ><span>Биринчи радио</span>
                     <h4>Биринчи радио</h4>
                  </a>
               </li>
               <li class="sitemenu" id="site-channel1">
                  <a href="{{ route('kyrgyzradio.home') }}">
                     <img src="{{ asset('images/channels/kg-radio.png')}}"><span>Кыргыз радиосу</span>
                     <h4>Кыргыз радиосу</h4>
                  </a>
               </li>
               <li class="sitemenu" id="site-channel1">
                  <a href="{{ route('minkiyal.home') }}">
                     <img src="{{ asset('images/channels/min-kiyal.png')}}"><span>Миң кыял FM</span>
                     <h4>Миң кыял FM</h4>
                  </a>
               </li>
               <li class="sitemenu" id="site-channel1">
                  <a class="active" href="{{ route('dostuk.home') }}">
                     <img src="{{ asset('images/channels/dostuk.png')}}"><span>Достук</span>
                     <h4>Достук</h4>
                  </a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
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
         </div>
         <!--/.container-->
      </nav>
      <!--/nav-->
   </header>
   <!--/header-->
   <div class="container" style="background: #fff;padding: 0px; margin: 20px auto;">
      <section id="services" style="padding: 0px;">
         <div class="container">
            <div class="row">
               <div class="top-left-block col-md-9" style="border-right: 1px solid #F1F4F9;">
                  <div class="panel panel-show">
                     <div class="panel-heading">
                        <h3 class="panel-title">
                           <a href="{{ route('dostuk.allnews') }}">{{ trans('radiopages.Peredachi') }}</a>
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
                                    <h4 class="show-title media-heading">{{ $project->getName() }}</h4>
                                    <p class="show-desc">
                                       {{ $project->description }}
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="panel panel-articles">
                     <div class="panel-heading">
                        <h3 class="panel-title">
                           {{ trans('radiopages.Peredachi') }}
                        </h3>
                     </div>
                     <div class="panel-body">
                        @if($relatedNews)
                        @foreach($project->program()->get() as $post)
                        <div class="media">
                           <div class="media-left">
                              <a href="{{ route('dostuk.news', $post) }}">
                              <img class="media-object thumb" src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif" alt="image">
                              </a>
                           </div>
                           <div class="media-body">
                              <div class="extra">
                                 <span class="e-datetime">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                 <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                              </div>
                              <a class="media-heading" href="{{ route('dostuk.news', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
                           </div>
                        </div>
                        @endforeach
                        @endif
                        <footer>
                           <a href="{{ route('dostuk.allnews') }}">{{ trans('radiopages.Morenews') }}</a>
                        </footer>
                     </div>
                  </div>
               </div>
               <div class="top-right-block col-md-3">
                  <div class="panel ctg-panel media-ctg-panel">
                     <div class="panel-heading">
                        <h3 class="panel-title"><span>{{ trans('radiopages.Peredachi') }}</span></h3>
                     </div>
                     <div class="panel-body">
                        <div class="col-md-12">
                           <div class="row">
                              <ul class="list-group">
                                 @if($dostukProjects) 
                                 @foreach($dostukProjects as $key=> $project)
                                 <li class="list-group-item">
                                    <a href="{{ route('dostuk.project', $project) }}">{{ $project->getName() }}</a>
                                 </li>
                                 @endforeach
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/.container-->
      </section>
   </div>
   @stop