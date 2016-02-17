@include('Front::messages.flash')

<div class="panel panel-success">
  <div class="panel-body">
      <div class="form-group">
          <label class="col-sm-2 control-label">Дисплей</label>
          <div class="col-sm-10">
            {!! Form::text('display', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
          </div>
      </div>

      <div class="form-group">
            <label for="file" class="col-sm-2 control-label">Фото</label>
            <div class="col-sm-10">
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                  <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">{{ trans('site.AdminBannerSelectImg') }}</span><span class="fileinput-exists">{{ trans('site.Change') }}</span>
                  {!! Form::file('file', null, ["class" => "form-control", "required" => true]) !!}
                </div>
            </div>
        </div>
   

<!--         <div class="col-xs-12">
            <div class="form-group">
                <label class="control-label">Файл</label>
                {!! Form::file('file', null, ["class" => "form-control", "required" => true]) !!}
            </div>
        </div> -->

      <div class="col-sm-2 col-sm-offset-2">
        <div class="form-group">
             <label class="control-label">{{ trans('site.Publish') }}</label>
             {!! Form::hidden('published', 0) !!}
             {!! Form::checkbox('published', 1, null, ["class" => "form-control", "style" => "width: 34px; margin: 0"]) !!}
         </div>
     </div>
  </div>
</div>


<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.channel.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>


