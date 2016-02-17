@extends('Admin::layouts.default')
@section('title', trans('site.AdminUserAddNew'))

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
@endsection

@section('content')

  <div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h4>{{ trans('site.AdminUserAddNew') }}</h4>
        </div>
        <div class="x_content">
          {!! Form::model($user, ['route' => 'admin.user.store', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
          @include('Admin::partials.forms.user', $user)
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
@stop
