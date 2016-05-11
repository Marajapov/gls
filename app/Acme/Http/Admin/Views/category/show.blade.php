@extends('Admin::layouts.default')
@section('title', "Категория")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

@section('content')
    <!-- include bottom nav -->
    @include('Admin::category.nav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                {{ $category->getName() }}
                            </h4>
                            <p class="category">{{ $category->getName() }}</p>
                        </div>
                        
                        <!-- start of sub categories -->
                        <div class="content table-responsive table-full-width clearfix">
                            <div class="col-md-12">
                                <p class="subtitle">Подкатегории</p>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <a class="name" href="#">
                                                    {{ $subcategory->getName() }}
                                                </a>
                                            </td>
                                            <td>{{ $subcategory->getPrice() }}</td>
                                            <td>{{ $subcategory->getPublished() }}</td>
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
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="col-md-12">
                                <button onclick="history.go(-1);" class="btn btn-default">Назад</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection