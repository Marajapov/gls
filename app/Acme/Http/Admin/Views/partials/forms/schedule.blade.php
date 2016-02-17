@include('Front::messages.flash')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
@endsection

<div class="panel panel-success">
  <div class="panel-body">

    <!-- Category -->
    <div class="form-group">
      <label for="category_id" class="col-sm-2 control-label">Канал/Радио</label>
      <div class="col-sm-10">

        {!! Form::select('channel_id', $channels, null, ["class" => "selectpicker", "data-live-search"=>"true", "required" => true, "title" => "-- Выберите --"]) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="channel_id" class="col-sm-2 control-label">Дата</label>
      <div class="col-sm-2">
        {!! Form::text('date', null, ["class" => "form-control","id" => "dateMonday", "required" => true, "title" => ""]) !!}
      </div>
    </div>

    <div class="form-group">
      <label for="channel_id" class="col-sm-2 control-label">Программа</label>
      <div class="col-sm-10">
        {!! Form::textarea('extra', null, ["class" => "form-control"]) !!}
      </div>
    </div>

  </div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.schedule.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>