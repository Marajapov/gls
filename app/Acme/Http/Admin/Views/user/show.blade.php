@extends('Admin::layouts.default')
@section('title', $user->getName())

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}" />
@endsection

@section('content')

    <!-- include nav -->
    @include('Admin::user.nav')
    <!-- end nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="header">
                            <h4 class="title">
                                <span>{{ $user->getName() }}</span>
                                <input id="userStatus" type="checkbox" @if($user->status == 'active') checked @endif data-toggle="switch" data-user-id="{{$user->id}}" data-user-status="{{$user->status}}">
                            </h4>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">

                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                Название
                                            </td>
                                            <td>
                                                {{ $user->getName() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Телефон
                                            </td>
                                            <td>
                                                {{ $user->getPhone() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Подкатегория
                                            </td>
                                            <td>
                                                @foreach($user->subcategories as $subcategory)
                                                    <span class="spec">{{ $subcategory->getName() }}</span>
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Статус
                                            </td>
                                            <td class="status">
                                                @if($user->status == 'active')
                                                    активный
                                                @elseif($user->status == 'blocked')
                                                    заблокирован
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Глобальный пользователь</td>
                                            <td>
                                                @if($user->flag == 1)
                                                    да
                                                @else
                                                    нет
                                                @endif
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                    <div class="actions">
                                        <a href="{{ route('admin.user.edit', $user)}}" class="btn btn-primary">
                                            Редактировать
                                        </a>
                                        {!! Form::open(['route' => ['admin.user.destroy', $user], 'method' => 'DELETE', 'class'=>'deleteForm']) !!}
                                            <button id="deleteButton" rel="tooltip" type="submit" class="delete btn btn-danger" title="Удалить">
                                                Удалить
                                            </button>
                                        {!! Form::close() !!}
                                        <a href="#" onclick="history.go(-1);" class="btn btn-default">Назад</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="accepted-list">
                                        <div class="col-md-12">
                                            <p class="subtitle">Подкатегории</p>
                                        </div>
                                        <table id="doers" class="table">
                                            <thead>
                                            <tr>
                                                <th>Название</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($listUserSubcategoryTie)
                                            @foreach($listUserSubcategoryTie as $row)
                                                <tr>
                                                    <td>
                                                        <a href="#">{{ $row->subcategories()->first()->getName() }}</a>
                                                    </td>
                                                    <td class="td-actions">
                                                        <a onclick="return confirm('Вы уверены ?')" rel="tooltip" class="btn btn-default" href="{{route('admin.user.deleteSubcategory', $row->id)}}" title="Удалить">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="actions">
                                        {!! Form::model($newUserSubcategoryTie, ['route' => ['admin.user.addSubcategory', $newUserSubcategoryTie], 'method' => 'POST','enctype' => 'multipart/form-data','class'=>'form-horizontal']) !!}
                                        
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <input type="hidden" name="user" value="{{$user->id}}" />
                                                                <select required="required" id="category1" name="categories[]" onchange="categoryChange($('#category1'), $('#subCategory1'))" class="form-control selectpicker" title = "-- Выберите категорию --">
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="col-md-4 col-sm-12 col-xs-12">

                                                                <select required="required" id="subCategory1" name="subcategories[]" class="form-control selectpicker" title="-- Выберите подкатегорию --">
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <button type="submit" class="btn btn-success">
                                                Добавить
                                            </button>

                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script>

        function categoryChange(source, target) {
            var id = source.val();
            var dataString = 'id=' + id;
            var url = "{{route('admin.userCategoryChange')}}";

            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });

            $.ajax
            ({
                type: "POST",
                url: url,
                data: dataString,
                cache: false,
                success: function (data) {
                    target.html(data);
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        }

    </script>

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

    {{-- Change Status --}}
    <script type="text/javascript" src="{{ asset('js/admin/bootstrap-checkbox-radio-switch-tags.js') }}"></script>
    <script>

        var switchButton = $('#userStatus');
        var statusDiv = $('div.switch.animate');
        var statusTd = $('.status');

        switchButton.change(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
            var url = "{{route('admin.userChangeStatus')}}";

            var id = switchButton.data('user-id');
            var status = switchButton.data('user-status');
            var dataString = {
                'id': id,
                'status' : status
            };

            $.ajax
            ({
                type: "POST",
                url: url,
                data: dataString,
                cache: false,
                success: function (data) {
                    if(data == 0){
                        statusTd.html('заблокирован');
                        $('#userStatus').data('user-status','blocked');
                    }
                    if(data == 1) {
                        $('#userStatus').data('user-status','active');
                        statusTd.html('активный');
                    }
                }
            });
        });

    </script>
@stop




