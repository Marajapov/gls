@extends('Admin::layouts.default')
@section('title', "Подкатегори")

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
                        <div class="content">
                            <table class="table table-striped">
                                <thead>
                                <th class="hidden-xs hidden-sm">ID</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th class="hidden-xs hidden-sm">Цена</th>
                                <th class="hidden-xs hidden-sm">Пользователи</th>
                                <th class="hidden-xs hidden-sm">Статус</th>
                                <th class="hidden-xs hidden-sm">Дата</th>
                                <th>Действия</th>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td class="hidden-xs hidden-sm">{{ $subcategory->getId() }}</td>
                                        <td>
                                            <a href="{{ route('admin.subcategory.show',$subcategory) }}">
                                                {{ $subcategory->getName() }}
                                            </a>
                                        </td>

                                        <td>@if(($subcategory->category()->first()) != null) {{ $subcategory->category()->first()->getName()}} @endif</td>
                                        <td class="hidden-xs hidden-sm">
                                            {{ $subcategory->price }}
                                        </td>
                                        <td class="hidden-xs hidden-sm">
                                            
                                            @foreach($subcategory->users as $user)
                                                @if($user->role != 'softDelete')
                                                <span class="spec">{{ $user->getName() }}</span>
                                                @endif
                                            @endforeach
                                            
                                        </td>
                                        <td class="hidden-xs hidden-sm">{{ $subcategory->getPublished() }}</td>
                                        <td class="hidden-xs hidden-sm">{{ $subcategory->getDate() }}</td>
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

                            <nav>
                            <ul class="pagination">

                                <li>
                                    <a href="{{ route('admin.subcategory.index', ['subcategories' => $subcategories, 'page' => 1]) }}" class="btn btn-default @if($subcategories->currentPage() == 1) disabled @endif">Начало</a>
                                </li>
                                <li>
                                    <a href="{{ $subcategories->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                </li>

                                @for($i = 0, $j = 1; $i < $subcategories->total(); $i+=$perPage)
                                    <li class="@if(($j > $subcategories->currentPage()+3) || ($j < $subcategories->currentPage()-3)) hidden @endif">
                                        <a href="{{ route('admin.subcategory.index', ['subcategories' => $subcategories, 'page' => $j]) }}" class="btn btn-default @if($subcategories->currentPage() == $j) active @endif">
                                            {{ $j++ }}
                                        </a>
                                    </li>
                                @endfor

                                <li>
                                    <a href="{{ $subcategories->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.subcategory.index', ['subcategories' => $subcategories, 'page' => ceil($subcategories->total()/$perPage)]) }}" class="btn btn-default @if($subcategories->currentPage() == ceil($subcategories->total()/$perPage)) disabled @endif">Конец</a>
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