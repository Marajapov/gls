@extends('Front::layouts.default')
@section('title', 'GLS' )

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jasny-bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.css') }}"/>
@stop

@section('content')
    <div class="wrapper">

        <div class="main">


            <div class="section landing-section section-with-space section-gray-gradient section-form">

                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="container">
                                <div class="row">

                                    <form id="newTask" class="newTask" name="newTask">

                                        <div class="form-group col-md-6">
                                            <label for="taskName" class="required-label">Категория</label>
                                            <select name="taskCategory" id="category" class="form-control selectpicker required" title="-- Выберите категорию --" required>
                                                <option value="0" selected class="hidden">-- Выберите категорию --</option>
                                                <option value="1">test1</option>
                                                <option value="2">test2</option>
                                            </select>
                                            <div class="tooltip top" role="tooltip" id="tooltipCategory"><div class="tooltip-arrow" style="left: 50%;"></div><div class="tooltip-inner">Выберите категорию</div></div>
                                        </div>

                                        <div id="taskType" class="form-group col-md-6 no-ajax">
                                            <label for="taskName" class="required-label">Тип услуги</label>
                                            <select name="taskType" id="type" class="form-control selectpicker required" title="-- Выберите тип --" required>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="taskName" class="required-label">Мне нужно</label>
                                            <input id="taskName" name="taskName" type="text" class="form-control" placeholder="Коротко сформулируйте Вашу задачу" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="taskDesc" class="required-label">Описание задачи</label>
                                            <textarea id="taskDesc" name="taskDesc" class="form-control" rows="4" placeholder="Опишите пожелания и детали, чтобы исполнители лучше оценили вашу задачу" required></textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="taskFile">Добавить фото</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput">
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                    <span class="fileinput-filename"></span>
                                                </div>
                                                <span class="input-group-addon btn btn-default btn-file">
                                                    <span class="fileinput-new">Выберите файл</span>
                                                    <span class="fileinput-exists">Изменить</span>
                                                    <input id="taskFile" type="file" name="taskFile">
                                                </span>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Удалить</a>
                                            </div>
                                            <p class="help-block">Фото или видео помогает исполнителям лучше понять ваше задание и оценить объем работы</p>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="author" class="required-label">Имя</label>
                                                    <input name="author" id="author" type="text" class="form-control" placeholder="Имя" required/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="email" class="required-label">Эл.адрес</label>
                                                    <input name="email" id="email" type="text" class="form-control" placeholder="E-mail" required/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="phone" class="required-label">Ваш телефон</label>
                                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Телефон" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="attention col-md-12">
                                            <span></span>
                                            - поля, обязательные для заполнения
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-danger btn-fill btn-submit">Опубликовать</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script>

        $(document).ready(function()
        {

            $("#taskType.no-ajax .btn").click(function () {
                $("#tooltipCategory").addClass("in");
                setTimeout(function() {
                    $('#tooltipCategory').removeClass('in');
                }, 3000);
            });

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            $("#category").change(function()
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
                    }
                });

            });

            $("#newTask").validate({
                submitHandler: function(form) {
                    $(form).ajaxSubmit();
                }
            });

        });

    </script>
@stop