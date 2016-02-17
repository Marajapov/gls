@extends('Admin::layouts.default')
@section('title', $menu->getName())

@section('content')

<div class="row modals">
<div>
	{!! Form::open(['route' => ['admin.channel.menu.destroy', $channel, $menu], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
	<a href="{{ route('admin.channel.menu.edit', [$channel, $menu]) }}" class="btn btn-labeled btn-success"><span class="btn-label"><i class="glyphicon glyphicon-cog"></i></span>{{ trans('site.Change') }}</a>
	<button class="btn btn-labeled btn-danger" type="submit"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>{{ trans('site.Delete') }}</button>
	
	{!! Form::close() !!}
</div>


<div>
	<h3>{{ $menu->getName() }}</h3>

	<hr>
	<p>{!! $menu->getParent() !!}</p>
</div>
</div>

@stop

