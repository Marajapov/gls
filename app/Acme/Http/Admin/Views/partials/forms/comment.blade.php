@include('Front::messages.flash')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
@endsection

<div class="panel panel-success">
    <div class="panel-body">

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">Автор</label>
            <div class="col-sm-10">
                {!! Form::text('author', null, ["class" => "form-control", "required" => true, "title" => "", "disabled"=>"disabled"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                {!! Form::text('email', null, ["class" => "form-control", "required" => true, "title" => "", "disabled"=>"disabled"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">Комментарий</label>
            <div class="col-sm-10">
                {!! Form::textarea('text', null, ["class" => "form-control"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="parentId" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <div class="checkbox checkbox-primary ">
                    {!! Form::hidden('approved', 0) !!}
                    {!! Form::checkbox('approved', 1, null, ["id" => "checkboxPublished", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                    <label for="checkboxPublished">
                        {{ trans('site.Publish') }}
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.category.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>