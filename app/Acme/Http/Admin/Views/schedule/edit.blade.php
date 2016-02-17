@extends('Admin::layouts.default')
@section('title', $schedule->date)

@section('content')
  <div class="row modals">
    <div class="x_panel">

      <div class="x_title">
        <h4>Программа передач {{ $schedule->getDay().'-'.mb_strtolower($schedule->getMonthFull()) }}</h4>
      </div>

      <div class="x_content program">

        {!! Form::model($schedule, ['route' => ['admin.schedule.update', $schedule], 'class'=>'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
          @include('Admin::partials.forms.schedule', $schedule)

          {{--<table class="table table-bordered table-striped program">--}}
            {{--<tbody>--}}
            {{--@for($i=0; $i<count($program); $i++)--}}
              {{--<tr class="tele-row">--}}
                {{--<th class="tele-time">--}}
                  {{--{!! Form::text('time[]', $program[$i]->time, ["class" => "form-control", "title" => ""]) !!}--}}
                {{--</th>--}}
                {{--<td class="tele-show">--}}
                  {{--<h4>{{ $program[$i]->name }}</h4>--}}
                  {{--{!! Form::text('name[]', $program[$i]->name, ["class" => "form-control", "title" => ""]) !!}--}}
                {{--</td>--}}
              {{--</tr>--}}
            {{--@endfor--}}
              {{--<tr>--}}
                {{--<th class="tele-time">--}}
                  {{--{!! Form::text('time[]', null, ["class" => "form-control", "title" => ""]) !!}--}}
                {{--</th>--}}
                {{--<td class="tele-show">--}}
                  {{--<h4>{{ $program[$i]->name }}</h4>--}}
                  {{--{!! Form::text('name[]', null, ["class" => "form-control", "title" => ""]) !!}--}}
                {{--</td>--}}
              {{--</tr>--}}
            {{--</tbody>--}}
          {{--</table>--}}

        {!! Form::hidden('date', $schedule->date) !!}
        {!! Form::close() !!}

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
