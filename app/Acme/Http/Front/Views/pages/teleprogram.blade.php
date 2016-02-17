@extends('Front::layouts.default')
@section('title', 'Телепрограмма | КТРК')
@section('styles')
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">--}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
@stop
@section('content')

  <div class="container main-wrapper">
    <div class="row">
      <div class="panel panel-default teleprogramm clearfix">
        <div class="panel-heading">
          <h3 class="panel-title">
            {{ trans('site.Teleprogram') }}
            @if($channel)
              <span class="divider"><i class="fa fa-circle"></i></span>
              <span class="ctg">
                {{ $channel->display }}
              </span>
            @endif
          </h3>
        </div>

        <div class="panel-body">

          <div class="">
            <h4 class="channel-choose">{{ trans('site.FrontTeleprogrammChoose') }}</h4>

            <div class="channels @if($channel)channel-selected @endif clearfix">
              @foreach($channels as $key=>$channel_one)
                <div class="col-md-2 @if($key==0) col-md-offset-3 @elseif($key == 3) col-md-offset-2 @endif @if($channel && ($channel_one->id == $channel->id))active @endif">
                  <a href="{{ route('front.pages.teleprogram', $channel_one->id) }}" class="{{ $channel_one->name }}">
                    <img src="{{ asset($channel_one->file) }}" alt=""/>
                    <span class="channel-name">{{ $channel_one->display }}</span>
                  </a>
                </div>
              @endforeach
            </div>
            <div>
              {{--@if($lc == 'kg')--}}
              {{--<select name="channel" id="cnahhel" class="selectpicker" date-live-search="true" title="-- {{ trans('site.FrontTeleprogrammChoose') }} --">--}}
              {{--@foreach($channels as $channel)--}}
              {{--<option value="{{ $channel->id }}">{{ $channel->display }}</option>--}}
              {{--@endforeach--}}
              {{--</select>--}}
              {{--@else--}}
              {{--{!! Form::select('category_id', ['КТРК', 'Музканал','Маданият','Баластан','Биринчи Радио','Кыргыз Радиосу','Миң Кыял ФМ','Достук'], null, ["class" => "selectpicker", "data-live-search"=>"true", "required" => true, "title" => "-- Выберите канал --"]) !!}--}}
              {{--@endif--}}

              <ul id="tabs" class="nav nav-tabs teletabs" data-tabs="tabs">

                @foreach($programs as $key => $program)
                  {{--{{ dd($program['date']) }}--}}
                  @foreach($schedules as $schedule)
                    @if($program['date'] == $schedule->date)
                      <li class="@if($currentDate == $program['date']) active @endif">
                        <a href="#{{ $program['date'] }}" data-toggle="tab">
                          @if($lc == 'kg')
                            {{ $schedule->getDay().' '.$schedule->getMonth().' - '.$schedule->getWeekKg() }}
                          @elseif($lc == 'ru')
                            {{ $schedule->getDay().' '.$schedule->getMonth().' - '.$schedule->getWeekRu() }}
                          @endif
                        </a>
                      </li>
                    @endif
                  @endforeach
                @endforeach

              </ul>

              @if($programs)

                <div id="my-tab-content" class="tab-content">

                  @foreach($programs as $key => $program)

                    {{--{{ dd(strtotime('24 hours')) }}--}}
                    {{--{{ dd(strtotime($currentTime)) }}--}}

                    @foreach($schedules as $schedule)

                      @if($program['date'] == $schedule->date)

                        <div class="tab-pane @if($schedule->date == $currentDate) active @endif" id="{{ $schedule->date }}">

                          <table class="table program">
                            <tbody>
                              @for($i=0; $i<count($program)-1; $i++)

                                @if((strtotime($schedule->date) < strtotime($currentDate)))
                                  <tr class="tele-row tele-passed">

                                @elseif(($schedule->date == $currentDate) && ($i < count($program)-2))

                                  @if((strtotime($program[$i]->time) <= strtotime($currentTime)) && (strtotime($currentTime) < strtotime($program[$i+1]->time)))
                                    <tr class="tele-row tele-live">

                                  @elseif( (strtotime($program[$i]->time) < strtotime($currentTime)) && ($program[$i]->time != '00:00') )
                                    @if( (strtotime($program[$i]->time) > strtotime('00:00')) && (strtotime($program[$i]->time) < strtotime('05:00')) )
                                      <tr class="tele-row">
                                    @else
                                      <tr class="tele-row tele-passed">
                                    @endif


                                  @endif

                                @elseif(($schedule->date == $currentDate) && ($i == count($program)- 1))

                                  @if((strtotime($program[$i]->time) <= strtotime($currentTime)))
                                    <tr class="tele-row tele-live">

                                  @elseif((strtotime($program[$i]->time) < strtotime($currentTime)) && ($program[$i]->time != '00:00'))
                                    <tr class="tele-row tele-passed">

                                  @endif

                                @else
                                  <tr class="tele-row ">
                                @endif
                                  <th class="tele-time">
                                    {{ $program[$i]->time }}
                                  </th>
                                  <td class="tele-show">

                                    @if(($schedule->date == $currentDate) && ($i < count($program)-2))

                                      @if((strtotime($program[$i]->time) <= strtotime($currentTime)) && (strtotime($currentTime) < strtotime($program[$i+1]->time)))

                                        @if($lc == 'kg')
                                          <span id="bcLive"><i class="fa fa-circle"></i>азыр эфирде</span>
                                        @elseif($lc == 'ru')
                                          <span id="bcLive"><i class="fa fa-circle"></i>сейчас в эфире</span>
                                        @endif

                                      @endif

                                    @elseif(($schedule->date == $currentDate) && ($i == count($program)-1))

                                      @if((strtotime($program[$i]->time) <= strtotime($currentTime)))

                                        @if($lc == 'kg')
                                          <span id="bcLive"><i class="fa fa-circle"></i>азыр эфирде</span>
                                        @elseif($lc == 'ru')
                                          <span id="bcLive"><i class="fa fa-circle"></i>сейчас в эфире</span>
                                        @endif

                                      @endif

                                    @endif

                                    <h4>{{ $program[$i]->name }}</h4>
                                    {{--<h5 class="tele-extra"><i class="fa fa-play-circle-o"></i>Сериал</h5>--}}
                                  </td>
                                </tr>
                              @endfor

                            </tbody>
                          </table>

                        </div>

                      @endif

                    @endforeach

                  @endforeach

                </div>

              @endif

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

@stop

@section('footerScript')

  <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>

  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('#tabs').tab();

      blink($('#bcLive'), -1, 500);

      function blink(elem, times, speed) {
        if (times > 0 || times < 0) {
          if ($(elem).hasClass("blink"))
            $(elem).removeClass("blink");
          else
            $(elem).addClass("blink");
        }
        clearTimeout(function () {
          blink(elem, times, speed);
        });
        if (times > 0 || times < 0) {
          setTimeout(function () {
            blink(elem, times, speed);
          }, speed);
          times -= .5;
        }
      }
    });
  </script>

@endsection