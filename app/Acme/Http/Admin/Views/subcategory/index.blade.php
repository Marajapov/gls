@extends('Admin::layouts.default')
@section('title', "Posts")

@section('content')

    <!-- include bottom nav -->
    @include('Admin::subcategory.nav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Все подкатегории
                            </h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Цена</th>
                                <th>Пользователи</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->getId() }}</td>
                                        <td>
                                            <a href="{{ route('admin.subcategory.show',$subcategory) }}">
                                                {{ $subcategory->getName() }}
                                            </a>
                                        </td>

                                        <td>@if(($subcategory->category()->first()) != null) {{ $subcategory->category()->first()->getName()}} @endif</td>
                                        <td>
                                            {{ $subcategory->price }}
                                        </td>
                                        <td>
                                            @foreach($subcategory->users as $user)
                                                <span class="spec">{{ $user->getName() }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $subcategory->getPublished() }}</td>
                                        <td>{{ $subcategory->getDate() }}</td>
                                        <td class="td-actions">
                                            <ul>
                                                <li>
                                                    <a rel="tooltip" class="view btn btn-default" href="{{ route('admin.subcategory.show', $subcategory) }}" title="Посмотреть">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="tooltip" class="edit btn btn-default" href="{{ route('admin.subcategory.edit', $subcategory) }}" title="Редактировать">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    {!! Form::open(['route' => ['admin.subcategory.destroy', $subcategory], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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