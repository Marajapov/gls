@extends('Front::channel.muzkanal.default')
@section('title', trans('radiopages.Teleperedachi'))
@section('styles')
<link rel="stylesheet" href="{{ asset('css/audio/muzslider.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
@endsection
@section('content')
<body class="music">
   <div class="switch">
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
               <img src="{{ asset('images/channels/muz_white_notext.png')}}">
               <h4>Музыка</h4>
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
                  <a class="active" href="{{ route('muzkanal.home') }}">
                     <img src="{{ asset('images/channels/muz_white_notext.png')}}" ><span>Музыка</span>
                     <h4>Музыка</h4>
                  </a>
               </li>
               <li class="sitemenu" id="site-channel1">
                  <a href="{{ route('madaniyat.home') }}">
                     <img src="{{ asset('images/channels/madaniyat_white_notext.png')}}"><span>Маданият</span>
                     <h4>Маданият</h4>
                  </a>
               </li>
               <li class="sitemenu" id="site-channel1">
                  <a href="{{ route('balastan.home') }}">
                     <img src="{{ asset('images/channels/balastan_white_notext.png')}}"><span>Баластан</span>
                     <h4>Баластан</h4>
                  </a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </nav>
   </div>
   <div class="container main-header">
      <div class="row">
         <div class="col-md-12">
            <div class="row fixedheader">
               <nav class="navbar">
                  <div class="container-fluid">
                     <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Меню</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <div class="logo-block search-block">
                           <a class="search-toggle"><i class="fa fa-search"></i></a>
                           <form class="form-search" action="{{ route('front.search') }}" method="get">
                              <div class="form-group pull-right">
                                 <input type="text" name="search" class="form-control" placeholder="Издөө"/>
                              </div>
                              <a class="btn close-search">
                              <i class="fa fa-close"></i>
                              </a>
                              <button class="btn submit-search" type="submit">
                              <i class="fa fa-search"></i>
                              </button>
                           </form>
                        </div>
                        <a class="navbar-brand" href="{{ route('muzkanal.home') }}"> <i class="fa fa-home"></i><span>{{ trans('radiopages.Home') }}</span></a>
                     </div>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                           <li><a href="{{ route('muzkanal.about') }}"></i>{{ trans('radiopages.Mabout') }}</a></li>
                           <li>
                              <a href="{{ route('muzkanal.hitparad') }}">
                                 <i class="fa fa-microphone"></i>Хит-Парад <!-- <span class="caret"></span> -->
                              </a>
                           </li>
                           <li><a href="{{ route('muzkanal.allphotos') }}"><i class="fa fa-picture-o"></i>{{ trans('radiopages.Photos') }}</a></li>
                           <li><a href="{{ route('muzkanal.videos') }}"><i class="fa fa-youtube-play"></i>{{ trans('radiopages.Clips') }}</a></li>
                           <li><a class="active" href="{{ route('muzkanal.teleprogram') }}"><i class="fa fa-television"></i>{{ trans('site.Teleprogram') }}</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right logo-block">
                           <ul class="soc socmuz">
                              <li class="tw"><a href="https://twitter.com/TelekanalMuzyka" title="Twitter"><i class="fa fa-twitter"></i> </a>  </li>
                              <li class="fb"><a href="https://www.facebook.com/muzykaotrk/" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                              <li class="ok"><a href="http://ok.ru/group/52901559140520" title="Odnoklassniki"><i class="fa fa-odnoklassniki"></i></a></li>
                              <li class="yt"><a href="https://www.youtube.com/channel/UCPYuDx0G3WgGH3SR86VUnlA" title="YouTube"><i class="fa fa-youtube"></i></a></li>
                              <li class="in"><a href="https://www.instagram.com/muzyka.otrk/" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                           </ul>
                           <a class="search-toggle"><i class="fa fa-search"></i></a>
                           <form class="form-search" action="{{ route('front.search') }}" method="get">
                              <div class="form-group pull-right">
                                 <input type="text" name="search" class="form-control" placeholder="Издөө"/>
                              </div>
                              <a class="btn close-search">
                              <i class="fa fa-close"></i>
                              </a>
                              <button class="btn submit-search" type="submit">
                              <i class="fa fa-search"></i>
                              </button>
                           </form>
                           <div class="clangs">
                              <ul>
                                 <li @if(app()->getlocale() == 'kg') class="active" @endif><a href="/locale/kg">кырг <span></span></a></li>
                                 <li @if(app()->getlocale() == 'ru') class="active" @endif><a href="/locale/ru">рус <span></span></a></li>
                              </ul>
                           </div>
                           <!--                                         <button class="btn btn-danger btn-live" data-toggle="modal" data-target="#liveModal">
                              <i class="fa fa-dot-circle-o"></i>
                              түз эфир
                              </button> -->
                        </ul>
                     </div>
                     <!-- /.navbar-collapse -->
                  </div>
                  <!-- /.container-fluid -->
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!--     <a href="#" class="col-md-12 hidden-xs text-center ads">
      <img src="images/ads_1.jpg" alt=""/>
      </a> -->
   <!-- Main slider -->
   <div class="container">
      <div class="row">
         <div class="col-md-12 aboutmuz">
            <div class="panel onenews teleprogramm">
               <div class="panel-heading">
                  <h3 class="panel-title"><span>{{ trans('radiopages.Teleperedachi') }}</span></h3>
               </div>
               <div class="panel-body">
                  <ul id="tabs" class="nav nav-tabs teletabs" data-tabs="tabs">
                     @foreach($programs as $key => $program)
                     @foreach($schedules as $schedule)
                     @if($program['date'] == $schedule->date)
                     <li class="@if($currentDate == $program['date']) active @endif">
                        <a href="#{{ $program['date'] }}" data-toggle="tab">
                        @if($lc == 'kg')
                        {{ $schedule->getDay().' '.$schedule->getMonth().' - '.$schedule->getWeekKg() }}
                        @elseif($lc == 'ru')
                        {{ $schedule->getDay().' '.$schedule->getMonth().' - '.$schedule->getWeekRu() }}
                        @endif
                        </a>
                     </li>
                     @endif
                     @endforeach
                     @endforeach
                  </ul>
                  @if($programs)
                  <div id="my-tab-content" class="tab-content">
                     @foreach($programs as $key => $program)
                     @foreach($schedules as $schedule)
                     @if($program['date'] == $schedule->date)
                     <div class="tab-pane @if($schedule->date == $currentDate) active @endif" id="{{ $schedule->date }}">
                        <table class="table program">
                           <tbody>
                              @for($i=0; $i<count($program)-1; $i++)
                              @if((strtotime($schedule->date) < strtotime($currentDate)))
                              <tr class="tele-row tele-passed">
                                 @elseif(($schedule->date == $currentDate) && ($i < count($program)-2))
                                 @if((strtotime($program[$i]->time) <= strtotime($currentTime)) && (strtotime($currentTime) < strtotime($program[$i+1]->time)))
                              <tr class="tele-row tele-live">
                                 @elseif((strtotime($program[$i]->time) < strtotime($currentTime)) && ($program[$i]->time != '00:00'))
                              <tr class="tele-row tele-passed">
                                 @endif
                                 @elseif(($schedule->date == $currentDate) && ($i == count($program)-1))
                                 @if((strtotime($program[$i]->time) <= strtotime($currentTime)))
                              <tr class="tele-row tele-live">
                                 @elseif((strtotime($program[$i]->time) < strtotime($currentTime)) && ($program[$i]->time != '00:00'))
                              <tr class="tele-row tele-passed">
                                 @endif
                                 @else
                              <tr class="tele-row ">
                                 @endif
                                 <th class="tele-time">
                                    {{ $program[$i]->time }}
                                 </th>
                                 <td class="tele-show">
                                    @if(($schedule->date == $currentDate) && ($i < count($program)-2))
                                    @if((strtotime($program[$i]->time) <= strtotime($currentTime)) && (strtotime($currentTime) < strtotime($program[$i+1]->time)))
                                    @if($lc == 'kg')
                                    <span id="bcLive"><i class="fa fa-circle"></i>азыр эфирде</span>
                                    @elseif($lc == 'ru')
                                    <span id="bcLive"><i class="fa fa-circle"></i>сейчас в эфире</span>
                                    @endif
                                    @endif
                                    @elseif(($schedule->date == $currentDate) && ($i == count($program)-1))
                                    @if((strtotime($program[$i]->time) <= strtotime($currentTime)))
                                    @if($lc == 'kg')
                                    <span id="bcLive"><i class="fa fa-circle"></i>азыр эфирде</span>
                                    @elseif($lc == 'ru')
                                    <span id="bcLive"><i class="fa fa-circle"></i>сейчас в эфире</span>
                                    @endif
                                    @endif
                                    @endif
                                    <h4>{{ $program[$i]->name }}</h4>
                                    {{--
                                    <h5 class="tele-extra"><i class="fa fa-play-circle-o"></i>Сериал</h5>
                                    --}}
                                 </td>
                              </tr>
                              @endfor
                           </tbody>
                        </table>
                     </div>
                     @endif
                     @endforeach
                     @endforeach
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   @stop
   @section('footerscript2')
   <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
   <!-- Fixed Sticky header -->
   <script type ="text/javascript" src ="{{ asset('js/script.js') }}"></script>   
   <!-- Fixed Sticky header -->
   <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>

   <script type="text/javascript">
      jQuery(document).ready(function ($) {
        $('#nt-example1').tab();
      
        blink($('#bcLive'), -1, 500);
      
        function blink(elem, times, speed) {
          if (times > 0 || times < 0) {
            if ($(elem).hasClass("blink"))
              $(elem).removeClass("blink");
            else
              $(elem).addClass("blink");
          }
          clearTimeout(function () {
            blink(elem, times, speed);
          });
          if (times > 0 || times < 0) {
            setTimeout(function () {
              blink(elem, times, speed);
            }, speed);
            times -= .5;
          }
        }
      });
   </script>
   @stop