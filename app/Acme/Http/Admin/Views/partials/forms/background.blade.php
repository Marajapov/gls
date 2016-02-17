    @include('Front::messages.flash')

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label">Канал</label>
                {!! Form::select('channel_id', \Model\Channel\ModelName::lists('display', 'id')->toArray(), null, ["class" => "select2_group form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        <div class="col-sm-10">
            <div class="form-group">
                <label class="control-label">{{ trans('site.Title') }}</label>
                {!! Form::text('name', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>


 <!--    <div class="col-sm-2">
            <div class="form-group">
            <div class="checkbox checkbox-primary">
            <input id="checkbox2" type="checkbox">
                <label for="checkbox2">опубликовать</label>
                {!! Form::hidden('published', 0) !!}
                {!! Form::checkbox('published', 1, null, ["class" => "form-control", "style" => "width: 34px; margin: 0"]) !!}
            </div>
             </div>
         </div> -->

         <!-- Биринчи эолу алмаштырса болот, экинчинде алмашбайт, бирок биринчи өзгөртүп алмаштырса болот -->
         <div class="col-sm-2">
            <div class="form-group">
                  <label class="control-label">{{ trans('site.Publish') }}</label>
                 {!! Form::hidden('published', 0) !!}
                 {!! Form::checkbox('published', 1, null, ["class" => "form-control", "style" => "width: 34px; margin: 0"]) !!}
             </div>
         </div>
     </div>

     <!-- Изначальный код, толук иштебейт -->
<!--     <div class="col-sm-2">
            <div class="form-group">
                <label class="control-label">Жайгаштыруу</label>
                {!! Form::hidden('published', 0) !!}
                {!! Form::checkbox('published', 1, null, ["class" => "checkbox-danger form-control", "style" => "width: 34px; margin: 0"]) !!}
            </div>
        </div> -->
        <!-- Изначальный код -->
        
<!--         <div class="col-xs-12">
            <div class="form-group">
                <label class="control-label">Файл</label>
                {!! Form::file('file', null, ["class" => "form-control", "required" => true]) !!}
            </div>
        </div> -->

        <div class="col-xs-12">
            <div class="fileinput fileinput-new" data-provides="fileinput">
               <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
               <div>
                <span class="btn btn-default btn-file"><span class="fileinput-new">{{ trans('site.AdminBackgroundSelect') }}</span><span class="fileinput-exists">{{ trans('site.Change') }}</span>
                {!! Form::file('file', null, ["class" => "form-control", "required" => true]) !!}              
            </div>
        </div>
    </div>
    
<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.background.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>

<!-- select2 -->
<script>
    $(document).ready(function () {
        $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
            maximumSelectionLength: 4,
            placeholder: "With Max Selection limit 4",
            allowClear: true
        });
    });
</script>
        <!-- /select2 -->