<div class="container-fluid topheader">
   <div class="row">
      <div class="main-header ">
         <div class="container">
            <div class="row">
               <header class="top-menu">                
                     <nav class="top-nav">
                        <ul>
                           <li><a href="{{ route('front.home') }}">
                               <img src="{{ asset('images/ktrk_last.svg')}}" height="20px" alt="">
                               <h4>КТРК</h4>
                              </a></li>
                           <li><a href="{{ route('kyrgyzradio.home') }}">
                              <img src="{{ asset('images/channels/kg-radio.png')}}" alt="">
                              <h4>Кыргыз Радиосу</h4>  
                              </a>
                           </li>
                           <li><a href="{{ route('minkiyal.home') }}">
                              <img src="{{ asset('images/channels/min-kiyal.png')}}" alt="">
                              <h4>Миң Кыял FM</h4>
                              </a>
                           </li>
                           <li><a href="{{ route('dostuk.home') }}">
                              <img src="{{ asset('images/channels/dostuk.png')}}" alt="">
                              <h4>Достук</h4>
                              </a>
                           </li>
         
                        </ul>
                     </nav>
                
               </header>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="container">
         <div class="col-md-3">
            <nav>
               <ul>
                  <li class="sitemenu" id="site-channel1">
                     <a href="{{ route('birinchi.home') }}">
                        <img class="onelogos" src="{{ asset('images/channels/1-radio-notext.png')}}">
                        <span>Биринчи радио</span>
                        <h4>Биринчи ради</h4>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
         <div class="col-md-9 oneheader">
            <ul class="nav navbar-nav chastota">
               <li>Бишкек 104.1</li>
               <li>{{ trans('radiopages.Issyk') }} 102.4</li>
               <li>Нарын 100.5</li>
               <li>Ош 100.7</li>
               <li>Баткен 104.2</li>
               <li>Жалал-Абад 104.7</li>
               <li>Талас 102.0</li>
            </ul>
            <ul class="nav navbar-nav oneline">
               <!--                             <li><a class="time" href="#"><time>11:15</time></a></li> -->
               <li class="onetime"><a href="{{ asset('online/online-1radio.php')}}" onclick="window.open(this.href, '', 'scrollbars=1,height='+Math.min(222, screen.availHeight)+',width='+Math.min(400, screen.availWidth)); return false;"><button class="btn"><i class="fa fa-microphone blink"></i><span>{{ trans('radiopages.Live') }}</span></button></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right onesoc">
               <li class="onepost"><a href=""><i class="fa fa-facebook"></i><span>facebook</span></a></li>
               <li class="onetwit"><a href=""><i class="fa fa-twitter"></i><span>twitter</span></a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="row">
      <nav class="navbar">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
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
               <a class="navbar-brand active" href="{{ route('birinchi.home') }}">{{ trans('radiopages.Home') }}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li><a href="{{ route('birinchi.about') }}">{{ trans('radiopages.About') }}</a></li>
                  <li class="dropdown">
                     <a href="{{ route('birinchi.allbroadcasts') }}" class="dropdown-toggle" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('radiopages.Peredachi') }} <i class="fa fa-angle-down"></i></a>
                     <ul class="dropdown-menu">
                        @if($birinchiProjects)
                        @foreach($birinchiProjects as $birinchiProject)
                        <li>
                           <a href="{{ route('birinchi.broadcasts', $birinchiProject) }}">{{ $birinchiProject->getName() }}</a>
                        </li>
                        @endforeach
                        @endif
                     </ul>
                  </li>
                  <li>
                     <a href="{{ route('birinchi.broadcastsprogramm') }}">
                     {{ trans('radiopages.Prperedach') }}
                     </a>
                  </li>
                  <li><a href="{{ route('birinchi.allphotos') }}"> {{ trans('radiopages.Photos') }}</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right logo-block onesearch">
                  <div class="language">
                     <ul>
                        <li @if(app()->getlocale() == 'kg') class="active" @endif><a href="/locale/kg">кырг</a></li>
                        <li @if(app()->getlocale() == 'ru') class="active" @endif><a href="/locale/ru">рус</a></li>
                     </ul>
                  </div>
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
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
   </div>
</div>