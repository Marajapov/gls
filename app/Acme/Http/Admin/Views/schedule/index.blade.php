@extends('Admin::layouts.default')
@section('title', "Программа передач")

@section('styles')
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

                    <h4>Программа передач</h4>
                    <a href="{{ route('admin.schedule.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i>
                        Новая программа передач
                    </a>
                </div>
                <div class="x_content program">

                    <h4 class="channel-choose">{{ trans('site.FrontTeleprogrammChoose') }}</h4>

                    <div class="channels clearfix">
                        @foreach($channels as $key=>$channel_one)
                            <div class="col-md-2 @if($key==0 || $key == 4) col-md-offset-2 @endif">
                                <a href="{{ route('admin.schedule.channel', $channel_one->id) }}">
                                    <img src="{{ asset($channel_one->file) }}" alt=""/>
                                    <span class="channel-name">{{ $channel_one->display }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@stop

