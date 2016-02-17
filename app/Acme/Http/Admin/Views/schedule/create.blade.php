@extends('Admin::layouts.default')
@section('title', 'Новая программа')

@section('content')

  <div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h4>Создать программу</h4>
        </div>

        <div class="x_content">
          {!! Form::model($schedule, ['route' => 'admin.schedule.store','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
            @include('Admin::partials.forms.schedule', $schedule)
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>

@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ru.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/transition.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/collapse.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
  <script>
    $('#dateMonday').datetimepicker({
      locale: 'ru',
      format: 'DD-MM-YYYY'
    });
  </script>
@stop

