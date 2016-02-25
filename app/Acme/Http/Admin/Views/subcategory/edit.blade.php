@extends('Admin::layouts.default')
@section('title', "Posts")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

@section('content')

    <!-- include subcategory nav -->
    @include('Admin::partials.subcategoryNav')
    <!-- end subcategory nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Редактировать</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($subcategory, ['route' => ['admin.subcategory.update', $subcategory], 'method' => 'PUT']) !!}
                            @include('Admin::partials.forms.subcategory', [$subcategory])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection