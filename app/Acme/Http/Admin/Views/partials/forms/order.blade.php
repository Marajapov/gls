@include('Front::messages.flash')

<div class="panel panel-success">
  <div class="panel-body">

    <div class="form-group">
      <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.AdminUserName') }}</label>
      <div class="col-sm-10">
        {!! Form::text('name', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="channel_id" class="col-sm-2 control-label">E-mail</label>
      <div class="col-sm-10">
        {!! Form::email('email', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="channel_id" class="col-sm-2 control-label">Роль</label>
      <div class="col-sm-10" style="padding-top: 7px;">
        {!! Form::select('role', ['ADMIN' => 'admin', 'MANAGER' => 'manager', 'NS'=>'ns','BIRINCHI'=> 'birinchi', 'MUZKANAL'=> 'muzkanal'], null, ["class" => "selectpicker","data-live-search"=>"true", "title" => "-- Выберите --"]) !!}
      </div>
    </div>

  </div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.user.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>
