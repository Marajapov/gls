@extends('Admin::layouts.default')
@section('title', $schedule->date)

@section('content')
  <div class="row modals program-show">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title clearfix">

          <h4>Программа передач {{ $schedule->getDay().'-'.mb_strtolower($schedule->getMonthFull()) }}</h4>

          <a href="{{ route('admin.schedule.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

          {!! Form::open(['route' => ['admin.schedule.destroy', $schedule], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
          <button type="submit" class="btn btn-danger" href="#">
            <i class="fa fa-times"></i>
            {{ trans('site.Delete') }}
          </button>
          {!! Form::close() !!}

          <a href="{{ route('admin.schedule.edit', $schedule) }}" class="btn btn-success pull-right">
            <i class="fa fa-edit"></i>
            {{ trans('site.Change') }}
          </a>

        </div>

        <div class="x_content program">


          <table class="table table-bordered table-striped program">
            <tbody>
            @for($i=0; $i<count($program); $i++)
              <tr class="tele-row">
                <th class="tele-time">{{ $program[$i]->time }}</th>
                <td class="tele-show">
                  <h4>{{ $program[$i]->name }}</h4>
                  {{--<h5 class="tele-extra"><i class="fa fa-play-circle-o"></i>Сериал</h5>--}}
                </td>
              </tr>
            @endfor
            </tbody>
          </table>

          <a href="{{ route('admin.schedule.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>

        </div>
      </div>
    </div>
  </div>

  </div>

@stop
