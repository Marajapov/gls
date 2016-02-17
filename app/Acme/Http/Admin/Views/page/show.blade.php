@extends('Admin::layouts.default')
@section('title', $page->getName())

@section('content')
<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div>
			{!! Form::open(['route' => ['admin.page.destroy', $page], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
			<a href="{{ route('admin.page.edit', $page) }}" class="btn btn-labeled btn-success"><span class="btn-label"><i class="glyphicon glyphicon-cog"></i></span>{{ trans('site.Change') }}</a>
			<button class="btn btn-labeled btn-danger" type="submit"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>{{ trans('site.Delete') }}</button>
			
			{!! Form::close() !!}
		</div>


		<div>
			{{ $page->getName() }} <br>
			{!! $page->getContent() !!}
			<hr>
		</div>
	</div>
</div>
@stop

