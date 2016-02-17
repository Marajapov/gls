@extends('Admin::layouts.default')
@section('title', "Pages")

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href="{{ route('admin.page.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Жаңы барак</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<h2>Барактар</h2>

				<div class="clearfix"></div>
				<div class="list-group">
					@foreach($pages as $page)
					<div class="@if(!$page->isPublished()) alert alert-danger @endif">
						<h3><a href="{{ route('admin.page.show', $page) }}">{{ $page->getName() }}</a></h3>

					</div>
					<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@stop

