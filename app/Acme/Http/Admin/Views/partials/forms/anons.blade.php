@include('Front::messages.flash')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/tokenfield-typeahead.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-tokenfield.css') }}"/>
@endsection

<div class="panel panel-success">
    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Канал</label>
            <div class="col-sm-10">
                {!! Form::select('channel', ['0'=>'-- Выберите --']+$channels, null, ["class" => "selectpicker form-control", "data-live-search"=>"true", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.TitleKG') }}</label>
            <div class="col-sm-10">
                {!! Form::text('name', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.TitleRU') }}</label>
            <div class="col-sm-10">
                {!! Form::text('nameRu', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Ссылка</label>
            <div class="col-sm-10">
                {!! Form::text('url', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.AdminAnonsWeekDay') }}</label>
            <div class="col-sm-10">
                {!! Form::text('weekday', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.AdminAnonsWeekDayRu') }}</label>
            <div class="col-sm-10">
                {!! Form::text('weekdayRu', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.AdminAnonsTime') }}</label>
            <div class="col-sm-10">
                {!! Form::text('time', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <!-- Thumb -->
        <div class="form-group">
            <label for="parentId" class="col-sm-2 control-label">Файл</label>
            <div class="col-sm-10">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 250px; height: 150px;">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 150px;"></div>
                    <div>
                      <span class="btn btn-default btn-file">
                        <span class="fileinput-new">{{ trans('site.AdminBackgroundSelect') }}</span>
                        <span class="fileinput-exists">{{ trans('site.Change') }}</span>
                        {!! Form::file('thumbnail', null, ["class" => "form-control"]) !!}
                      </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('site.Delete') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12">
            <label for="parentId" class="col-sm-2 control-label">&nbsp;</label>
            <div class="form-group col-md-2">
                <div class="col-sm-10">
                    <div class="checkbox checkbox-primary ">
                        {!! Form::hidden('published', 0) !!}
                        {!! Form::checkbox('published', 1, null, ["id" => "checkboxPublished", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                        <label for="checkboxPublished">
                            {{ trans('site.Publish') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.anons.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>