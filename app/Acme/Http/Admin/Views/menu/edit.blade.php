@extends('Admin::layouts.default')
@section('title', $menu->getName())

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ trans('site.AdminMenuChange') }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				{!! Form::model($menu, ['route' => ['admin.menu.update', $menu], 'method' => 'PUT']) !!}
				@include('Admin::partials.forms.menu', $menu)
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop

