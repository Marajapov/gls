@extends('Front::layouts.default') @section('title', 'GLS' )
@section('styles')

    <meta name="_token" content="{!! csrf_token() !!}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jasny-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}" />
@stop

@section('content')
    <div class="wrapper">

        <div class="main">

            <div class="section-form">

                <h2 class="text-center">Добавить задание</h2>

                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="row">

                                {!! Form::model($order, ['route' => 'front.order.store', 'enctype' => 'multipart/form-data', 'class'=>'newTask clearfix', 'id'=>'newTask']) !!}

                                <div class="form-group col-md-6">
                                    <label for="taskName" class="required-label">Категория</label>
                                    <select name="taskCategory" id="category" class="form-control selectpicker required" title="-- Выберите категорию --" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($category->id == $selectedCategory->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="tooltip top" role="tooltip" id="tooltipCategory">
                                        <div class="tooltip-arrow" style="left: 50%;"></div>
                                        <div class="tooltip-inner">Выберите категорию</div>
                                    </div>
                                </div>
                                <div id="taskType" class="form-group col-md-6 no-ajax">
                                    <label for="taskName" class="required-label">Подкатегория</label>
                                    <select name="taskType" id="type" class="form-control selectpicker required" title="-- Выберите тип --" required>
                                        @foreach($selectedCategory->subcategories()->get() as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="description" class="required-label">Описание задачи</label>
                                    {!! Form::textarea('description', null, ["class" => "form-control", "id"=>"description", "rows"=>4, "required" => true, "placeholder" => "Опишите пожелания и детали, чтобы исполнители лучше оценили вашу задачу"]) !!}
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="author" class="required-label">Имя</label>
                                            {!! Form::text('client_name', null, ["class" => "form-control", "required" => true, "id"=>"author", "placeholder" => "Укажите имя"]) !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone" class="required-label">Телефон</label>
                                            {!! Form::text('client_phone', null, ["class" => "form-control", "id"=>"phone", "required" => true, "placeholder" => "Контактный телефон"]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="attention col-md-12">
                                    <span></span> - поля, обязательные для заполнения
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger btn-fill btn-submit">Опубликовать</button>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@stop

@section('scripts')
    <!--  Plugins -->
    <script src="{{ asset('js/ct-paper-checkbox.js') }}"></script>
    <script src="{{ asset('js/ct-paper-radio.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        @if (session('status') == 'success')
        swal("Спасибо!", "Ваш заказ принят!", "success");
        @elseif(session('status') == 'error')
        swal("", "Где то произошла ошибка!", "error");
        @endif
    </script>

    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });

            $("#category").change(function () {
                var id = $(this).val();
                var dataString = 'id=' + id;
                var url = "{{ route('order.categoryChange') }}";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $("#type").html(data).parent().addClass('no-ajax');
                        $('.selectpicker').selectpicker('refresh');
                    }
                });

            });

            $("#newTask").validate({
                submitHandler: function (form) {
                    $(form).ajaxSubmit();
                }
            });

        });
    </script>
@stop