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
                                <th>Навыки</th>
                                <th>Действия</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @foreach($user->subcategories as $subcategory)
                                                <span class="spec">{{ $subcategory->getName() }}</span>
                                            @endforeach
                                        </td>

                                        <td class="td-actions">
                                            <ul>
                                                <li>
                                                    <a rel="tooltip" class="view btn btn-default" href="{{ route('admin.user.show', $user) }}" title="Посмотреть">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="edit btn btn-default" href="{{ route('admin.user.edit', $user) }}" title="Редактировать">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    {!! Form::open(['route' => ['admin.user.destroy', $user], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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

@stop

@section('scripts')
@endsection