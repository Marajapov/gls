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
                                                    <td class="heading">
                                                        Адрес
                                                    </td>
                                                    <td>
                                                        {{ $order->getAdres() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="heading">
                                                        Описание
                                                    </td>
                                                    <td colspan="3">
                                                        {{ $order->getDescription() }}
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, autem distinctio dolorem excepturi minus molestiae optio quia sapiente ullam voluptate.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="heading">
                                                        Необходимо
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

                                    <div class="table-responsive">
                                        <div class="col-md-12">
                                            <p class="subtitle">Разосланные</p>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <th>Имя</th>
                                                <th>Телефон</th>
                                                <th>Навыки</th>
                                                <th>Статус</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">Имя</a>
                                                </td>
                                                <td>
                                                    Телефон
                                                </td>
                                                <td>
                                                    Навыки
                                                </td>
                                                <td>
                                                    статус
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive">
                                        <div class="col-md-12">
                                            <p class="subtitle">Принятые</p>
                                        </div>
                                        <table class="table">
                                            <thead>
                                            <th>Имя</th>
                                            <th>Телефон</th>
                                            <th>Навыки</th>
                                            <th>Статус</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">Имя</a>
                                                </td>
                                                <td>
                                                    Телефон
                                                </td>
                                                <td>
                                                    Навыки
                                                </td>
                                                <td>
                                                    статус
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