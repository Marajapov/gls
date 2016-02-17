@extends('Admin::layouts.default')
@section('title', "Программа передач")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
    <style>
        .program .channel-choose {
            margin: 0;
            padding: 15px 0;
            color: #333333;
            font-size: 20px;
            text-align: center;
            text-transform: uppercase;
        }
        .channels {
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .channels > div {
            height: 120px;
        }
        .channels > div a {
            position: relative;
            display: block;
            height: 100%;
            padding: 30px;
            text-align: center;
        }
        .channels > div img{
            width: auto;
            height: 60px;
        }
        .channels span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            line-height: 20px;
        }
    </style>
@endsection

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title clearfix">

                    <h4>Программа передач {{ $channel->display }}</h4>

                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-default pull-right">
                        {{ trans('site.Back') }}
                    </a>
                </div>
                <div class="x_content program">

                    <table id="example" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]' data-page-length='10'>

                        <thead>
                        <tr>
                            <th class="hidden">ID</th>
                            <th>Дата</th>
                            <th>День недели</th>
                            <th>Канал</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($schedules)
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td class="hidden">
                                        {{ $schedule->id }}
                                    </td>
                                    <td class="table-img text-center">
                                        {{ $schedule->date }}
                                    </td>
                                    <td class="table-title">
                                        {{ $schedule->getWeekRuFull() }}
                                    </td>
                                    <td>
                                        @if($schedule->channel_id) {{ $schedule->channel()->first()->display }} @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{ route('admin.schedule.show', $schedule) }}">
                                            {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-default" href="{{ route('admin.schedule.edit', $schedule) }}">
                                            {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        {!! Form::open(['route' => ['admin.schedule.destroy', $schedule], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                        <button type="submit" class="btn btn-default">
                                            {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>

                    {{--@if($schedules)--}}
                        {{--@foreach($schedules as $key=>$schedule)--}}
                            {{--<div class="@if($key%13==0) first @endif program-block">--}}
                                {{--<div class="program-date">--}}
                                    {{--<h4>{{ $schedule->getMonthFull() }}</h4>--}}
                                    {{--<h1>{{ $schedule->getDay() }}</h1>--}}
                                    {{--<h5>{{ $schedule->getWeekRuFull() }}</h5>--}}
                                    {{--<a href="#">@if($schedule->channel_id) {{ $schedule->channel()->first()->display }} @endif</a>--}}
                                {{--</div>--}}
                                {{--<ul class="actions">--}}
                                    {{--<li><a class="btn btn-default action-view" href="{{ route('admin.schedule.show', $schedule) }}"><i class="fa fa-eye"></i></a></li>--}}
                                    {{--<li><a class="btn btn-default action-edit" href="{{ route('admin.schedule.edit', $schedule) }}"><i class="fa fa-edit"></i></a></li>--}}
                                    {{--<li>--}}
                                        {{--{!! Form::open(['route' => ['admin.schedule.destroy', $schedule], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}--}}
                                        {{--<button type="submit" class="btn btn-default action-delete" href="#" style="margin: 0;padding: 5px 8px;font-size: 18px;">--}}
                                            {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                            {{--<i class="fa fa-trash"></i>--}}
                                        {{--</button>--}}
                                        {{--{!! Form::close() !!}--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}

                </div>
            </div>
        </div>
    </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('js/admin/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "info": "_START_ - _END_ : {{ trans('site.DataTableTotal') }} _TOTAL_ ",
                    "lengthMenu" : "_MENU_ ",
                    "search" : "{{ trans('site.DataTableSearch') }} ",
                    "zeroRecords" : "{{ trans('site.DataTableNoResult') }}",
                    "infoEmpty" : "0-0: {{ trans('site.DataTableTotal') }} 0",
                    "infoFiltered" : "",

                    "paginate": {
                        "first": "{{ trans('site.DataTableFirstPage') }}",
                        "last": "{{ trans('site.DataTableLastPage') }}",
                        "next": "{{ trans('site.DataTableNextPage') }}",
                        "previous": "{{ trans('site.DataTablePreviousPage') }}"
                    }
                },
                "columnDefs": [
                ]
            });
        } );
    </script>
@endsection

