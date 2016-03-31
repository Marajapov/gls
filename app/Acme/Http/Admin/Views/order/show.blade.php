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
                                                    <td style="width: 300px;">
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

                                        @if($order->status == 'share' || $order->status == 'complete')
                                            <a href="{{ route('admin.order.cancel', $order)}}" class="btn btn-success">
                                                Отменить
                                            </a>
                                        @endif

                                        @if($order->status == 'share' || $order->status == 'complete')
                                            <a href="{{ route('admin.order.close', $order)}}" class="btn btn-success">
                                                Завершить
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.order.edit', $order)}}" class="btn btn-primary">
                                            Редактировать
                                        </a>
                                        <a onclick="return confirm('Вы уверены ?')" href="{{ route('admin.order.softDelete', $order)}}" class="btn btn-danger">
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
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($acceptedUserList as $row)
                                                <tr>
                                                    <td>
                                                        <a href="#">{{ $row->users()->first()->getName()}}</a>
                                                    </td>
                                                    <td>
                                                        {{ $row->users()->first()->getPhone() }}
                                                    </td>
                                                    <td>
                                                        @foreach($row->users()->first()->subcategories as $subcategory)
                                                            <span class="spec">{{ $subcategory->getName() }}</span>
                                                        @endforeach
                                                        
                                                    </td>
                                                    <td class="td-actions">
                                                        <a onclick="return confirm('Вы уверены ?')" rel="tooltip" class="delete btn btn-default" href="{{ route('admin.order.rejectUser',array($row->users()->first(), $order->id)) }}" title="Удалить">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="actions">
                                    {!! Form::model($newUser, ['route' => ['admin.userOrderTie.store', $newUser], 'method' => 'POST','class'=>'form-horizontal']) !!}

                                        <input name="orderId" type="hidden" value="{{ $order->id }}" />
                                        <input name="category_id" type="hidden" value="{{ $order->category_id }}" />
                                        <input name="subcategory_id" type="hidden" value="{{ $order->subcategory_id }}" />
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12 col-xs-12">

                                                                <select id="userSelect" name="user" class="form-control selectpicker" title="-- Выберите пользователя --" data-live-search="true">
                                                                    @foreach($userList as $user)
                                                                        <option value="{{ $user->id  }}">{{ $user->phone}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <button type="submit" class="btn btn-success" id="addUser">
                                                Добавить исполнителя
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

@endsection