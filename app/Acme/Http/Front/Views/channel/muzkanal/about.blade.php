@extends('Front::channel.muzkanal.default')
@section('title', trans('radiopages.Mabout'))
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
                           <li><a class="active" href="{{ route('muzkanal.about') }}"></i>{{ trans('radiopages.Mabout') }}</a></li>
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
   <!--     <a href="#" class="col-md-12 hidden-xs text-center ads">
      <img src="images/ads_1.jpg" alt=""/>
      </a> -->
   <!-- Main slider -->
   <div class="container">
      <div class="row">
         <div class="col-md-12 aboutmuz">
            <div class="panel panel-default ">
               <div class="panel-heading">
                  <h3 class="panel-title"><span>{{ trans('radiopages.AboutMusic') }}</span></h3>
               </div>
               <div class="row">
                  <img class="backmuz" src="{{ asset('images/channels/muzkanal/notes.png')}}">   
                  <div class="col-md-8">
                     <div class="panel-body abouttextmuz">
                        @if(app()->getlocale() == 'ru')
                        <p class="onemuztext"><span>МУЗЫКА</span> — главный музыкальный телеканал в Кыргызстане, который начал свое вещание с 1 октября 2012 года, и в этот период в его эфире можно увидеть самые модные клипы кыргызских и зарубежных исполнителей, хит-парад и много интересных программ. </p>
                        @elseif(app()->getlocale() == 'kg')
                        <p class="onemuztext"><span>МУЗЫКА</span>– 2012 жылдын 1-октябрынан тарта иштеп келе жаткан Кыргызстандын эң негизги музыкалык телеканалы. Бул мезгилде МУЗЫКАнын эфиринен Кыргызстан жана чет элдик ырчыларынын эң саркеч клиптерин, ошондой эле Хит-Парад жана башка кызыктуу көрсөтүүлөрдү көрө аласыздар.</p>
                        @endif
                        <div class="aboutvipromo">
                           <iframe src="http://www.youtube.com/embed/t8r7ifqRViY?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="450"></iframe>
                        </div>
                        @if(app()->getlocale() == 'ru')
                        <p class="twomuztext"><img src="{{ asset('images/channels/muztv_color.png')}}" alt=""><span>МУЗЫКА</span> — единственный музыкальный канал, вошедший в пакет цифрового телевидения, который будет доступен каждому жителю Кыргызстана, охват канала составит 98% аудитории Кыргызстана. Так же телеканал МУЗЫКА вещает через спутник и в кабельных сетях Кыргызстана. </p>
                        @elseif(app()->getlocale() == 'kg')
                        <p class="twomuztext"><img src="{{ asset('images/channels/muztv_color.png')}}" alt=""><span>МУЗЫКА</span> –бул музыкалык каналдар арасынан санарипке кирген жалгыз телеканал болгондуктан Кыргызстандын ар-бир жашоочусуна жеткиликтүү телеканал. Бул жагдай аркылуу, телеканалдын аудиториясы  Кыргызстандын 98% көрүүчүлөрүн камтыйт.  Ошондой эле МУЗЫКА спутник жана кабелдик түйүндөр аркылуу да тартууланып келет.</p>
                        @endif
                        @if(app()->getlocale() == 'ru')
                        <p class="threemuztext">Сегодня МУЗЫКА– это только хиты, клипы и концерты лучших кыргызских артистов, музыкальный Хит-Парад, актуальные программы для зрителей. </p>
                        @elseif(app()->getlocale() == 'kg')
                        <p class="threemuztext">Бүгүнкү күндө МУЗЫКА-бул жалаң кыргыз аткаруучуларынын хит ырларын, эң мыкты клиптерин жана концерттерин, ошондой эле музыкалык Хит-Парад жана кызыктуу көрсөтүүлөрдү сунуштайт.</p>
                        @endif
                        @if(app()->getlocale() == 'ru')
                        <h3>Телеканал «МУЗЫКА»- только качественная музыка 24 часа в сутки.</h3>
                        @elseif(app()->getlocale() == 'kg')
                        <h3>МУЗЫКА телеканалы- 24 саат бою сапаттуу музыка тартуулайт.</h3>
                        @endif
                        @if(app()->getlocale() == 'ru')
                        <p class="twomuztext">МУЗЫКА – молодежный музыкальный канал, а это самая требовательная аудитория, которую только можно представить. Молодежь сложно удивлять и постоянно следовать современным тенденциям, МУЗЫКЕ удается не только показывать в эфире модную музыку, но и воспитывать настоящий, правильный музыкальный вкус молодежи.</p>
                        @elseif(app()->getlocale() == 'kg')
                        <p class="twomuztext">- бул эң жогорку сапатты талап  кылган жаштардын телеканалы. Жаштарды оңой менен таң калдыра албайсың, алар дайыма жаны тенденцияларга көңүл буруп келишет. МУЗЫКА- эфирден жалаң саркеч музыканы гана көргөзбөстөн, ошондой эле өсүп келе жаткан жаш муундун табитин тарбиялап жакшыртуу максатын көздөйт</p>
                        @endif
                        @if(app()->getlocale() == 'ru')
                        <h4>ПРЕМИЯ телеканала «МУЗЫКА»</h4>
                        @elseif(app()->getlocale() == 'kg')
                        <h4>«МУЗЫКА» телеканалынын СЫЙЛЫГЫ</h4>
                        @endif
                        @if(app()->getlocale() == 'ru')
                        <p class="twomuztext">Премия телеканала МУЗЫКА — одно из самых значимых, масштабных и престижных событий шоу-бизнеса, проводимое каналом «МУЗЫКА» с 2015 года. Это народный выбор, где победители определяются путем зрительского голосования. Стать обладателем желанной награды стремятся как начинающие музыканты, так и уже состоявшиеся звезды. Вручение «Премии МУЗЫКА» сопровождается появлением специальных гостей самых известных личностей страны. </p>
                        @elseif(app()->getlocale() == 'kg')
                        <p class="twomuztext">МУЗЫКА телеканалыны сыйлыгы- бул 2015 жылдан тарта  “МУЗЫКА” каналы өткөргөн, Кыргыз шоу-бизнесинин эң чоң, маанилүү  жана престиждүү аземи. Бул элдик тандоо, себеби мыктылар көрүучүлөрдүн добушу аркылуу тандалып  келет. Бул сыйлыктын ээси болууну жаш аткаруучулардан улуу муундун өкүлдөрүнө чейин каалап аракеттенишет. МУЗЫКА телеканалынын сыйлыгынын тапшыруусу кыргызстандын эң белгилүү инсандарынын катышуусу менен коштолуп өткөрүлөт.</p>
                        @endif
                        <div class="aboutvipromotwo">
                           <iframe src="http://www.youtube.com/embed/_qu2p_PTU0w?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                           <iframe src="http://www.youtube.com/embed/uLP1tEJlaDY?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="aboutposter"> 
                        <iframe src="http://www.youtube.com/embed/4YcI-Aya8YM?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                        <iframe src="http://www.youtube.com/embed/-wvYxvbALTI?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                        <iframe src="http://www.youtube.com/embed/WM1-Ofjhci4?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                        <iframe src="http://www.youtube.com/embed/nVE-p6Sse8k?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                        <iframe src="http://www.youtube.com/embed/I7YHajcdjvA?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                        <iframe src="http://www.youtube.com/embed/d1Lagbbn4TM?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" width="100%" height="200"></iframe>
                     </div>
                  </div>
               </div>
               <br>
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
   @stop