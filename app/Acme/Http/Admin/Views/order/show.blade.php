@extends('Admin::layouts.default')
@section('title', "Заказ")

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('content')

    @include('Admin::order.nav')

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="header">
                            <h4 class="title">
                                {{ $order->getName() }}
                            </h4>
                            <p class="category">
                                @if($order->getStatus() == "new") новый
                                @elseif($order->getStatus() == "site") заявка с сайта
                                @elseif($order->getStatus() == "share") разослан
                                @elseif($order->getStatus() == "complete") комплектован
                                @elseif($order->getStatus() == "canceled") отменен
                                @elseif($order->getStatus() == "closed") закрыт
                                @endif
                            </p>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="heading">
                                                        Название
                                                    </td>
                                                    <td>
                                                        {{ $order->getName() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="heading">
                                                        Ф.И.О Клиента
                                                    </td>
                                                    <td>
                                                        {{ $order->getClient() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="heading">
                                                        Номер Телефона
                                                    </td>
                                                    <td>
                                                        {{ $order->getPhone() }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                     <td class="heading">
                                                        Адрес
                                                    </td>
                                                    <td>
                                                        {{ $order->getAdres() }}
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="heading">
                                                        Подкатегория
                                                    </td>
                                                    <td>
                                                        <span class="spec">{{ $order->subcategories()->first()->getName() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Количество
                                                    </td>
                                                    <td>
                                                        <span class="spec">{{ $order->getCount() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Цена
                                                    </td>
                                                    <td>
                                                        <span class="spec">{{ $order->getPrice() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Описание
                                                    </td>
                                                    <td>
                                                        {{ $order->getDescription() }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="heading">
                                                        Фото
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset($order->getFile()) }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="actions">
                                        @if(($order->status == 'new') || ($order->status == 'site'))
                                            <a href="{{ route('admin.order.share', $order)}}" class="btn btn-success">
                                                Разослать
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.order.edit', $order)}}" class="btn btn-primary">
                                            Редактировать
                                        </a>
                                        <a href="{{ route('admin.order.softDelete', $order)}}" class="btn btn-danger">
                                            Удалить
                                        </a>
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
                                            <p class="subtitle">Принятые</p>
                                        </div>
                                        <table id="doers" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Подкатегория</th>
                                                    <th>Статус</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#">Имя</a>
                                                    </td>
                                                    <td>
                                                        Телефон
                                                    </td>
                                                    <td>
                                                        <span class="spec">uborka1</span>
                                                        <span class="spec">uborka2</span>
                                                        <span class="spec">uborka3</span>
                                                    </td>
                                                    <td>
                                                        статус
                                                    </td>
                                                    <td class="td-actions">
                                                        <a rel="tooltip" class="delete btn btn-default" href="{{ route('admin.order.softDelete', $order) }}" title="Удалить">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="actions">
                                        <form id="" class="form-horizontal">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12 col-xs-12">

                                                                <select id="userSelect" name="user" class="form-control selectpicker" title="-- Выберите пользователя --" data-live-search="true">
                                                                    @foreach($users as $user)
                                                                        <option value="{{ $user->id  }}">{{ $user->phone}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <button class="btn btn-success" id="addUser">
                                                Добавить исполнителя
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#addUser').click(function (e) {

                e.preventDefault();

                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
                var url = "{{ route('admin.newUser') }}";
                var id = $('#userSelect').val();
                var dataString = 'id=' + id;

                $.ajax
                ({
                    type: "POST",
                    url: url,
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $('#doers tbody').append(data);
                    }
                });
            });
        });
    </script>

@stop