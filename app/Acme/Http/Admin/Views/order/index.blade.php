@extends('Admin::layouts.default')
@section('title', "Posts")

@section('content')


<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Последние заказы</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Нужен курьер</td>
                                    <td>Новый</td>
                                    <td>22/02/2016</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a class="view" href="{{ route('admin.order.show') }}" title="Посмотреть">
                                                    <i class="pe-7s-next-2"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="edit" href="#" title="Редактировать">
                                                    <i class="pe-7s-pen"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="delete" href="#" title="Удалить">
                                                    <i class="pe-7s-close-circle"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection