@extends('Admin::layouts.default')
@section('title', "Категория")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

@section('content')
    <!-- include bottom nav -->
    @include('Admin::partials.bottomnav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Категория
                            </h4>
                            <p class="category">{{ $category->getName() }}</p>
                            <h6>{{ $category->getPublished() }}</h6>
                        </div>
                        
                        <!-- start of sub categories -->
                        <div class="content table-responsive table-full-width">
                            <div class="col-md-12">
                                <p class="subtitle">Подкатегории</p>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a class="name" href="#">
                                            Нужен курьер
                                        </a>
                                    </td>
                                    <td>500</td>
                                    <td>активный</td>
                                    <td>22/02/2016</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a rel="tooltip" class="view" href="{{ route('admin.order.show') }}" title="Посмотреть">
                                                    <i class="pe-7s-next-2"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="edit" href="#" title="Редактировать">
                                                    <i class="pe-7s-pen"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="delete" href="#" title="Удалить">
                                                    <i class="pe-7s-close-circle"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                <button onclick="history.go(-1);" class="btn btn-default">Назад</button>
                        </div> <!-- end of content sub categories -->



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection