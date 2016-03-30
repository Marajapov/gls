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
                            Последние заказы
                        </h4>
                    </div>
                    <div class="content">
                        <table class="table">
                            <thead>
                                <th class="hidden-xs hidden-sm">ID</th>
                                <th>Название</th>
                                <th>Подкатегория</th>
                                <th>Действия</th>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr class="@if($order->status == "new") success @elseif($order->status == "share") warning @elseif($order->status == "canceled") danger @else info @endif">
                                        <td class="hidden-xs hidden-sm">{{ $order->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.order.show', $order) }}">
                                                {{ $order->name }}
                                            </a>
                                            <span class="status">
                                                @if($order->getStatus() == "new") новый
                                                @elseif($order->getStatus() == "site") заявка с сайта
                                                @elseif($order->getStatus() == "share") разослан
                                                @elseif($order->getStatus() == "complete") комплектован
                                                @elseif($order->getStatus() == "canceled") отменен
                                                @elseif($order->getStatus() == "closed") закрыт
                                                @endif
                                            </span>
                                            <span class="date">
                                                {{ $order->getDate().', '.$order->getTime() }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="spec">{{ $order->subcategories()->first()->getName() }}</span>
                                        </td>
                                        <td class="td-actions">
                                            <ul>
                                                <li>
                                                    <a rel="tooltip" class="view btn btn-default" href="{{ route('admin.order.show', $order) }}" title="Посмотреть">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="edit btn btn-default" href="{{ route('admin.order.edit', $order) }}" title="Редактировать">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="return confirm('Вы уверены ?')" rel="tooltip" class="delete btn btn-default" href="{{ route('admin.order.softDelete', $order) }}" title="Удалить">
                                                        <i class="fa fa-trash-o"></i>
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