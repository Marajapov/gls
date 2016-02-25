@extends('Admin::layouts.default')
@section('title', trans('Пользователи') )

@section('styles')
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
                            <h4 class="title">
                                Последние заказы
                            </h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Нужен курьер</td>
                                    <td>Новый</td>
                                    <td>22/02/2016</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a rel="tooltip" class="view" href="{{ route('admin.user.show') }}" title="Посмотреть">
                                                    <i class="pe-7s-next-2"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="edit" href="{{ route('admin.user.edit') }}" title="Редактировать">
                                                    <i class="pe-7s-pen"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="delete" href="{{ route('admin.user.destroy') }}" title="Удалить">
                                                    <i class="pe-7s-close-circle"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
@endsection