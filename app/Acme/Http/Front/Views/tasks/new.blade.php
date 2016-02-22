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
                        <div class="row" ng-app="validationApp" ng-controller="mainController">
                            <div class="container">
                                <div class="row">

                                    <form class="newTask" name="newTask" ng-submit="submitForm()" novalidate>

                                        <div class="form-group col-md-6">
                                            <label for="taskName" class="required">Категория</label>
                                            <select name="taskCategory" id="category" class="form-control selectpicker" title="-- Выберите категорию --">
                                                <option value="0" selected class="hidden">-- Выберите категорию --</option>
                                                <option value="1">test1</option>
                                                <option value="2">test2</option>
                                            </select>
                                            <div class="tooltip top" role="tooltip" id="tooltipCategory"><div class="tooltip-arrow" style="left: 50%;"></div><div class="tooltip-inner">Выберите категорию</div></div>
                                        </div>

                                        <div id="taskType" class="form-group col-md-6">
                                            <label for="taskName" class="required">Тип услуги</label>
                                            <select name="taskType" id="type" class="form-control selectpicker" title="-- Выберите тип --">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12" ng-class="{ 'has-error' : newTask.taskName.$invalid && !newTask.taskName.$pristine }">
                                            <label for="taskName" class="required">Мне нужно</label>
                                            <input id="taskName" name="taskName" type="text" class="form-control" placeholder="Коротко сформулируйте Вашу задачу" ng-model="task.taskName" required>
                                            <p ng-show="newTask.taskName.$invalid && !newTask.taskName.$pristine" class="help-block">You name is required.</p>
                                        </div>

                                        <div class="form-group col-md-12" ng-class="{ 'has-error' : newTask.taskDesc.$invalid && !newTask.taskDesc.$pristine }">
                                            <label for="taskDesc" class="required">Описание задачи</label>
                                            <textarea id="taskDesc" name="taskDesc" class="form-control" rows="4" placeholder="Опишите пожелания и детали, чтобы исполнители лучше оценили вашу задачу" ng-model="task.taskDesc"></textarea>
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
                                                    <label for="author" class="required">Имя</label>
                                                    <input name="author" id="author" type="text" class="form-control" placeholder="Имя"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="email" class="required">Эл.адрес</label>
                                                    <input name="email" id="email" type="text" class="form-control" placeholder="E-mail"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="phone" class="required">Ваш телефон</label>
                                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Телефон"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="attention col-md-12">
                                            <span></span>
                                            - поля, обязательные для заполнения
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-submit" ng-disabled="newTask.$invalid">Опубликовать</button>
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
    <script type="text/javascript" src="{{ asset('js/angular.min.js') }}"></script>

    <script>
        // create angular app
        var validationApp = angular.module('validationApp', []);

        // create angular controller
        validationApp.controller('mainController', function($scope, $filter) {

            // function to submit the form after all validation has occurred
            $scope.submitForm = function() {
                if ($scope.newTask.$valid) {
                    alert('our form is amazing');
                }
            };

            $scope.task = {category: ''};

            $scope.categories = [
                {
                    id: 1,
                    name: "Курьерские услуги",
                    types: [
                        { id: 101, name: 'Курьерские услуги 1' },
                        { id: 102, name: 'Курьерские услуги 2' },
                        { id: 103, name: 'Курьерские услуги 3' }
                    ]
                },
                {
                    id: 2,
                    name: "Бытовой ремонт",
                    types: [
                        { id: 201, name: 'Бытовой ремонт 1' },
                        { id: 202, name: 'Бытовой ремонт 2' },
                        { id: 203, name: 'Бытовой ремонт 3' }
                    ]
                },
                {
                    id: 3,
                    name: "Грузоперевозки",
                    types: [
                        { id: 301, name: 'Грузоперевозки 1' },
                        { id: 302, name: 'Грузоперевозки 2' },
                        { id: 303, name: 'Грузоперевозки 3' }
                    ]
                }
            ];

            $scope.getTypes = function(selectedCategory) {
                var filteredCategory = $filter('filter')($scope.categories, selectedCategory);
                return filteredCategory[0].types;
            };

            $scope.banks = [{
                "name": "Bank A",
                branches: [{
                    "name": "Branch 1",
                    "code": "1"
                }, {
                    "name": "Branch 2",
                    "code": "2"
                }]
            }, {
                "name": "Bank B",
                branches: [{
                    "name": "Branch 3",
                    "code": "3"
                }, {
                    "name": "Branch 4",
                    "code": "4"
                }, {
                    "name": "Branch 5",
                    "code": "5"
                }]
            }];

            $scope.getBranches = function(selectedBank) {
                var filteredBank = $filter('filter')($scope.banks, selectedBank);
                return filteredBank[0].branches;
            };

        });
    </script>

    <script>

        $(document).ready(function()
        {
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            $("#category").change(function()
            {
                var id=$(this).val();
                var dataString = 'id='+ id;
                var url = "new";

                $.ajax
                ({
                    type: "POST",
                    url: 'new',
                    data: dataString,
                    cache: false,
                    success: function(data)
                    {
                        $("#type").html(data);
                    }
                });

            });

            $("#taskType .btn").click(function () {
                $("#tooltipCategory").addClass("in");
                setTimeout(function() {
                    $('#tooltipCategory').removeClass('in');
                }, 3000);
            });

        });

    </script>
@stop