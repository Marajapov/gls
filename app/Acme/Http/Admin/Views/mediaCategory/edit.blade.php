@extends('Admin::layouts.default')
@section('title', $mediaCategory->getName())

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
        <h4>{{ trans('site.AdminMediaCategoryChange') }}</h4>
			</div>
			<div class="x_content">
				{!! Form::model($mediaCategory, ['route' => ['admin.mediaCategory.update', $mediaCategory], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
				@include('Admin::partials.forms.mediaCategory', $mediaCategory)
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop

