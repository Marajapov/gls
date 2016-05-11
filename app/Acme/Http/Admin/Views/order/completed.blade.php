@extends('Admin::layouts.default')
@section('title', "Укомплектованные заказы")

@section('content')

    @include('Admin::order.nav')

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Укомплектованные заказы
                            </h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs hidden-sm">ID</th>
                                        <th>Название</th>
                                        <th>Подкатегория</th>
                                        <th>Действия</th>
                                    </tr>
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
                                        <td class="hidden-xs hidden-sm">
                                            <span class="spec">
                                                @if($order->subcategories()->first() != null)
                                                    {{ $order->subcategories()->first()->getName() }}
                                                @endif
                                            </span>
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
                                                    <a rel="tooltip" class="delete btn btn-default" href="{{ route('admin.order.softDelete', $order) }}" title="Удалить">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <nav>
                                <ul class="pagination">

                                    <li>
                                        <a href="{{ route('admin.order.completed', ['orders' => $orders, 'page' => 1]) }}" class="btn btn-default @if($orders->currentPage() == 1) disabled @endif">Начало</a>
                                    </li>
                                    <li>
                                        <a href="{{ $orders->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                    </li>

                                    @for($i = 0, $j = 1; $i < $orders->total(); $i+=$perPage)
                                        <li class="@if(($j > $orders->currentPage()+3) || ($j < $orders->currentPage()-3)) hidden @endif">
                                            <a href="{{ route('admin.order.completed', ['orders' => $orders, 'page' => $j]) }}" class="btn btn-default @if($orders->currentPage() == $j) active @endif">
                                                {{ $j++ }}
                                            </a>
                                        </li>
                                    @endfor

                                    <li>
                                        <a href="{{ $orders->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.order.completed', ['orders' => $orders, 'page' => ceil($orders->total()/$perPage)]) }}" class="btn btn-default @if($orders->currentPage() == ceil($orders->total()/$perPage)) disabled @endif">Конец</a>
                                    </li>

                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection