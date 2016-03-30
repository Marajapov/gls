@extends('Admin::layouts.default')
@section('title', "Подкатегория")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

@section('content')
    <!-- include bottom nav -->
    @include('Admin::subcategory.nav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="header">
                            <h4 class="title">
                                {{ $subcategory->getName() }}
                            </h4>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Название
                                                </td>
                                                <td>
                                                    {{ $subcategory->getName() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Категория
                                                </td>
                                                <td>
                                                    @if(($subcategory->category()->first()) != null) {{ $subcategory->category()->first()->getName()}} @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Цена
                                                </td>
                                                <td>
                                                    {{ $subcategory->getPrice() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Статус
                                                </td>
                                                <td>
                                                    {{ $subcategory->getPublished() }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="btn-group actions">
                                        <a href="#" class="btn btn-primary">
                                            Редактировать
                                        </a>
                                        <a href="#" class="btn btn-danger">
                                            Удалить
                                        </a>
                                        <a href="#" onclick="history.go(-1);" class="btn btn-default">Назад</a>
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