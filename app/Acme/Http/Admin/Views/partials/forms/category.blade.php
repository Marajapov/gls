@include('Front::messages.flash')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
@endsection

<div class="panel panel-success">
    <div class="panel-body">

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.TitleKG') }}</label>
            <div class="col-sm-10">
                {!! Form::text('title', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.TitleRU') }}</label>
            <div class="col-sm-10">
                {!! Form::text('titleRu', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="parentId" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <div class="checkbox checkbox-primary ">
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, null, ["id" => "checkboxPublished", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                    <label for="checkboxPublished">
                        {{ trans('site.Publish') }}
                    </label>
                </div>
                <div class="checkbox checkbox-primary col-sm-2">
                    {!! Form::hidden('general', 0) !!}
                    {!! Form::checkbox('general', 1, null, ["id" => "checkboxGeneral", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                    <label for="checkboxGeneral">
                        {{ trans('site.AdminHomeTitle') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-top: 10px;">
                <div class="row morepages">

                    <div class="col-sm-4  panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Радио каналы</h3>
                        </div>
                        <!-- kyrgyzradio -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('kyrgyzradio', 0) !!}
                                    {!! Form::checkbox('kyrgyzradio', 1, null, ["id" => "kyrgyzradio", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="kyrgyzradio">
                                        Кыргыз радио
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- birinchi -->
                        <div class="form-group">

                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('birinchi', 0) !!}
                                    {!! Form::checkbox('birinchi', 1, null, ["id" => "birinchi", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="birinchi">
                                        Биринчи радио
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birinchiProgram" class="col-sm-3 control-label" style="float: left !important;">Порядок</label>
                                <div class="col-sm-9">
                                    <select name="orderBirinchi" class="selectpicker" data-live-search="true" title="-- Выберите --">
                                        @foreach($birinchiCategories as $key=>$num)
                                            <option @if($category->orderBirinchi == $key+1) selected @endif value="{{ $key+1 }}">{{ $key+1 }}</option>
                                        @endforeach
                                        @if($category)
                                        @else
                                            <option value="{{ count($birinchiCategories)+1 }}">{{ count($birinchiCategories)+1 }}</option>
                                        @endif
                                    </select>
                                    {{--{!! Form::select('orderBirinchi', [], null, ["class" => "selectpicker", "data-live-search"=>"true", "title" => "-- Выберите --"]) !!}--}}
                                </div>
                            </div>

                        </div>
                        <!-- minkiyal -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('minkiyal', 0) !!}
                                    {!! Form::checkbox('minkiyal', 1, null, ["id" => "minkiyal", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="minkiyal">
                                        Мин кыял
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- dostuk -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('dostuk', 0) !!}
                                    {!! Form::checkbox('dostuk', 1, null, ["id" => "dostuk", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="dostuk">
                                        Достук
                                    </label>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-4  panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Телеканалы</h3>
                        </div>
                        <!-- muzkanal -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('muzkanal', 0) !!}
                                    {!! Form::checkbox('muzkanal', 1, null, ["id" => "muzkanal", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="muzkanal">
                                        Муз канал
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- balastan -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('balastan', 0) !!}
                                    {!! Form::checkbox('balastan', 1, null, ["id" => "balastan", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="balastan">
                                        Баластан
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- madaniyat -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('madaniyat', 0) !!}
                                    {!! Form::checkbox('madaniyat', 1, null, ["id" => "madaniyat", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="madaniyat">
                                        Маданият
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<button type="submit" class="btn btn-primary">{{ trans('site.Save') }}</button>
<a href="{{ route('admin.category.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>
