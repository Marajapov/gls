@extends('Admin::layouts.default')
@section('title', "Menus")

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<a href="{{ route('admin.menu.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>{{ trans('site.AdminMenuNew') }}</a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<h2>Меню</h2>

				<div class="clearfix"></div>
				<div class="list-group">
					@foreach($menus as $menu)
					<div>
						<a href="{{ route('admin.menu.code', $menu->getCode()) }}">{{ $menu->getCode() }}</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop
