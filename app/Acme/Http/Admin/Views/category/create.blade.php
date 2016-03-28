@extends('Admin::layouts.default')
@section('title', "Posts")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

@section('content')

    <!-- include bottom nav -->
    @include('Admin::category.nav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Новая категория</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($category, ['route' => 'admin.category.store']) !!}
                            @include('Admin::partials.forms.category', [$category])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection