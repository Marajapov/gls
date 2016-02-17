@extends('Admin::layouts.default')
@section('title', trans('site.AdminQuoteEdit') )

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Цитата</h2>
				<div class="clearfix"></div>
			</div>
            <div class="x_content">

                {!! Form::model($quote, ['route' => ['admin.quote.update', $quote], 'method' => 'PUT','enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
                @include('Admin::partials.forms.quote')
                {!! Form::close() !!}

            </div>
		</div>
	</div>
</div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
@stop


