<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Главная страница</title>

    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/font-awesome.css"/>
    <link rel="stylesheet" href="filter/css/layout.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <!--<link rel="stylesheet" type="text/css" href="css/custombox.css"/>-->
    <link rel="stylesheet" href="css/style.css"/>

    <link href="jplayer/blue.monday/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />

    <script src="js/modernizr-2.6.2.min.js"></script>

    <script type="text/javascript" src="bitdashplayer/bitdashplayer.min.js"></script>

</head>
<body class="radios">

<!-- Modals -->
<div class="modal fade" id="tvModal" tabindex="-1" role="dialog" aria-labelledby="tvModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="tvModalLabel">Телеканалдар</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 modal-block">
                        <div>
                            <a href="#">
                                <img src="images/channels/balastan.png" alt=""/>
                            </a>
                            <div class="options">
                                <a class="link" href="#">Баластан</a>
                                <span class="divider"></span>
                                <a class="live" href="#"><i class="fa fa-dot-circle-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 modal-block">
                        <div>
                            <a href="#">
                                <img src="images/channels/muztv.png" alt=""/>
                            </a>
                            <div class="options">
                                <a class="link" href="#">Музыка</a>
                                <span class="divider"></span>
                                <a class="live" href="#"><i class="fa fa-dot-circle-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 modal-block">
                        <div>
                            <a href="#">
                                <img src="images/channels/madaniyat.png" alt=""/>
                            </a>
                            <div class="options">
                                <a class="link" href="#">Маданият</a>
                                <span class="divider"></span>
                                <a class="live" href="#"><i class="fa fa-dot-circle-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="radioModal" tabindex="-1" role="dialog" aria-labelledby="radioModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="radioModalLabel">Радиостанциялар</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 modal-block">
                        <a href="#">
                            <img src="images/channels/kg-radio.png" alt=""/>
                        </a>
                    </div>
                    <div class="col-md-4 modal-block">
                        <a href="#">
                            <img src="images/channels/1-radio.png" alt=""/>
                        </a>
                    </div>
                    <div class="col-md-4 modal-block">
                        <a href="#">
                            <img src="images/channels/dostuk.png" alt=""/>
                        </a>
                    </div>
                    <div class="col-md-4 modal-block">
                        <a href="#">
                            <img src="images/channels/min-kiyal.png" alt=""/>
                        </a>
                    </div>
                    <div class="col-md-4 modal-block">
                        <a href="#">
                            <img src="images/channels/baldar.png" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="liveModal" tabindex="-1" role="dialog" aria-labelledby="liveModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="liveModalLabel">Түз эфир - КТРК</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 modal-block">
                        <!-- the second player. uses the same video here but could be different -->
                        <a class="rtmp" href="mp4:bbb-800"
                           style="background-image:url(images/live_bg.png)">
                            <img src="images/live_play.png" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid main-header">
    <div class="container">
        <div class="row">
            <header class="top-menu">
                <div class="top-header clearfix">
                    <div class="col-md-12 logo-block">
                        <div class="row">
                            <a class="logo" href="#">
                                <img class="logo-ktrk" src="images/channels/1-radio.png" alt=""/>
                                <!--<img class="logo-madaniyat" src="images/channels/madaniyat.png" alt=""/>-->
                            </a>

                            <nav class="top-nav clearfix">
                                <ul class="clearfix">
                                    <li><a href="#">Башкы бет</a></li>
                                    <li>/</li>
                                    <li>
                                        <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" role="button" aria-expanded="false">КТРК</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Тарыхы</a></li>
                                            <li><a href="#">Жетекчилер</a></li>
                                            <li><a href="#">Стратегия</a></li>
                                            <li><a href="#">Нормативдик база</a></li>
                                            <li><a href="#">РРТЦ</a></li>
                                            <li><a href="#">Отчет</a></li>
                                        </ul>
                                    </li>
                                    <li>/</li>
                                    <li><a href="#">Видеопортал</a></li>
                                    <li>/</li>
                                    <li><a href="#">Телепрограмма</a></li>
                                    <li>/</li>
                                    <li><a href="#">Байкоочу кеңеш</a></li>
                                    <li>/</li>
                                    <li><a href="#">Редакциялык кеңешчи</a></li>
                                </ul>
                            </nav>

                            <ul class="soc">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-vk"></i></a></li>
                            </ul>

                            <form class="form-search" action="" method="post">
                                <div class="form-group pull-right">
                                    <input type="text" class="form-control" placeholder="Издөө"/>
                                </div>

                                <button class="btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>

                            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                                <div class="jp-type-single">
                                    <div class="jp-gui jp-interface">
                                        <div class="jp-controls">
                                            <button class="jp-play" role="button" tabindex="0"><i class="fa fa-play"></i></button>
                                        </div>
                                        <div class="jp-volume-controls">
                                            <div class="jp-online">онлайн</div>
                                            <div class="jp-volume-bar">
                                                <div class="jp-volume-bar-value"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-no-solution">
                                        <span>Update Required</span>
                                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-danger btn-live hidden" data-toggle="modal" data-target="#liveModal">
                                <i class="fa fa-dot-circle-o"></i>
                                түз эфир
                            </button>

                            <div class="tv-radio">
                                <a id="tv" href="#" title="Телеканалдар" data-toggle="modal" data-target="#tvModal"><img src="images/tv.svg" alt=""/></a>
                                <div class="divider"></div>
                                <a href="#" title="Радиостанциялар" data-toggle="modal" data-target="#radioModal"><img src="images/radio.svg" alt=""/></a>
                            </div>

                            <div class="tv-radio hidden">
                                <div class="component component-tv">
                                    <!-- Start Nav Structure -->
                                    <button class="cn-button" id="cn-button-tv"><img src="images/tv.svg" alt=""/></button>
                                    <div class="cn-wrapper" id="cn-wrapper-tv">
                                        <ul>
                                            <li><a href="#"><img src="images/channels/balastan.svg" alt="Баластан"/></a></li>
                                            <li><a href="#"><img src="images/channels/muztv.png" alt="Муз ТВ"/></a></li>
                                            <li><a href="#"><img src="images/channels/madaniyat.png" alt="Маданият"/></a></li>
                                        </ul>
                                    </div>
                                    <div id="cn-overlay-tv" class="cn-overlay"></div>
                                    <!-- End Nav Structure -->
                                </div>
                                <div class="divider"></div>
                                <div class="component component-radio">
                                    <!-- Start Nav Structure -->
                                    <button class="cn-button" id="cn-button-radio"><img src="images/radio.svg" alt=""/></button>
                                    <div class="cn-wrapper" id="cn-wrapper-radio">
                                        <ul>
                                            <li><a href="#"><img src="images/channels/kg-radio.png" alt="Кыргыз радиосу"/></a></li>
                                            <li><a href="#"><img src="images/channels/1-radio.png" alt="Биринчи Радио"/></a></li>
                                            <li><a href="#"><img src="images/channels/dostuk.png" alt="Достук"/></a></li>
                                            <li><a href="#"><img src="images/channels/min-kiyal.png" alt="Мин Кыял"/></a></li>
                                            <li><a href="#"><img src="images/channels/baldar.png" alt="Балдар ФМ"/></a></li>
                                        </ul>
                                    </div>
                                    <div id="cn-overlay-radio" class="cn-overlay"></div>
                                    <!-- End Nav Structure -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>
</div>

<div class="clearfix">
    <a href="#" class="col-md-12 text-center ads top-ads">
        <img src="images/ads_1.jpg" alt=""/>
    </a>
</div>

<div class="container main-wrapper">

    <div class="row">
        <section class="content clearfix">

            <div class="clearfix">
                <div class="top-left-block col-md-8">
                    <div class="panel panel-default panel-top-news">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>Топ жаңылыктар</span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4 block">
                                <figure class="effect-zoe">
                                    <a href="article.html" class="main-img"><img src="images/image.jpeg" alt="img26"><i class="fa fa-play-circle-o"></i></a>
                                    <div class="news-channel">
                                        <a href="channel.html"><img src="images/channels/balastan.png" alt=""/></a>
                                    </div>
                                    <figcaption>
                                        <h2><a href="article.html">Милиция кызматкерлери үйлүү болду</a></h2>
                                        <p class="description"><a href="category.html">Интернет жана технологиялар</a></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 block">
                                <figure class="effect-zoe">
                                    <a href="article.html" class="main-img"><img src="images/image.jpeg" alt="img26"></a>
                                    <div class="news-channel">
                                        <a href="channel.html"><img src="images/logo_notext.png" alt=""/></a>
                                    </div>
                                    <figcaption>
                                        <h2><a href="article.html">Милиция кызматкерлери үйлүү болду</a></h2>
                                        <p class="description"><a href="category.html">Интернет жана технологиялар</a></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 block">
                                <figure class="effect-zoe">
                                    <a href="article.html" class="main-img"><img src="images/image.jpeg" alt="img26"></a>
                                    <div class="news-channel">
                                        <a href="channel.html"><img src="images/logo_notext.png" alt=""/></a>
                                    </div>
                                    <figcaption>
                                        <h2><a href="article.html">Милиция кызматкерлери үйлүү болду</a></h2>
                                        <p class="description"><a href="category.html">Интернет жана технологиялар</a></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 block">
                                <figure class="effect-zoe">
                                    <a href="article.html" class="main-img"><img src="images/image.jpeg" alt="img26"></a>
                                    <div class="news-channel">
                                        <a href="channel.html"><img src="images/logo_notext.png" alt=""/></a>
                                    </div>
                                    <figcaption>
                                        <h2><a href="article.html">Милиция кызматкерлери үйлүү болду</a></h2>
                                        <p class="description"><a href="category.html">Интернет жана технологиялар</a></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 block">
                                <figure class="effect-zoe">
                                    <a href="article.html" class="main-img"><img src="images/image.jpeg" alt="img26"></a>
                                    <div class="news-channel">
                                        <a href="channel.html"><img src="images/logo_notext.png" alt=""/></a>
                                    </div>
                                    <figcaption>
                                        <h2><a href="article.html">Милиция кызматкерлери үйлүү болду</a></h2>
                                        <p class="description"><a href="category.html">Интернет жана технологиялар</a></p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 block">
                                <figure class="effect-zoe">
                                    <a href="article.html" class="main-img"><img src="images/image.jpeg" alt="img26"></a>
                                    <div class="news-channel">
                                        <a href="channel.html"><img src="images/logo_notext.png" alt=""/></a>
                                    </div>
                                    <figcaption>
                                        <h2><a href="article.html">Милиция кызматкерлери үйлүү болду</a></h2>
                                        <p class="description"><a href="category.html">Интернет жана технологиялар</a></p>
                                    </figcaption>
                                </figure>
                            </div>

                            <footer>
                                <a href="#">
                                    <span>Бардык жаңылыктар <i class="fa fa-arrow-circle-right"></i></span>
                                </a>
                            </footer>
                        </div>
                    </div>

                    <a href="#" class="text-center ads">
                        <img src="images/ads_1.jpg" alt=""/>
                    </a>

                    <div class="panel panel-default panel-carousel">
                        <div class="panel-body">
                            <div class="col-md-3 heading">
                                <div class="row">
                                    <h4><i class="fa fa-users"></i><span>Элдик репортер</span></h4>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="carousel">
                                    <div class="col-md-4"><img src="images/image.jpeg" alt=""/></div>
                                    <div class="col-md-4"><img src="images/image.jpeg" alt=""/></div>
                                    <div class="col-md-4"><img src="images/image.jpeg" alt=""/></div>
                                    <div class="col-md-4"><img src="images/image.jpeg" alt=""/></div>
                                    <div class="col-md-4"><img src="images/image.jpeg" alt=""/></div>
                                    <div class="col-md-4"><img src="images/image.jpeg" alt=""/></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="top-right-block col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>Күндүн видеосу</span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12 block main-video">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/k2w8UII9cgI" allowfullscreen=""></iframe>
                                </div>

                                <h4>Video title</h4>
                            </div>

                            <div class="clearfix"></div>

                            <h4 class="old-videos text-center">Өткөн күндөр</h4>

                            <div class="col-md-6 block main-video">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/k2w8UII9cgI" allowfullscreen=""></iframe>
                                </div>

                                <h4>Video title</h4>
                            </div>

                            <div class="col-md-6 block main-video">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/k2w8UII9cgI" allowfullscreen=""></iframe>
                                </div>

                                <h4>Video title</h4>
                            </div>

                            <footer>
                                <a href="#">
                                    <span>Архив <i class="fa fa-arrow-circle-right"></i></span>
                                </a>
                            </footer>

                        </div>
                    </div>

                    <a href="#" class="text-center ads ads-300x250">
                        <img src="images/ads_300x250.gif" alt=""/>
                    </a>

                </div>

            </div>



            <div class="bottom-left-block col-md-4">
                <div class="panel panel-default latest-news">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span>Акыркы жаңылыктар</span></h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item news-item">
                                <div class="news-body clearfix">
                                    <a href="#">
                                        <p class="news-title">В Бишкеке проходит внеочередной съезд партии "Республика Ата-Журт"</p>
                                        <span class="ctg"><img src="images/logo_notext.png" alt=""/></span>
                                    </a>
                                </div>
                                <div class="news-adds clearfix">
                                    <a href="#" class="">Политика</a>
                                    <span class="news-file"><i class="fa fa-play-circle-o"></i></span>

                                    <span class="news-time pull-right">10:10</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item news-item">
                                <div class="news-body clearfix">
                                    <a href="#">
                                        <p class="news-title">В Бишкеке проходит внеочередной съезд партии "Республика Ата-Журт"</p>
                                        <span class="ctg"><img src="images/logo_notext.png" alt=""/></span>
                                    </a>
                                </div>
                                <div class="news-adds clearfix">
                                    <a href="#">Политика</a>
                                    <span class="news-file"><i class="fa fa-image"></i></span>

                                    <span class="news-time pull-right">10:10</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item news-item">
                                <div class="news-body clearfix">
                                    <a href="#">
                                        <p class="news-title">В Бишкеке проходит внеочередной съезд партии "Республика Ата-Журт"</p>
                                        <span class="ctg"><img src="images/logo_notext.png" alt=""/></span>
                                    </a>
                                </div>
                                <div class="news-adds clearfix">
                                    <a href="#" class="">Политика</a>
                                    <span class="news-file"><i class="fa fa-play-circle-o"></i></span>

                                    <span class="news-time pull-right">10:10</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item news-item">
                                <div class="news-body clearfix">
                                    <a href="#">
                                        <p class="news-title">В Бишкеке проходит внеочередной съезд партии "Республика Ата-Журт"</p>
                                        <span class="ctg"><img src="images/logo_notext.png" alt=""/></span>
                                    </a>
                                </div>
                                <div class="news-adds clearfix">
                                    <a href="#" class="">Политика</a>
                                    <span class="news-file"><i class="fa fa-play-circle-o"></i></span>

                                    <span class="news-time pull-right">10:10</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item news-item">
                                <div class="news-body clearfix">
                                    <a href="#">
                                        <p class="news-title">В Бишкеке проходит внеочередной съезд партии "Республика Ата-Журт"</p>
                                        <span class="ctg"><img src="images/logo_notext.png" alt=""/></span>
                                    </a>
                                </div>
                                <div class="news-adds clearfix">
                                    <a href="#" class="">Политика</a>
                                    <span class="news-file"><i class="fa fa-play-circle-o"></i></span>

                                    <span class="news-time pull-right">10:10</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item news-item">
                                <div class="news-body clearfix">
                                    <a href="#">
                                        <p class="news-title">В Бишкеке проходит внеочередной съезд партии "Республика Ата-Журт"</p>
                                        <span class="ctg"><img src="images/logo_notext.png" alt=""/></span>
                                    </a>
                                </div>
                                <div class="news-adds clearfix">
                                    <a href="#" class="">Политика</a>
                                    <span class="news-file"><i class="fa fa-play-circle-o"></i></span>

                                    <span class="news-time pull-right">10:10</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>

                        <footer>
                            <a href="#">
                                <span>Бардык жаңылыктар <i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </footer>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span>Башкы директордун баракчасы</span></h3>
                    </div>
                    <div class="panel-body">
                        <div id="slideshow">
                            <div>
                                <a href="#">
                                    <img src="images/chief.jpg" alt="директор"/>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="images/chief_3.jpg">
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="images/chief_2.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bottom-right-block col-md-8">
                <div class="panel panel-default videoportal">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span>Видеопортал</span></h3>
                    </div>
                    <div class="panel-body">
                        <div>
                            <ul id="filters">
                                <li class="col-md-2"><span class="filter" data-filter="all-videos">Бардык</span></li>
                                <li class="col-md-2"><span class="filter" data-filter="tele">Телеберүүлөр</span></li>
                                <li class="col-md-2"><span class="filter" data-filter="serial">Сериалдар</span></li>
                                <li class="col-md-2"><span class="filter" data-filter="tasma">Көркөм тасма</span></li>
                                <li class="col-md-2"><span class="filter" data-filter="maanai">Маанайшат</span></li>
                                <li class="col-md-2"><span class="filter" data-filter="sport">Спорт</span></li>
                            </ul>
                        </div>


                        <div class="clearfix"></div>

                        <div id="portfoliolist">



                            

                        </div>

                        <footer>
                            <a href="#">
                                <span>Архив <i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </footer>

                    </div>
                </div>

                <a href="#" class="text-center ads">
                    <img src="images/ads_1.jpg" alt=""/>
                </a>

                <div class="panel panel-default panel-carousel gallery">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span>Фотогалерея</span></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="carousel-slick">
                                <div class="col-md-4"><a href="#"><img src="images/gallery/001.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/002.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/003.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/004.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/005.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/006.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/007.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/008.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/009.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/010.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/011.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                                <div class="col-md-4"><a href="#"><img src="images/gallery/012.jpg" alt=""/><span>Название</span><div class="overlay"></div></a></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>

    </div>

</div>

<div class="container">
    <div class="col-md-12 apps-logo">
        <div class="row">
            <div class="col-md-3 col-md-offset-3">
                <a href="#" class="android">
                    <img src="images/android.png" alt=""/>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="ios">
                    <img src="images/ios.png" alt=""/>
                </a>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <ul>
                                <li><a href="#">Башкы бет</a></li>
                                <li><a href="#">КТРК</a></li>
                                <li><a href="#">Видеопортал</a></li>
                                <li><a href="#">Телепрограмма</a></li>
                                <li><a href="#">Байкоочу кеңеш</a></li>
                                <li><a href="#">Редакциялык кеңешчи</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 copy"><i class="fa fa-copyright"></i> 2015 Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясы</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-hover-dropdown.js"></script>

<!--Menu concept-->
<!--<script src="js/polyfills.js"></script>-->
<!--<script src="js/demo1.js"></script>-->

<script type="text/javascript" src="filter/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="filter/js/jquery.mixitup.min.js"></script>

<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<!--Carousel-->
<script>
    $('.carousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    $('.carousel-slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1
    });
</script>

<!--Video filter-->
<script type="text/javascript">
    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist').mixitup({
                    showOnLoad: 'all-videos',
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {

                // Simple parallax effect
                $('#portfoliolist .portfolio').hover(
                        function () {
                            $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                            $(this).find('img').stop().animate({top: -40}, 250, 'easeOutQuad');
                        },
                        function () {
                            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                        }
                );

            }

        };

        // Run the show!
        filterList.init();
    });
</script>

<script type="text/javascript" src="js/flowplayer-3.2.13.min.js"></script>

<!--Photo slider-->
<script>
    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#slideshow > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('#slideshow');
    },  3000);
</script>

<script>
    $f("a.rtmp", "http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf", {

        // configure both players to use rtmp plugin
        clip: {
            provider: 'rtmp'
        },

        // here is our rtpm plugin configuration
        plugins: {
            rtmp: {

                // use latest RTMP plugin release
                url: "flowplayer.rtmp-3.2.13.swf",

                //
                //netConnectionUrl defines where the streams are found
                //this is what we have in our HDDN account
                //
                netConnectionUrl: 'rtmp://s3b78u0kbtx79q.cloudfront.net/cfx/st'
            }
        }

    });
</script>

<!--http://31.192.250.52:8000/obondoru128-->

<script type="text/javascript" src="jplayer/jquery.jplayer.min.js"></script>
<script>

    //<![CDATA[
    $(document).ready(function(){

        var stream = {
                    title: "ABC Jazz",
                    mp3: "http://31.192.250.52:8000/obondoru128"
                },
                ready = false;

        $("#jquery_jplayer_1").jPlayer({
            ready: function (event) {
                ready = true;
                $(this).jPlayer("setMedia", stream);
            },
            pause: function() {
                $(this).jPlayer("clearMedia");
            },
            error: function(event) {
                if(ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET) {
                    // Setup the media stream again and play it.
                    $(this).jPlayer("setMedia", stream).jPlayer("play");
                }
            },
            swfPath: "../dist/jplayer",
            supplied: "mp3",
            preload: "none",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            keyEnabled: true
        });
    });
    //]]>

    //]]>
</script>

</body>
</html>