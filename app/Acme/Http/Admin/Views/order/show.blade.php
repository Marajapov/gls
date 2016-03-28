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
                            <p class="category">
                                @if($order->getStatus() == "new") новый
                                @elseif($order->getStatus() == "share") разослан
                                @elseif($order->getStatus() == "complete") комплектован
                                @elseif($order->getStatus() == "canceled") отменен
                                @elseif($order->getStatus() == "closed") закрыт
                                @endif
                            </p>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="heading">
                                                        Название
                                                    </td>
                                                    <td>
                                                        {{ $order->getName() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="heading">
                                                        Ф.И.О Клиента
                                                    </td>
                                                    <td>
                                                        {{ $order->getClient() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="heading">
                                                        Номер Телефона
                                                    </td>
                                                    <td>
                                                        {{ $order->getPhone() }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                     <td class="heading">
                                                        Адрес
                                                    </td>
                                                    <td>
                                                        {{ $order->getAdres() }}
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="heading">
                                                        Необходимо
                                                    </td>
                                                    <td>
                                                        <span class="spec">{{ $order->subcategories()->first()->getName() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Количество
                                                    </td>
                                                    <td>
                                                        <span class="spec">{{ $order->getCount() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Цена
                                                    </td>
                                                    <td>
                                                        <span class="spec">{{ $order->getPrice() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Описание
                                                    </td>
                                                    <td colspan="3">
                                                        {{ $order->getDescription() }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Фото
                                                    </td>
                                                    <td colspan="3">
                                                        <img src="{{ asset($order->getFile()) }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="actions">
                                        <a href="{{ route('admin.order.edit', $order)}}" class="btn btn-primary">
                                            Редактировать
                                        </a>
                                        <a href="{{ route('admin.order.softDelete', $order)}}" class="btn btn-danger">
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