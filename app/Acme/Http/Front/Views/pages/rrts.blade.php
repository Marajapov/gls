@extends('Front::layouts.default')
@section('title', trans('site.RadioCenterFull').' | КТРК')
@section('styles')
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">--}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}">
@stop

@section('content')

  <div class="container main-wrapper">
    <div class="row">
      <section class="content clearfix">
        <div class="clearfix">
          <div class="top-left-block col-md-12">
            <div class="panel panel-default panel-rrts">
              <div class="panel-heading">
                <h3 class="panel-title"><span>{{ trans('site.RadioCenterFull') }}</span></h3>
              </div>
              <div class="panel-body">

                <div class="media">
                  <div class="media-left">
                    <div class="img-block">
                      <img src="{{ asset('static/files/rrts.jpg')}}" alt="Чабан">
                    </div>
                  </div>
                  <div class="media-body">
                    @if($lc == 'kg')
                      <p>Республиканский радиотелецентр Общественной телерадиовещательной корпорации КР создан в 15 мая 1969 года по приказу председателя Комитета по радиовещанию и телевидению при Совете Министров Киргизской ССР.</p>
                      <p>
                        Учурдагы Республикалык радиотелеборбордун негизги милдети КТРКнын телеберүү жана радио уктурууларынын материалдык-техникалык базасын жакшыртуу жана өнүктүрүү.
                      </p>

                    @elseif($lc == 'ru')
                      <p>
                        Республиканский радиотелецентр Общественной телерадиовещательной корпорации КР создан в 15 мая 1969 года по приказу председателя Комитета по радиовещанию и телевидению при Совете Министров Киргизской ССР.
                      </p>
                      <p>
                        Данное время основными задачами Радиотелецентра являются обеспечение радио и телевизионного вещания техническими средствами по всем программам, утвержденным КТРК.
                      </p>
                    @endif
                  </div>
                </div>

              </div>

              <div class="panel-heading">
                <h3 class="panel-title"><span>{{ trans('site.RadioCenterHistory') }}</span></h3>
              </div>

              <div class="panel-body">

                <div class="col-md-12">
                  <div class="row">
                    <div class="slider-for">
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/1.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') "Ала-Тоо" аянты алаканга салгандай
                          @elseif($lc == 'ru') Площадь "Ала-Тоо" как на ладони
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/2.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Техникалык жабдыктар текшерилүүдө
                          @elseif($lc == 'ru') Проверка технических оборудований
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/3.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Иш үстүндө: биз көрбөгөн чубалгылар
                          @elseif($lc == 'ru') Во время работы: столько кабелей
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/4.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Көчмө телевизиондук станция аянтта
                          @elseif($lc == 'ru') Передвижная телевизионная станция на площади
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/5.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Жумуш учуру: чубалгылардын узундугу ай
                          @elseif($lc == 'ru') Кабели скрываются под землей
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/6.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Даярдык жетекчилер көзөмөлүндө
                          @elseif($lc == 'ru') Руководители обсуждают
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/7.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') "Миң Кыял FM" радиоканалы үчүн аймактарга алып берүү жабдууларын орнотуу
                          @elseif($lc == 'ru') Установка передатчиков по регионам для радиостанции "Мин Кыял ФМ"
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/8.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Республикалык радиотелеборбор кызматкерлери
                          @elseif($lc == 'ru') Связисты радиотелецентра на высотке
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/9.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Көчмө телевизиондук станция Көчмөндөр оюндарында
                          @elseif($lc == 'ru') Передвижная телевизионная станция на Всемирной Игре Кочевников
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/10.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Көчмөндөр оюндарына даярдык
                          @elseif($lc == 'ru') Специалисты РРТЦ за работой
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/11.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Техникалык жабдыктар ишке даяр
                          @elseif($lc == 'ru') Оборудование под наблюдением
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/12.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') -
                          @elseif($lc == 'ru') За пультом
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/13.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') КТРКнын музейин жасоо учурунда
                          @elseif($lc == 'ru') Музей телевидения и радио
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/14.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') КТРК музейине техникалык жабдыктар орнотулууда
                          @elseif($lc == 'ru') -
                          @endif
                        </span>
                        <span class="slide-caption">КТРК музейине техникалык жабдыктар орнотулууда</span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/15.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') КТРКнын Ош шаарындагы студиясын даярдоо
                          @elseif($lc == 'ru') Подготовительные работы по запуску студии в горооде Ош
                          @endif
                        </span>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/16.jpg') }}" alt=""/>
                        <span class="slide-caption">
                          @if($lc == 'kg') Ош студиясы: акыркы даярдыктар
                          @elseif($lc == 'ru') Студия в городе Ош: последние приготовления
                          @endif
                        </span>
                        <span class="slide-caption">Ош студиясы: акыркы даярдыктар</span>
                      </div>
                    </div>

                    <div class="slider-nav col-md-12">
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/1.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/2.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/3.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/4.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/5.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/6.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/7.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/8.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/9.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/10.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/11.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/12.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/13.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/14.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/15.jpg') }}" alt=""/>
                      </div>
                      <div>
                        <img class="img" src="{{ asset('static/files/rrts/16.jpg') }}" alt=""/>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div><!-- end panel default -->
          </div>
        </div>
      </section>
    </div>
  </div>
@stop

@section('footerScript')

  <!--Carousel-->
  <script>
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      centerMode: true,
      focusOnSelect: true,
      variableWidth: true
    });
  </script>

  <script>

//    $(window).load(function(){
//      $('.img').each(function(){
//        var height = $(this).height();
//        var width = $(this).width();
//        var parentWidth = $(this).parent('.slick-slide').width();
//
//        if(height<100){
//          $(this).css({
//            'width' : 'auto',
//            'height' : '100%'
//          });
//        } else {
//          $(this).css({
//            'width' : '100%',
//            'height' : 'auto'
//          });
//        }
//      });
//    });
  </script>

@endsection