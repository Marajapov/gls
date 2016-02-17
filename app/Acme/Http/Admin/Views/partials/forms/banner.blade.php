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
                {!! Form::select('channel_id', \Model\Channel\ModelName::lists('display', 'id')->toArray(), null, ["class" => "selectpicker form-control", "data-live-search"=>"true", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        
        <div class="form-group">
            <label class="col-sm-2 control-label">{{ trans('site.Title') }}</label>
            <div class="col-sm-10">
                {!! Form::text('name', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>
        

        
        <div class="form-group">
            <label class="col-sm-2 control-label">Ссылка</label>
            <div class="col-sm-10">
                {!! Form::text('linkTo', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
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
                        {!! Form::file('file', null, ["class" => "form-control"]) !!}
                      </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('site.Delete') }}</a>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="row col-md-12">
            <div class="clearfix"></div>
            <div class="form-group col-md-2">
              <label for="parentId" class="col-sm-2 control-label"></label>
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


            <div class="form-group col-md-2">
                <label for="parentId" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="checkbox checkbox-primary ">
                        {!! Form::hidden('positionTop', 0) !!}
                        {!! Form::checkbox('positionTop', 1, null, ["id" => "positionTop", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                        <label for="positionTop">
                            {{ trans('site.Top') }}
                        </label>
                        <div class="topbanner"></div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="parentId" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="checkbox checkbox-primary ">
                        {!! Form::hidden('positionCenter', 0) !!}
                        {!! Form::checkbox('positionCenter', 1, null, ["id" => "positionCenter", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                        <label for="positionCenter">
                            {{ trans('site.Center') }}
                        </label>
                        <div class="centerbanner"></div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="parentId" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="checkbox checkbox-primary ">
                        {!! Form::hidden('positionRight', 0) !!}
                        {!! Form::checkbox('positionRight', 1, null, ["id" => "positionRight", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                        <label for="positionRight">
                            {{ trans('site.Right') }}
                        </label>
                        <div class="rightbanner"></div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="parentId" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="checkbox checkbox-primary ">
                        {!! Form::hidden('positionLeft', 0) !!}
                        {!! Form::checkbox('positionLeft', 1, null, ["id" => "positionLeft", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                        <label for="positionLeft">
                            {{ trans('site.Left') }}
                        </label>
                        <div class="leftbanner"></div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="parentId" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="checkbox checkbox-primary ">
                        {!! Form::hidden('positionBottom', 0) !!}
                        {!! Form::checkbox('positionBottom', 1, null, ["id" => "positionBottom", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                        <label for="positionBottom">
                            {{ trans('site.Bottom') }}
                        </label>
                        <div class="bottombanner"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.banner.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>