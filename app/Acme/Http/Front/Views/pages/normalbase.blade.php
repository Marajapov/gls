@extends('Front::layouts.default')
@section('title', trans('site.NormalBaseFull').' | КТРК')
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}">
@stop
@section('content')
  <div class="container main-wrapper">
    <div class="row">
      <section class="content clearfix">
        <div class="clearfix">
          <div class="top-left-block col-md-12">
            <div class="panel panel-default panel-base">
              <div class="panel-heading">
                <h3 class="panel-title"><span>{{ trans('site.NormalBaseFull') }}</span></h3>
              </div>
              <div class="panel-body">

                <ul class="list-group first-level">

                  @if($lc == 'kg')

                    <li class="list-group-item">
                      Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясы жөнүндө мыйзам
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <p>2011-жылдын 18-ноябрында Кыргыз Республикасынын Президенти Алмазбек Атамбаев  КРнын Жогорку Кеңеши тарабынан кабыл алынган "Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясы тууралуу" мыйзамга кол койгон.</p>
                            </div>
                            <div class="media-right">
                              <a target="_blank" href="{{ asset('static/files/zakon_kg.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Коомдук телерадиоберүү корпорациясынын Уставы
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <p>Корпорация өз ишмердүүлүгүндө КРнын Конститутциясы, КРнын массалык маалымат каражаттар чөйрөсүндөгү мыйзамы, "Телекөрсөтүү жана радиоберүү тууралуу" мыйзамы, "Кыргыз Республикасында Коомдук телерадиоберүүнү түзүү тууралуу" Убактылуу өкмөттүн Декрети, жана башка укуктук-нормативдик акт, Уставдын жобо менен жетектелет.</p>
                            </div>
                            <div class="media-right">
                              <a target="_blank" href="{{ asset('static/files/ustav.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Коомдук телерадиоберүү корпорациясынын Редакциялык саясаты
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <p>2011-жылдын 18-ноябрында Кыргыз Республикасынын Президенти Алмазбек Атамбаев  КРнын Жогорку Кеңеши тарабынан кабыл алынган "Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясы тууралуу" мыйзамга кол койгон.</p>
                            </div>
                            <div class="media-right">
                              <a target="_blank" href="{{ asset('static/files/politica.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Коомдук телерадиоберүү корпорациясынын структурасы
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <a target="_blank" href="{{ asset('static/files/struktura.jpg') }}" class="btn btn-default"><i class="fa fa-file-image-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Коомдук телерадиоберүү корпорациясынын эфирдик сеткасы
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <a target="_blank" href="{{ asset('static/files/setka.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                  @elseif($lc == 'ru')

                    <li class="list-group-item">
                      Закон Кыргызской Республики об Общественной телерадиокорпорации Кыргызской Республики
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <p>18 ноября 2011 года Президент Кыргызской Республики Алмазбек Атамбаев подписал Закон «Об Общественной телерадиовещательной корпорации Кыргызской Республики», принятый Жогорку Кенешем Кыргызской Республики. Законом предусматривается правовое положение Общественной телерадиовещательной корпорации Кыргызстана, как важного демократического института в республике.</p>
                            </div>
                            <div class="media-right">
                              <a target="_blank" href="{{ asset('static/files/zakon_ru.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Устав Общественной телерадиовещательной корпорации Кыргызской Республики
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <p>Корпорация в своей деятельности руководствуется Конституцией Кыргызской Республики, законами Кыргызской Республики в области средств массовой информации, Законом Кыргызской Республики "О телевидении и радиовещании" и другими нормативными документами Кыргызской Республики, а также положениями настоящего УСТАВА.</p>
                            </div>
                            <div class="media-right">
                              <a target="_blank" href="{{ asset('static/files/ustav.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Редакционная политика Общественной телерадиовещательной корпорации Кыргызской Республики
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <p>Этот документ служит также инструментом постоянной оценки медиа контента КТРК с целью постоянного улучшения качества содержания медиа продукции. Редакционная политика утверждается решением Наблюдательного Совета КТРК и обновляется по мере необходимости.</p>
                            </div>
                            <div class="media-right">
                              <a target="_blank" href="{{ asset('static/files/politica.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Организационная структура Общественной телерадиокорпорации Кыргызской Республики
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <a target="_blank" href="{{ asset('static/files/struktura.jpg') }}" class="btn btn-default"><i class="fa fa-file-image-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                    <li class="list-group-item">
                      Сетка вещания Общественной телерадиовещательной корпорации Кыргызской Республики
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <div class="media">

                            <div class="media-body">
                              <a target="_blank" href="{{ asset('static/files/setka.pdf') }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a>
                              {{--<a target="_blank" class="otchet" href="{{ asset('static/files/report/2014_kg.pdf') }}">Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын 2014-жылдык ишинин отчету</a>--}}
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>

                  @endif

                </ul>

              </div>
            </div><!-- end panel default -->
          </div>
        </div>
      </section>
    </div>
  </div>
@stop