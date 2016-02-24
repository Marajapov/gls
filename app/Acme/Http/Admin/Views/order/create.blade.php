@extends('Admin::layouts.default')
@section('title', "Posts")

@section('content')


    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Новый заказ</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($order, ['route' => 'admin.order.store']) !!}
                                @include('Admin::partials.forms.order', [$order])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection