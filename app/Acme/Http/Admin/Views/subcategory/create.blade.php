@extends('Admin::layouts.default')
@section('title', "Добавить подкатегорию")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

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
                            <h4 class="title">Новая подкатегория</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($subcategory, ['route' => 'admin.subcategory.store']) !!}
                            @include('Admin::partials.forms.subcategory', [$subcategory])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection