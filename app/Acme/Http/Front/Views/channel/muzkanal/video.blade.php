@extends('Front::channel.muzkanal.default')
@section('title', "Музканал")
@section('styles')
<link rel="stylesheet" href="{{ asset('css/audio/muzslider.css') }}"/>
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
                           <li><a href="{{ route('muzkanal.teleprogram') }}"><i class="fa fa-television"></i>{{ trans('site.Teleprogram') }}</a></li>
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
   <!-- Main slider -->
   <div class="container">
      <div class="row" style="background:#fff; margin-top:10px;">
         <div class="col-md-9 videopage" style="border-right: 1px solid #DEDEDE;">
            <div class="panel panel-video">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4 class="show-title">
                        <a href="{{route ('muzkanal.videos')}}">Музыка</a>
                        <i class="fa fa-caret-right"></i>
                        <span>{{ $muzkanalvideo->getName()}}</span>
                     </h4>
                  </div>
               </div>
               <div class="panel-body">
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div role="tabpanel" class="clearfix" id="all-videos">
                        <div class="row">
                           <article class="col-md-12" data-cat="all-videos">
                              <div class="extra">
                                 @if(auth()->user())
                                 <span class="art-edit"><a href="{{ route('admin.media.edit', $muzkanalvideo) }}" target="_blank"><i class="fa fa-pencil"></i>{{ trans('site.AdminPostEdit') }}
                                 {{--<span class="glyphicon glyphicon-pencil"></span>--}}  </a>
                                 @endif
                                 </span>
                              </div>
                              <div class="embed-responsive embed-responsive-16by9 show-video">
                                 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $muzkanalvideo->getUrl()}}"></iframe>
                              </div>
                           </article>
                        </div>
                        <div>
                           <div class="vote">
                              <div class="dislike" data-dislikes="10"><i class="fa fa-thumbs-down"></i></div>
                           </div>
                           <div class="vote">
                              <div class="like" data-likes="10"><i class="fa fa-thumbs-up"></i></div>
                           </div>
                        </div>
                        <p class="video-desc">
                           {{ $muzkanalvideo->getContent()}}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 videopage" style="padding:0px;">
            <div class="panel panel-video">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4 class="show-title">
                        <span>{{ trans('radiopages.TopCLips') }}</span>
                     </h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="col-md-12">
                     <div class="righttopvideo">
                        @if($MediaTop1)
                        @foreach($MediaTop1 as $top1)
                        <div class="row" style="margin: 0px -25px 5px -25px">
                           <div class="col-md-12" style="margin-bottom:10px;">
                              <a href="{{ route('muzkanal.video', $top1)}}">
                              <img src="http://img.youtube.com/vi/{{ $top1->getUrl() }}/mqdefault.jpg" alt=""/></a>
                              @if($top1->exclusive == 1)
                                 <div class="ishit">Экслюзив!</div>
                              @endif
                              <div class="views"><i class="fa fa-eye"></i>{{ $top1->getViewed() }}</div>
                               <div class="item-desc">
                                 <ul>
                                    <a href="{{ route('muzkanal.video', $top1)}}">
                                       <li class="item-artist">{{ $top1->getName() }}</li>
                                    </a>
                                 </ul>
                              </div>
                           </div>                          
                          
                         
                        </div>
                        @endforeach
                        @endif                           
                     </div>
                     <footer>
                        <a href="{{ route('muzkanal.videos')}}">
                        <span>{{ trans('radiopages.AllVideos') }} <i class="fa fa-arrow-circle-right"></i></span>
                        </a>
                     </footer>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="row topvideos videostyle">
               <div class="panel panel-default panel-carousel gallery">
                  <div class="panel-heading">
                     <h3 class="panel-title"><span>{{ trans('radiopages.RelatedCLips') }}</span></h3>
                  </div>
                  <div class="panel-body">
                     <div class="col-md-12 videofix">
                        <div class="carousel-slick">
                           @foreach($relatedmuzkanalVideos as $relatedmuzkanalVideo)
                           <div class="col-md-4 col-xs-12">
                              <a href="{{ route('muzkanal.video', $relatedmuzkanalVideo)}}">
                              <img src="http://img.youtube.com/vi/{{ $relatedmuzkanalVideo->getUrl() }}/mqdefault.jpg" alt=""/></a>
                              <div class="item-desc">
                                 <ul>
                                    <a href="{{ route('muzkanal.video', $relatedmuzkanalVideo)}}">
                                       <li class="item-artist">{{ $relatedmuzkanalVideo->getName() }}</li>
                                    </a>
                                 </ul>
                              </div>
                              @if($relatedmuzkanalVideo->exclusive == 1)
                                 <div class="ishit">Экслюзив!</div>
                              @endif
                              <div class="views"><i class="fa fa-eye"></i>{{ $relatedmuzkanalVideo->getViewed() }}</div>
                           </div>
                           @endforeach
                        </div>
                        <footer>
                           <a href="{{ route('muzkanal.videos')}}">
                           <span>{{ trans('radiopages.AllVideos') }}<i class="fa fa-arrow-circle-right"></i></span>
                           </a>
                        </footer>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @stop
   @section('footerscript2')
   <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
   <script>
      $(document).ready(function () {
          $(".search-toggle").click(function () {
              $(".logo-block").addClass("search-show");
              $(".form-search").addClass("visible");
          });
          $(".close-search").click(function () {
              $(".logo-block").removeClass("search-show");
              $(".form-search").removeClass("visible");
          });
      });
   </script>   
   <script type="text/javascript" src="{{ asset('filter/js/jquery.easing.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('filter/js/jquery.mixitup.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/jquery.roundabout.js') }}"></script>
   <!-- Fixed Sticky header -->
   <script type ="text/javascript" src ="{{ asset('js/script.js') }}"></script>   
   <!-- Fixed Sticky header -->
   <!--Carousel-->
   <script>
      if ($(window).width() > 768) {
          $('.carousel-slick').slick({
              infinite: true,
              slidesToShow: 4,
              slidesToScroll: 1,
              autoplay: false,
              autoplaySpeed: 4500
          });
      }      
      
      if ($(window).width() < 768) {
          $('.carousel-slick').slick({
              infinite: true,
              slidesToShow: 2,
              slidesToScroll: 1,
              autoplay: false,
              autoplaySpeed: 4500
          });
      }
      
   </script>
   <script>
      $(document).ready(function () {
          var likes = 12;
          var dislikes = 6;
          $('.like').attr('data-likes', likes);
          $('.dislike').attr('data-dislikes', dislikes);
          $('.text').click(function () {
              $('.like').toggleClass('like_active');
              $('.dislike').toggleClass('dislike_active');
              if ($('.text').text() == 'Vote') {
                  $('.text').text('Cancel');
              } else {
                  $('.text').text('Vote');
              }
          })
          $('.like').click(function () {
              likes++;
              $('.like').attr('data-likes', likes);
              $('.like').removeClass('like_active');
              $('.dislike').removeClass('dislike_active');
              $('.text').text('Vote');
          })
          $('.dislike').click(function () {
              dislikes++;
              $('.dislike').attr('data-dislikes', dislikes);
              $('.like').removeClass('like_active');
              $('.dislike').removeClass('dislike_active');
              $('.text').text('Vote');
          })
      })
   </script>
   @stop