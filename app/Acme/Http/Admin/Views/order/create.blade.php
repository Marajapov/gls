@extends('Admin::layouts.default')
@section('title', "Заказы")

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('content')

    @include('Admin::order.nav')

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
                                @include('Admin::order.form', [$order])
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
        function categoryChange(source, subcategory, price) {
            var id = source.val();
            var dataString = 'id=' + id;
            var url = "http://gls.dev/admin/categoryChange";

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
                    subcategory.html(data[0].subcategories);
                    price.val(data[0].price);
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        }

        function subcategoryChange(source, price) {
            var id = source.val();
            var dataString = 'id=' + id;
            var url = "http://gls.dev/admin/subcategoryChange";

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
                    price.val(data);
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
                var url = "http://gls.dev/admin/newSelect";
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