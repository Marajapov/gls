@extends('Admin::layouts.default')
@section('title', "Заказ")

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jasny-bootstrap.css') }}" />
@stop

@section('content')
    <!-- include subcategory nav -->
    @include('Admin::order.nav')
    <!-- end subcategory nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Редактировать</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($order, ['route' => ['admin.order.update', $order], 'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
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
    <script>
        function categoryChange(source, subcategory, price) {
            var id = source.val();
            var dataString = 'id=' + id;
            var url = "{{ route('admin.categoryChange') }}";

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
            var url = "{{ route('admin.subcategoryChange') }}";

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
                var url = "{{ route('admin.newSelect') }}";
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

//            $('#date').datetimepicker({
//                icons: {
//                    previous: 'fa fa-chevron-left',
//                    next: 'fa fa-chevron-right'
//                },
//                tooltips:{
//                    selectMonth: 'Выберите месяц',
//                    prevMonth: 'Предыдущий месяц',
//                    nextMonth: 'Следующий месяц'
//                },
//                format: "DD-MM-YYYY"
//            });
//
//            $('#time').datetimepicker({
//                format: 'H:mm',
//                tooltips:{
//                    pickHour: "Выберите часы",
//                    incrementHour: 'Увеличить часы',
//                    decrementHour: 'Уменшить часы',
//                    pickMinute: "Выберите минуты",
//                    incrementMinute: 'Увеличить минуты',
//                    decrementMinute: 'Уменшить минуты'
//                }
//            });
        });
    </script>
@stop
