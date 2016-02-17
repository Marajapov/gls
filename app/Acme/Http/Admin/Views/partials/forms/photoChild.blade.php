@include('Front::messages.flash')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/tokenfield-typeahead.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-tokenfield.css') }}"/>
@endsection

<div class="panel panel-success">
    <div class="panel-body">

        <!-- Thumb -->
        <div class="form-group">
            <label for="parentId" class="col-sm-2 control-label">Фото</label>
            <div class="col-sm-10">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 250px; height: 150px;">
                        @if(isset($photoChild->file))<img src="{{ asset($photoChild->file) }}" alt="...">@endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 150px;"></div>
                    <div>
              <span class="btn btn-default btn-file">
                <span class="fileinput-new">{{ trans('site.AdminBackgroundSelect') }}</span>
                <span class="fileinput-exists">{{ trans('site.Change') }}</span>
                {!! Form::file('file', null, ["class" => "form-control"]) !!}
              </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('site.Delete') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.TitleKG') }}</label>
            <div class="col-sm-10">
                {!! Form::text('name', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.TitleRU') }}</label>
            <div class="col-sm-10">
                {!! Form::text('nameRu', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.AuthorKG') }}</label>
            <div class="col-sm-10">
                {!! Form::text('author', null, ["class" => "form-control"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.AuthorRU') }}</label>
            <div class="col-sm-10">
                {!! Form::text('authorRu', null, ["class" => "form-control"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.AdminPhotoChildSelectGaller') }}</label>
            <div class="col-sm-10">
                {!! Form::select('parentId', array('0'=>'--Выберите--')+ $PhotoParentList, null, ["class" => "selectpicker form-control", "data-live-search"=>"true", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Источник на кыргызском</label>
            <div class="col-sm-10">
                {!! Form::text('description', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Источник на русском</label>
            <div class="col-sm-10">
                {!! Form::text('descriptionRu', null, ["class" => "form-control", "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.TagsKG') }}</label>
            <div class="col-sm-10">
                {!! Form::text('tag_kg', null, ["class" => "form-control", "id" => "tag_kg"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.TagsRU') }}</label>
            <div class="col-sm-10">
                {!! Form::text('tag_ru', null, ["class" => "form-control", "id" => "tag_ru"]) !!}
            </div>
        </div>

    </div>

</div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.photoChild.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>