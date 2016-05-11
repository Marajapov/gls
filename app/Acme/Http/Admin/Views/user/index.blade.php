@extends('Admin::layouts.default')
@section('title', 'Все пользователи' )

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}" />
@stop

@section('content')

    <!-- include nav -->
    @include('Admin::user.nav')
    <!-- end nav -->

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
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="hidden-xs hidden-sm">ID</th>
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th class="hidden-xs hidden-sm">Подкатегория</th>
                                    <th class="hidden-xs hidden-sm">Статус</th>
                                    <th class="hidden-xs hidden-sm">Глобальный</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="@if($user->status == "active") success @elseif($user->status == "blocked") danger @endif">
                                        <td class="hidden-xs hidden-sm">{{ $user->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.show', $user) }}">
                                                {{ $user->name }}
                                            </a>
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="hidden-xs hidden-md">
                                            @foreach($user->subcategories as $subcategory)
                                                <span class="spec">{{ $subcategory->id }}{{ $subcategory->getName() }}</span>
                                            @endforeach
                                        </td>
                                        <td class="hidden-xs hidden-sm">
                                            @if($user->status == 'active')
                                                активный
                                            @elseif($user->status == 'blocked')
                                                заблокирован
                                            @endif
                                        </td>

                                        <td class="hidden-xs hidden-sm">
                                            @if($user->flag == 1)
                                                да
                                            @else
                                                нет
                                            @endif
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
                                                    {!! Form::open(['route' => ['admin.user.destroy', $user], 'method' => 'DELETE', 'class'=>'deleteForm']) !!}
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
                                        <a href="{{ route('admin.user.index', ['users' => $users, 'page' => 1]) }}" class="btn btn-default @if($users->currentPage() == 1) disabled @endif">Начало</a>
                                    </li>
                                    <li>
                                        <a href="{{ $users->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                    </li>

                                    @for($i = 0, $j = 1; $i < $users->total(); $i+=$perPage)
                                        <li class="@if(($j > $users->currentPage()+3) || ($j < $users->currentPage()-3)) hidden @endif">
                                            <a href="{{ route('admin.user.index', ['users' => $users, 'page' => $j]) }}" class="btn btn-default @if($users->currentPage() == $j) active @endif">
                                                {{ $j++ }}
                                            </a>
                                        </li>
                                    @endfor

                                    <li>
                                        <a href="{{ $users->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.user.index', ['users' => $users, 'page' => ceil($users->total()/$perPage)]) }}" class="btn btn-default @if($users->currentPage() == ceil($users->total()/$perPage)) disabled @endif">Конец</a>
                                    </li>

                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    {{-- Sweet Alert --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        var button = $('.delete');

        button.each(function () {

            var form = $(this).parent($('.deleteForm'));
            $(this).click(function(event) {
                event.preventDefault();
                swal({
                        title: "Вы уверены?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Да, удалить",
                        cancelButtonText: "Отменить",
                        closeOnConfirm: false

                    },
                    function(){
                        form.submit();
                    });
            });
        });
    </script>
@endsection