@extends('Front::layouts.default')
@section('title', trans('site.Managers')." | КТРК")
@section('styles')
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
@endsection

@section('content')
  <div class="container main-wrapper">
    <div class="row">
      <section class="content clearfix">
        <div class="clearfix">
          <div class="top-left-block col-md-12">
            <div class="panel panel-default panel-managers">
              <div class="panel-heading">
                <h3 class="panel-title">{{ trans('site.Managers') }}</h3>
              </div>

              <div class="panel-body">

                {{--<div class="col-md-12 directors">--}}
                  {{--<div class="col-md-6">--}}
                    {{--<div class="row">--}}
                      {{--<img src="{{ asset('images/managers/1_2.jpg') }}" >--}}
                    {{--</div>--}}
                  {{--</div>--}}
                  {{--<div class="col-md-6 director-info">--}}
                    {{--<div class="row">--}}
                      {{--<h4>Карыпбеков Илим Майрамбекович</h4>--}}
                      {{--<h5>КТРКнын башкы директору</h5>--}}
                      {{--<a href="{{ route('front.pages.director') }}" class="btn btn-default">Толук маалымат</a>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}

                <div class="col-md-4">
                  <div class="manager clearfix">
                    <div class="col-md-12 manager-thumb">
                      <div class="row">
                        <img src="{{ asset('images/managers/manager_1.jpg') }}">
                      </div>
                    </div>
                    <div class="col-md-12 manager-info">
                      <div class="row">
                        <h4>Карыпбеков Илим Майрамбекович</h4>
                        <hr/>
                        @if($lc == 'kg')
                          <h5>КТРКнын башкы директору</h5>
                        @else
                          <h5>Генеральный директор КТРК</h5>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="manager clearfix">
                    <div class="col-md-12 manager-thumb">
                      <div class="row">
                        <img src="{{ asset('images/managers/manager_2.jpg') }}">
                      </div>
                    </div>
                    <div class="col-md-12 manager-info">
                      <div class="row">
                        <h4>Асылбашев Калыйбек Шаршеналиевич</h4>
                        <hr/>
                        @if($lc == 'kg')
                          <h5>КТРКнын башкы директорунун телеберүүлөр боюнча орун басары</h5>
                        @else
                          <h5>Заместитель генерального директора КТРК по телевещанию</h5>
                        @endif

                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="manager clearfix">
                    <div class="col-md-12 manager-thumb">
                      <div class="row">
                        <img src="{{ asset('images/managers/manager_3.jpg') }}">
                      </div>
                    </div>
                    <div class="col-md-12 manager-info">
                      <div class="row">
                        <h4>Иманалиев Кайрат Олжобаевич</h4>
                        <hr/>
                        @if($lc == 'kg')
                          <h5>КТРКнын башкы директорунун радио уктуруулар боюнча орун басары</h5>
                        @else
                          <h5>Заместитель генерального директора КТРК по радио вещанию </h5>
                        @endif

                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-offset-2 col-md-4">
                  <div class="manager clearfix">
                    <div class="col-md-12 manager-thumb">
                      <div class="row">
                        <img src="{{ asset('images/managers/manager_4.jpg') }}">
                      </div>
                    </div>
                    <div class="col-md-12 manager-info">
                      <div class="row">
                        <h4>Алиев Бактияр Жеңишбекович</h4>
                        <hr/>
                        @if($lc == 'kg')
                          <h5>КТРКнын Республикалык радио телеборборунун директору</h5>
                        @else
                          <h5>Директор Республиканского радиотелецентра КТРК</h5>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="manager clearfix">
                    <div class="col-md-12 manager-thumb">
                      <div class="row">
                        <img src="{{ asset('images/managers/manager_5.jpg') }}">
                      </div>
                    </div>
                    <div class="col-md-12 manager-info">
                      <div class="row">
                        <h4>Асанбек уулу Руслан</h4>
                        <hr/>

                        @if($lc == 'kg')
                          <h5>КТРКнын аппарат жетекчиси</h5>
                        @else
                          <h5>Руководитель аппарата КТРК</h5>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

              </div><!-- end panel body-->

            </div>

          </div>
        </div>
      </section>
    </div>
  </div>
@stop