@extends('Admin::layouts.default')
@section('title', "Категории")

@section('content')

   <!-- include bottom nav -->
    @include('Admin::category.nav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Все категории
                            </h4>
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
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->getId() }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.show', $category) }}">{{ $category->getName() }}</a>
                                    </td>
                                    <td>{{ $category->getPublished() }}</td>
                                    <td>{{ $category->getDate() }}</td>

                                    <td class="td-actions">
                                        <ul>
                                            <li>
                                                <a rel="tooltip" class="view btn btn-default" href="{{ route('admin.category.show', $category) }}" title="Посмотреть">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="edit btn btn-default" href="{{ route('admin.category.edit', $category) }}" title="Редактировать">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </li>
                                            <li>
                                                {!! Form::open(['route' => ['admin.category.destroy', $category], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                                <button rel="tooltip" type="submit" class="delete btn btn-default" title="Удалить">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                {!! Form::close() !!}
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