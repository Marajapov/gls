@extends('Front::layouts.default')
@section('title', 'Валиева Тамара Бектурсуновна | Редакционный советник | КТРК')
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
            <div class="panel panel-default panel-kenesh panel-rs">
              <div class="panel-heading">
                <h3 class="panel-title"><span>Редакционный советник</span></h3>
              </div>
              <div class="panel-body">

                @include('Front::rs.sidebar')

                <div class="col-md-9">
                  <div class="row">
                    <div class="panel-heading second-panel-heading">
                      <h3 class="panel-title">
                        <span>
                          @if($person == 1)
                            Валиева Тамара Бектурсуновна
                          @elseif($person == 2)
                            Мамбеталиева Гульнара Мунуровна
                          @endif
                        </span>
                      </h3>
                    </div>
                    <div class="panel-body second-panel-body panel-person">

                      @if($person == 1)

                        <p class="text-center">
                          <img class="img-thumbnail" src="{{ asset('static/images/rs/rs.jpg') }}" alt=""/>
                        </p>

                        <p class="text-center"><strong>Редакционный советник КТРК (Омбудсмен)</strong></p>

                        <ul class="list-group first-level">

                          <li class="list-group-item">
                            Образование
                            <ul class="list-group second-level">
                              <li class="list-group-item">
                                <span class="list-extra">1977-1982гг.</span>
                                <span class="list-info">Ленинградский институт киноинженеров (ныне Санкт-Петербургский университет кино и телевидения.</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">1986 г.</span>
                                <span class="list-info">Всесоюзный институт повышения квалификации работников радио и телевидения (г.Москва)</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2002 г.</span>
                                <span class="list-info">Повышение квалификации на канале РТР (программа «Вести»)</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2004 г.</span>
                                <span class="list-info">Обучающий семинар в Швеции на тему: «Изучение системы выборов в парламент Европейского Союза. Вопросы достижения гендерного равенства в ЕС».</span>
                              </li>
                            </ul>
                          </li>
                          <li class="list-group-item">
                            Трудовая деятельность
                            <ul class="list-group second-level">
                              <li class="list-group-item">
                                <span class="list-extra">1982-1983гг.</span>
                                <span class="list-info">Республиканский радиотелецентр, инженер</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">1983-1994 гг.</span>
                                <span class="list-info">Гостелерадио Кыргызской ССР, звукорежиссер</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">1994-1996 гг.</span>
                                <span class="list-info">ГТРК, киноредакция, режиссер телевидения</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">1996-2005 гг.</span>
                                <span class="list-info">ТПО «Замана» ГТРК, Корреспондент, обозреватель, главный редактор, заместитель продюсера студии</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2005-г.</span>
                                <span class="list-info">Студия авторских программ ГТРК</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2005-2010гг.</span>
                                <span class="list-info">Студия социальных и экономических программ ГТРК, обозреватель, шеф-редактор</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2010-г.</span>
                                <span class="list-info">Департамент информации и рекламы мэрии г. Бишкек, главный специалист</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2010-г.</span>
                                <span class="list-info">Бишкекский городской кенеш, пресс-секретарь</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2010-2012гг.</span>
                                <span class="list-info">Интерньюс-Кыргызстан, продюсер  “Доор”</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2012-г. - по настоящее время </span>
                                <span class="list-info">ОФ «Айва Медиа», директор</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2012-2013гг.</span>
                                <span class="list-info">Проект Международного торгового центра (ITC) (по разработке СРЭ), национальный консультант по связям с общественностью</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2012-г.</span>
                                <span class="list-info">PR-менеджер проекта «Girls’ Day Кыргызстан»</span>
                              </li>
                            </ul>
                          </li>
                          <li class="list-group-item">
                            Дополнительная информация
                            <ul class="list-group second-level">
                              <li class="list-group-item">
                                <span class="list-extra">2005-г.</span>
                                <span class="list-info">совместный  проект  «Дебаты кандидатов в Президенты КР в прямом эфире»</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2006-г.</span>
                                <span class="list-info">цикл программ «Проявление», посвященных   теме «Гендер и   Цели развития тысячелетия» в качестве автора и продюсера.</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2006-г.</span>
                                <span class="list-info">автор, ведущая и продюсер программы «Бюджетный диалог»  ( совместно с  Фондом «Сорос-Кыргызстан»), направленной  на  повышение  бюджетной прозрачности  в  стране.</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2006-г.</span>
                                <span class="list-info">авторская программа «Семейный круг»</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2007-г.</span>
                                <span class="list-info">в качестве медиа-тренера участвовала в  проведении обучающего семинара для  дикторов, ведущих и  корреспондентов  различных телерадиоканалов республики по теме «Культура речи» в Интерньюс.</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2010-г.</span>
                                <span class="list-info">продюсер проекта “Выборы 2010.  ТВ -дебаты политических партий.  Парламентские выборы в ЖК КР”,  (совместный проект Интерньюс и НТРК КР)</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2011-г.</span>
                                <span class="list-info">тренер зимней школы журналистики Интерньюс</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2011-г.</span>
                                <span class="list-info">координатор проекта « Шайлоо-2011. ТВ-дебаты кандидатов в Президенты  КР. Выборы Президента КР» (Совместный проект Интерньюс и КТРК КР)</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2012-г.</span>
                                <span class="list-info">PR-менеджер проекта «Girls’ Day Кыргызстан»</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">-</span>
                                <span class="list-info">подготовка и проведение прямых эфиров в музыкально-информационной  программе «Замана», выходящей ежедневно на канале КТР, в качестве  ведущей,  корреспондента и продюсера</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">-</span>
                                <span class="list-info">ведение прямых трансляций с  наиболее важных общественно-политических событий, происходящих в республике</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">-</span>
                                <span class="list-info">Политический обозреватель</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">-</span>
                                <span class="list-info">Создание цикла детских программ «Друзья со всего мира»</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">-</span>
                                <span class="list-info">автором телевизионных программ «Национальный Банк сообщает», «Деловой мир», «Киномеридиан», «Дамский салон», «На кухне у знаменитых людей»</span>
                              </li>

                            </ul>
                          </li>
                          <li class="list-group-item">
                            Награды и премии
                            <ul class="list-group second-level">
                              <li class="list-group-item">
                                <span class="list-extra">2004-г.</span>
                                <span class="list-info">Президентская премия «Алтын калем» (Золотое перо)</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2005-г.</span>
                                <span class="list-info">1 премия  в конкурсе, объявленном ПРООН по выборам</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2008-г.</span>
                                <span class="list-info">Почетная Грамота Президента КР</span>
                              </li>
                              <li class="list-group-item">
                                <span class="list-extra">2009-г.</span>
                                <span class="list-info">«Отличник телевидения»</span>
                              </li>
                            </ul>
                          </li>

                        </ul>

                      

                      @endif

                    </div>

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
@endsection