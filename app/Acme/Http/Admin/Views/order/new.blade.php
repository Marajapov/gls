@extends('Admin::layouts.default')
@section('title', "Заказы")

@section('content')

@include('Admin::order.nav')

<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">
                            Новые заказы
                        </h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Необходимо</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Изменить статус</th>
                                <th>Действия</th>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr class="@if($order->status == "new") success @elseif($order->status == "share") warning @elseif($order->status == "canceled") danger @else info @endif">
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.order.show', $order) }}">
                                                {{ $order->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="spec">{{ $order->subcategories()->first()->getName() }}</span>
                                        </td>
                                        <td>
                                            @if($order->getStatus() == "new") новый
                                            @elseif($order->getStatus() == "share") разослан
                                            @elseif($order->getStatus() == "complete") комплектован
                                            @elseif($order->getStatus() == "canceled") отменен
                                            @elseif($order->getStatus() == "closed") закрыт
                                            @endif
                                        </td>
                                        <td>{{ $order->getDate() }}</td>
                                        <td>
                                            <ul>

                                                <li>
                                                    <a rel="tooltip" class="" href="{{ route('admin.order.share', $order) }}" title="Разослать">
                                                        <i class="pe-7s-share"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="" href="{{ route('admin.order.cancel', $order) }}" title="Отменить">
                                                        <i class="pe-7s-close-circle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="" href="{{ route('admin.order.close', $order) }}" title="Закрыть">
                                                        <i class="pe-7s-close"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a rel="tooltip" class="view" href="{{ route('admin.order.show', $order) }}" title="Посмотреть">
                                                        <i class="pe-7s-next-2"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="edit" href="{{ route('admin.order.edit', $order) }}" title="Редактировать">
                                                        <i class="pe-7s-pen"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="delete" href="{{ route('admin.order.softDelete', $order) }}" title="Удалить">
                                                        <i class="pe-7s-trash"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection