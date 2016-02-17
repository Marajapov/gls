@extends('Admin::layouts.default')
@section('title', $banner->getName())

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>{{ trans('site.AdminBannerChanged') }}</h4>

                </div>
                <div class="x_content">
                    {!! Form::model($banner, ['route' => ['admin.banner.update', $banner], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
                    @include('Admin::partials.forms.banner', $banner)
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap-tokenfield.js') }}"></script>
    <script src="{{ asset('js/admin/scrollspy.js') }}"></script>
    <script src="{{ asset('js/admin/affix.js') }}"></script>
    <script src="{{ asset('js/admin/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/docs.js') }}"></script>
@stop


