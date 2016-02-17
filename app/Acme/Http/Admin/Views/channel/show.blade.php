@extends('Admin::layouts.default')
@section('title', $channel->getName())

@section('content')
<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title clearfix">
				<h4>{{ trans('site.Info') }}</h4>

	            <a href="{{ route('admin.channel.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

	            {!! Form::open(['route' => ['admin.channel.destroy', $channel], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
	            <button type="submit" class="btn btn-danger" href="#">
	              <i class="fa fa-times"></i>
	              {{ trans('site.Delete') }}
	            </button>
	            {!! Form::close() !!}

	            <a href="{{ route('admin.channel.edit', $channel) }}" class="btn btn-success pull-right">
	              <i class="fa fa-edit"></i>
	              {{ trans('site.Change') }}
	            </a>
			</div>

			<div class="x_content post-info clearfix">
				<ul class="list-group">
					<li class="list-group-item">
						<p class="header">Фото</p>
						<p class="body">
							@if($channel->isImage())
							<img src="{{ asset($channel->getFile()) }}" width="200" height="120">
							@else
							<object width="200" height="120" type="application/x-shockwave-flash" data="{{ asset($channel->getFile()) }}"></object>
							@endif
						</p>
					</li>

					<li class="list-group-item">
			            <p class="header">{{ trans('site.Title') }}</p>
			            <p class="body">{{ $channel->name }}</p>
          			</li>

          			<li class="list-group-item">
			            <p class="header">Дисплей</p>
			            <p class="body">{{ $channel->display }}</p>
          			</li>

          			<li class="list-group-item">
			            <p class="header">{{ trans('site.AdminChannelAllUser') }} - {{ $channel->getDisplay() }} ({{ $channel->getName()}})</p>
			            <p class="body">
			            	@foreach($channel->users as $user)
							<a href="{{ route('admin.user.show', $user) }}" class="list-group-item">{{ $user->getName() }}</a>
							@endforeach
			            </p>
          			</li>
				</ul>
			</div>
		</div>
	</div>
</div>

@stop
