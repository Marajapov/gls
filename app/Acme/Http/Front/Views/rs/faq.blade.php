@extends('Front::layouts.default')
@section('title', 'Что делать, если Ваши права были нарушены? | КТРК')
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
                      <h3 class="panel-title"><span>Что делать, если Ваши права были нарушены?</span></h3>
                    </div>
                    <div class="panel-body second-panel-body">

                      <h4><strong>Если Ваши права или интересы были нарушены, СООБЩИТЕ об этом Редакционному Советнику КТРК КР.</strong></h4>

                      <p>Жалобы на нарушения Ваших прав и  интересов в теле/радиоматериалах КТРК, а также  предложения  по улучшению  работы КТРК КР можно отправлять Редакционному Советнику КТРК несколькими путями:</p>

                      <ul class="tasks">
                        <li>
                          присылать по электронной почте на адрес rkktrkkg@gmail.com
                        </li>
                        <li>
                          позвонить по телефону (312) 65 67 21
                        </li>
                        <li>
                          написать в социальной сети Facebook на странице facebook.com/sovetnik.otrk
                        </li>
                        <li>
                          написать письмо и отправить его по адресу: 720010, г.Бишкек, бульвар Молодой Гвардии 59. На конверте указать «Редакционному Советнику-Омбудсмену»
                        </li>
                        <li>
                          написать на сайте www.ktrk.kg в разделе «Редакционный Советник»
                        </li>
                        <li>
                          оставить письмо в  Общественной приемной КТРК.
                        </li>
                      </ul>

                      <h4><strong>Правила заполнения жалоб</strong></h4>

                      <h4><strong>Форма для заполнения жалобы</strong></h4>

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