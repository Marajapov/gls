@extends('Admin::layouts.default')
@section('title', trans('site.AdminUserAddNew'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@endsection

@section('content')
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-block">
                            Добавить пользователя
                            <i class="pe-7s-add-user"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Азамат
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Личный кабинет</a></li>

                            <li class="divider"></li>
                            <li><a href="#">Выйти</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

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
        $(document).ready(function () {
            var i = 1;
            $('#addDoer').click(function () {
                i++;
                var target = '<div id="doer'+i+'" class="row"><div class="col-md-3"><div class="form-group"><label>Категория</label><select id="category'+i+'" name="category'+i+'" class="form-control selectpicker" title="-- Выберите категорию --"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div></div><div class="col-md-3"><div class="form-group"><label>Подкатегория</label><select id="subCategory'+i+'" name="subCategory'+i+'" class="form-control selectpicker" title="-- Выберите категорию --"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div></div></div>';
                $('.doers .inner').append(target);
                $('.selectpicker').selectpicker('refresh');
            });

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            $("#doer1").change(function()
            {
                var id=$(this).val();
                var dataString = 'id='+ id;
                var url = "new";

                $("#taskType.no-ajax .btn").click(function () {
                    $("#tooltipCategory").removeClass("in");
                    setTimeout(function() {
                        $('#tooltipCategory').removeClass('in');
                    }, 2000);
                });

                $.ajax
                ({
                    type: "POST",
                    url: 'new',
                    data: dataString,
                    cache: false,
                    success: function(data)
                    {
                        $("#type").html(data).parent().addClass('no-ajax');
                        $('.selectpicker').selectpicker('refresh');
                    }
                });

            });
        });
    </script>

@stop
