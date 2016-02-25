@extends('Admin::layouts.default')
@section('title', 'Все пользователи' )

@section('styles')
@endsection

@section('content')

    <!-- include bottom nav -->
    @include('Admin::partials.usernav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Все пользователи
                            </h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Специальности</th>
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
                                                <a rel="tooltip" class="view" href="{{ route('admin.user.show') }}" title="Посмотреть">
                                                    <i class="pe-7s-next-2"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="edit" href="{{ route('admin.user.edit') }}" title="Редактировать">
                                                    <i class="pe-7s-pen"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="delete" href="{{ route('admin.user.destroy') }}" title="Удалить">
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

@stop

@section('scripts')
@endsection