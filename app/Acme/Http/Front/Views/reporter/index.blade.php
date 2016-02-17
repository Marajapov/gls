@extends('Front::layouts.default')
@section('title', trans('site.Reporter').' | КТРК')


@section('styles')
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
@stop


@section('content')

  <div class="container main-wrapper">
    <div class="row">
      <section class="content clearfix">
        <div class="clearfix">
          <div class="top-left-block col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default panel-report">
              <div class="panel-heading">
                <h3 class="panel-title"><span>{{ trans('site.Reporter') }} - {{ trans('site.ReporterAdd') }}</span></h3>
              </div>
              <div class="panel-body">

                <section>

                  {!! Form::open(array('route' => 'front.reporter.add', 'method' => 'post', 'enctype' => 'multipart/form-data', 'multiple'=>true, 'id'=>'addNews')) !!}

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="recipient-name" class="control-label">Аты жөнүңүз / Ваше имя </label>
                          <input name="name" required="true" type="text" class="form-control" placeholder="Сизди ким деп тааныштырабыз / Как вас познакомить" id="recipient-name">
                        </div>
                        <div class="col-md-6">
                          <label for="recipient-name" class="control-label">Телефонуңуз же Email / Телефон или Email</label>
                          <input name="nameRu" type="text" class="form-control" placeholder="Байланыш телефонуңуз же Email / Ваш контактный телефон или Email" id="recipient-name">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12 textforma">
                          <label for="message-text" class="control-label">Жаңылыктын мазмуну / Описание содержания:</label>
                          <textarea name="content" rows="10" class="form-control" placeholder="Жаңылыктын мазмуну, сүрөт жана видеолор боюнча маалымат / Содержание, информация по снимкам или видео" id="message-text"></textarea>
                        </div>
                      </div>
                    </div>

                    <p>
                      Эгерде файлыныз(фото же видео) болсо, макалага кошсонуз болот
                    </p>

                    <div class="form-group">
                      <label for="file" class="control-label">Фото</label>
                      <div class="form-group">
                        <input name="images[]" class="file" type="file" multiple>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="video" class="control-label">Видео</label>
                      <div class="form-group">
                        <input name="video" class="file" type="file">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-default btn-submit">
                      Кабарды жөнөтүү / Отправить новость
                    </button>

                  {!! Form::close() !!}

                </section>

              </div>
            </div>

          </div>
        </div>
      </section>
    </div>
  </div>

@endsection