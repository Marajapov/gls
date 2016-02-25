@extends('Admin::layouts.default')
@section('title', "Posts")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
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
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-block">
                            Добавить подкатегорию
                            <i class="pe-7s-network"></i>
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
                    <div class="card card-info">
                        <div class="header">
                            <h4 class="title">
                                Подкатегория
                            </h4>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Название
                                                    </td>
                                                    <td>
                                                        Подкатегория 1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Категория
                                                    </td>
                                                    <td>
                                                        Категория 1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Цена
                                                    </td>
                                                    <td>
                                                        500
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Статус
                                                    </td>
                                                    <td>
                                                        активный
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="btn-group actions">
                                        <a href="#" class="btn btn-primary">
                                            Редактировать
                                        </a>
                                        <a href="#" class="btn btn-danger">
                                            Удалить
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection