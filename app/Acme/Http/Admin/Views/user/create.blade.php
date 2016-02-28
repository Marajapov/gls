@extends('Admin::layouts.default')
@section('title', 'Добавить пользователя')

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@endsection

@section('content')

    <!-- include bottom nav -->
    @include('Admin::partials.usernav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Новый пользователь</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($user, ['route' => 'admin.user.store']) !!}
                            @include('Admin::partials.forms.user', [$user])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')

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
