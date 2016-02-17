@extends('Admin::layouts.default')
@section('title', $background->getName())

@section('content')

<div class="row modals">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ trans('site.Info') }}</h2>
        <div class="clearfix"></div>
    </div> 
    <div class="panel-body">
        <div class="col-md-5">
            {!! Form::open(['route' => ['admin.background.destroy', $background], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
            <a href="{{ route('admin.background.edit', $background) }}" class="btn btn-primary">edit</a>
            <button class="btn btn-danger" type="submit">delete</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</div>

<div>
    <h3>{{ $background->getName() }}</h3>
    
    @if($background->isImage())
    <img src="{{ asset($background->getFile()) }}" width="800" height="600">
    @else
    <object width="600" height="400" type="application/x-shockwave-flash" data="{{ asset($background->getFile()) }}"></object>
    @endif
</div>

@stop
