@extends('Admin::layouts.default')
@section('title', "Posts")

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

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
                        <a href="{{ route('admin.order.create') }}" class="btn btn-success btn-block">
                            Добавить заказ
                            <i class="pe-7s-note2"></i>
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
                            <h4 class="title">Новый заказ</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($order, ['route' => 'admin.order.store']) !!}
                                @include('Admin::partials.forms.order', [$order])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/transition.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/collapse.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/ru.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/bootstrap-datetimepicker.js') }}"></script>
    <script>
        function selectChange(source, target) {
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
            var j = 1;
            $('#addDoer').click(function () {
                i++;
                var target = '<div id="doer'+i+'" class="row"><div class="col-md-3"><div class="form-group"><label>Категория</label><select onchange="selectChange($(\'#category'+i+'\'), $(\'#subCategory'+i+'\'));" id="category'+i+'" name="category'+i+'" class="form-control selectpicker orderCategory" title="-- Выберите категорию --"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div></div><div class="col-md-3"><div class="form-group"><label>Подкатегория</label><select id="subCategory'+i+'" name="subCategory'+i+'" class="form-control selectpicker" title="-- Выберите подкатегорию --"></select></div></div><div class="col-md-3"><div class="form-group"><label>Количество</label><input  id="count'+i+'" name="count'+i+'" type="text" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label>Цена</label><input id="cost'+i+'" name="cost'+i+'" type="text" class="form-control"></div></div></div>';
                $('.doers .inner').append(target);
                $('.selectpicker').selectpicker('refresh');
            });


            $('#date').datetimepicker({
                icons: {
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right'
                },
                tooltips:{
                    selectMonth: 'Выберите месяц',
                    prevMonth: 'Предыдущий месяц',
                    nextMonth: 'Следующий месяц'
                },
                format: "DD-MM-YYYY"
            });

            $('#time').datetimepicker({
                format: 'H:mm',    // use this format if you want the 24hours timepicker
//                format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
                tooltips:{
                    pickHour: "Выберите часы",
                    incrementHour: 'Увеличить часы',
                    decrementHour: 'Уменшить часы',
                    pickMinute: "Выберите минуты",
                    incrementMinute: 'Увеличить минуты',
                    decrementMinute: 'Уменшить минуты'
                }
            });
        });
    </script>
@stop