@extends('Admin::layouts.default')
@section('title', "Заказ")

@section('content')

    @include('Admin::order.nav')

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="header">
                            <h4 class="title">
                                {{ $order->getName() }}
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
                                                        {{ $order->getName() }}
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>
                                                        Ф.И.О Клиента
                                                    </td>
                                                    <td>
                                                        {{ $order->getClient() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Номер Телефона
                                                    </td>
                                                    <td>
                                                        {{ $order->getPhone() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Адрес
                                                    </td>
                                                    <td>
                                                        {{ $order->getAdres() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Описания
                                                    </td>
                                                    <td>
                                                        {{ $order->getDescription() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Статус
                                                    </td>
                                                    <td>
                                                        {{ $order->getStatus() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Подкатегории
                                                    </td>
                                                    <td>
                                                        @foreach($order->subcategories()->get() as $subcategory)
                                                            {{ $subcategory->getName() }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="actions">
                                        <a href="{{ route('admin.order.edit', $order)}}" class="btn btn-primary">
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