@extends('Admin::layouts.default')
@section('title', $category->getTitle())

@section('content')
<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
      <div class="x_title">
        <h4>{{ trans('site.AdminCategoryChanged') }}</h4>
      </div>
			<div class="x_content">
				{!! Form::model($category, ['route' => ['admin.category.update', $category], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
				@include('Admin::partials.forms.category', $category)
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
@endsection


