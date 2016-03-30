@extends('Admin::layouts.default')
@section('title', $user->getName())

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
@endsection

	<!-- include bottom nav -->
    @include('Admin::partials.usernav')
    <!-- end bottom nav -->

@section('content')
<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h4>Изменение</h4>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				{!! Form::model($user, ['route' => ['admin.user.update', $user], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
				@include('Admin::partials.forms.user', $user)
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>

   <script>

        function categoryChange(source, target) {
            var id = source.val();
            var dataString = 'id=' + id;
            var url = "";

            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });

            $.ajax
            ({
                type: "POST",
                url: url,
                data: dataString,
                cache: false,
                success: function (data) {
                    target.html(data);
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        }

        $(document).ready(function () {

            var i = 1;
            $('#addDoer').click(function () {
                i++;
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
                var url = "create/newSelect";
                var dataString = 'i='+i;

                $.ajax
                ({
                    type: "POST",
                    url: url,
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $('.doers .inner').append(data);
                        $('.selectpicker').selectpicker('refresh');
                    }
                });
            });
        });
    </script>
@stop