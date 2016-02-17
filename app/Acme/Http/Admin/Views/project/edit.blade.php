@extends('Admin::layouts.default')
@section('title', $project->getName())

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

      <div class="x_title">
        <h4>{{ trans('site.AdminMediaCategoryChange') }}</h4>
      </div>

			<div class="x_content">
				{!! Form::model($project, ['route' => ['admin.project.update', $project], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
				@include('Admin::partials.forms.project', $project)
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@stop

