@extends('Front::layouts.default')
@section('title', trans('site.BaikoochuKeneshFull').' | КТРК')
@section('styles')
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">--}}
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
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

                <div class="col-md-2">
                  <div class="row">
                    <nav class="navbar navbar-custom">
                      <div class="">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Меню</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li><a href="#">{{ trans('site.BaikoochuKeneshMain') }}</a></li>
                            <li><a href="#">{{ trans('site.BaikoochuKeneshTeam') }} </a></li>
                            <li><a href="#">{{ trans('site.BaikoochuKeneshNews') }}</a></li>
                            <li>
                              <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="collapsed">
                                {{ trans('site.BaikoochuKeneshBase') }}
                                <i class="fa fa-chevron-right"></i>
                              </a>
                              <div class="collapse" id="collapseExample">
                                <ul>
                                  <li><a href="#">{{ trans('site.BaikoochuKeneshReglament') }}</a></li>
                                  {{--<li><a href="#">Положение о порядке проведения открытого конкурса на замещение должности Генерального Директора КТРК КР</a></li>--}}
                                </ul>
                              </div>
                            </li>
                            <li><a href="#">{{ trans('site.BaikoochuKeneshReports') }}</a></li>
                            <li><a href="#">{{ trans('site.BaikoochuKeneshGallery') }}</a></li>
                            <li><a href="#">{{ trans('site.BaikoochuKeneshContacts') }}</a></li>
                            {{--<li><a href="#">Сурамжылоо</a></li>--}}
                          </ul>

                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>

                    <div class="panel-heading sidebar-panel-heading">
                      <h3 class="panel-title"><span>{{ trans('site.BaikoochuKeneshAsk') }}</span></h3>
                    </div>
                    <div class="panel-body sidebar-panel-body">
                      <h4><strong>Как Вы оцениваете работу НС КТРК?</strong></h4>

                      <div id="poll" class="poll">
                        <form >
                          <div class="radio">
                            <input type="radio" name="vote" id="radio1" value="1" onclick="getVote(this.value)">
                            <label for="radio1">
                              Отлично
                            </label>
                          </div>
                          <div class="radio">
                            <input type="radio" name="vote" id="radio2" value="2" onclick="getVote(this.value)">
                            <label for="radio2">
                              Хорошо
                            </label>
                          </div>
                          <div class="radio">
                            <input type="radio" name="vote" id="radio3" value="3" onclick="getVote(this.value)">
                            <label for="radio3">
                              Удовлетворительно
                            </label>
                          </div>
                        </form>
                      </div>

                    </div>

                  </div>
                </div>

                <div class="col-md-10">
                  <div class="row">
                    <div class="panel-heading second-panel-heading">
                      <h3 class="panel-title"><span>{{ trans('site.Top news') }}</span></h3>
                    </div>
                    <div class="panel-body second-panel-body">
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://sputnik.kg/images/102017/14/1020171449.jpg" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРК: из-за работы я стал изгоем для родственников</a>

                          <h5 class="media-desc">
                            <p>Кабинет, как у бизнесмена средней руки. Нет ни мебели красного дерева, как в вотчинах других чиновников высокого ранга, ни канцелярского набора из бирюзы. Из роскоши — 6 плазменных телевизоров на стене. Под столом склад жестянок с безалкогольным энергетиком.
                            </p></h5>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://ktrk.kg/sites/default/files/styles/juicebox_medium/public/gallery/album/fotos/_mg_9802.jpg?itok=YROMXAeD" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРКнын жаңыланган заманбап кеңсеси</a>

                          <h5 class="media-desc">
                            <p>Бүгүн, 6-ноябрда Коомдук телерадиоберүү корпорациясында жаңыланган заманбап үлгүдөгү иш кабинеттеринин ачылышы болду.
                            </p></h5>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://1000.ktrk.kg/img/thumbnail/11447849392.png" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КМЮА: ректор шайланды</a>

                          <h5 class="media-desc">
                            <p>Кыргызстандын жогорку окуу жайларында ректорду шайлоо өтүп жатат. Бүгүн кыргыз мамлекеттик юридикалык академиясы өзүнүн жетекчисин шайлады. Ага беш талапкер катышып, ар бири өзүнүн иш пландары менен тааныштырды.
                            </p></h5>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://sputnik.kg/images/102017/14/1020171449.jpg" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРК: из-за работы я стал изгоем для родственников</a>

                          <h5 class="media-desc">
                            <p>Кабинет, как у бизнесмена средней руки. Нет ни мебели красного дерева, как в вотчинах других чиновников высокого ранга, ни канцелярского набора из бирюзы. Из роскоши — 6 плазменных телевизоров на стене. Под столом склад жестянок с безалкогольным энергетиком.
                            </p></h5>
                        </div>
                      </div>

                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://ktrk.kg/sites/default/files/styles/juicebox_medium/public/gallery/album/fotos/_mg_9802.jpg?itok=YROMXAeD" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРКнын жаңыланган заманбап кеңсеси</a>

                          <h5 class="media-desc">
                            <p>Бүгүн, 6-ноябрда Коомдук телерадиоберүү корпорациясында жаңыланган заманбап үлгүдөгү иш кабинеттеринин ачылышы болду.
                            </p></h5>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://ktrk.kg/sites/default/files/styles/juicebox_medium/public/gallery/album/fotos/_mg_9802.jpg?itok=YROMXAeD" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРКнын жаңыланган заманбап кеңсеси</a>

                          <h5 class="media-desc">
                            <p>Бүгүн, 6-ноябрда Коомдук телерадиоберүү корпорациясында жаңыланган заманбап үлгүдөгү иш кабинеттеринин ачылышы болду.
                            </p></h5>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://ktrk.kg/sites/default/files/styles/juicebox_medium/public/gallery/album/fotos/_mg_9802.jpg?itok=YROMXAeD" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРКнын жаңыланган заманбап кеңсеси</a>

                          <h5 class="media-desc">
                            <p>Бүгүн, 6-ноябрда Коомдук телерадиоберүү корпорациясында жаңыланган заманбап үлгүдөгү иш кабинеттеринин ачылышы болду.
                            </p></h5>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object thumb" src="http://ktrk.kg/sites/default/files/styles/juicebox_medium/public/gallery/album/fotos/_mg_9802.jpg?itok=YROMXAeD" alt="image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="extra">
                            <span class="e-datetime">18 Нояб , 12:22</span>
                            <span class="e-views"><i class="fa fa-eye"></i>17</span>
                          </div>
                          <a class="media-heading" href="http://1000.ktrk.kg/post/1">КТРКнын жаңыланган заманбап кеңсеси</a>

                          <h5 class="media-desc">
                            <p>Бүгүн, 6-ноябрда Коомдук телерадиоберүү корпорациясында жаңыланган заманбап үлгүдөгү иш кабинеттеринин ачылышы болду.
                            </p></h5>
                        </div>
                      </div>
                    </div>

                    <footer>
                      <a href="{{ route('front.general') }}">
                        <span>{{ trans('site.FrontPostAll') }} <i class="fa fa-arrow-circle-right"></i></span>
                      </a>
                    </footer>
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