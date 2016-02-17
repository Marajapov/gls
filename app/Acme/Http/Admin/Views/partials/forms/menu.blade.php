@include('Front::messages.flash')

<div class="row">

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ trans('site.AdminMenuCodeWrite') }}</label>
            {!! Form::text('code', null, ["class" => "form-control", "required" => true, "title" => "", "list" => "codes"]) !!}
        </div>
    </div>

    <datalist id="codes">
        @foreach($codes as $code)
        <option value="{{ $code }}"/>
        @endforeach
    </datalist>


    <div class="col-md-2 col-sm-2">
        <div class="form-group ">
             <label class="control-label">{{ trans('site.AdminMenuNewWindow') }}</label>
             {!! Form::hidden('newtab', 0) !!}
             {!! Form::checkbox('newtab', 1, null, ["class" => "form-control", "style" => "width: 34px; margin: 0"]) !!}
         </div>
     </div>
 </div>

 <div class="col-md-8 col-sm-12">
    <div class="form-group">
        <label class="control-label">{{ trans('site.Title') }}</label>
        {!! Form::text('name', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
    </div>
</div>

<div class="col-md-8 col-sm-12">
    <div class="form-group">
        <label class="control-label">url</label>
        {!! Form::text('url', null, ["class" => "form-control", "title" => ""]) !!}
    </div>
</div>



</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.menu.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>

