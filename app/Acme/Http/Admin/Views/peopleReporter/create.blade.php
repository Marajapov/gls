@extends('Admin::layouts.default')
@section('title', 'Создать новость')

@section('content')

<div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>{{ trans('site.AdminPeopleReporterNew') }}</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {!! Form::model($peopleReporter, ['route' => 'admin.peopleReporter.store', 'enctype' => 'multipart/form-data', 'multiple'=>true]) !!}
                @include('Admin::partials.forms.peopleReporter', [$peopleReporter])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/select/select2.min.css') }}"/>
@stop
