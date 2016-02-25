@extends('Admin::layouts.default')
@section('title', "Posts")

@section('content')

    <!-- include bottom nav -->
    @include('Admin::partials.subcategoryNav')
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
                                <th>Категогия</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th>Действия</th>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory->getId() }}</td>
                                    <td>{{ $subcategory->getName() }}</td>

                                    <td>@if(($subcategory->category()->first()) != null) {{ $subcategory->category()->first()->getName()}} @endif</td>
                                    <td>{{ $subcategory->getPublished() }}</td>
                                    <td>{{ $subcategory->getDate() }}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a rel="tooltip" class="view" href="{{ route('admin.subcategory.show', $subcategory) }}" title="Посмотреть">
                                                    <i class="pe-7s-exapnd2"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="tooltip" class="edit" href="{{ route('admin.subcategory.edit', $subcategory) }}" title="Редактировать">
                                                    <i class="pe-7s-note"></i>
                                                </a>
                                            </li>
                                            <li>
                                                 {!! Form::open(['route' => ['admin.subcategory.destroy', $subcategory], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                                    <button rel="tooltip" type="submit" class="delete" title="Удалить">
                                                        <i class="pe-7s-close-circle"></i>
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