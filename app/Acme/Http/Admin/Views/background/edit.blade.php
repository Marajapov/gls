@extends('Admin::layouts.default')
@section('title', $background->getName())

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ trans('site.AdminBackgroundChangedImg') }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				{!! Form::model($background, ['route' => ['admin.background.update', $background], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
				@include('Admin::partials.forms.background', $background)
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop


