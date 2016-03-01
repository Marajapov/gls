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
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Подкатегории</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <a href="{{ route('admin.order.show', $order) }}">
                                                {{ $order->name }}
                                            </a>
                                        </td>
                                        <td>
                                            @foreach($order->subcategories as $subcategory)
                                                <span class="spec">{{ $subcategory->getName() }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $order->getStatus() }}
                                        </td>
                                        <td>{{ $order->getDate() }}</td>
                                        <td>
                                            <ul>

                                                <li>
                                                    <a rel="tooltip" class="share" href="{{ route('admin.order.destroy') }}" title="Разослать">
                                                        <i class="pe-7s-share"></i>
                                                    </a>
                                                </li>
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
                                                    <a rel="tooltip" class="delete" href="{{ route('admin.order.destroy') }}" title="Удалить">
                                                        <i class="pe-7s-close-circle"></i>
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