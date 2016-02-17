@include('Front::messages.flash')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/tokenfield-typeahead.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-tokenfield.css') }}"/>

    <!-- Include Editor style. -->
    <link href="{{ asset('froala/css/froala_editor.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('froala/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Include Editor Plugins style. -->
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/char_counter.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/code_view.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/colors.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/emoticons.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/file.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/fullscreen.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/image.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/image_manager.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/line_breaker.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/table.css')}}">
    <link rel="stylesheet" href="{{ asset('froala/css/plugins/video.css')}}">
@endsection

<div class="panel panel-success">
    <div class="panel-body">

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.Title') }}</label>
            <div class="col-sm-10">
                {!! Form::text('name', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}
            </div>
        </div>

        {{--<div class="form-group">--}}
        {{--<label for="channel_id" class="col-sm-2 control-label">{{ trans('site.TitleRU') }}</label>--}}
        {{--<div class="col-sm-10">--}}
        {{--{!! Form::text('nameRu', null, ["class" => "form-control", "required" => true, "title" => ""]) !!}--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">Категория</label>
            <div class="col-sm-10">
                {!! Form::select('videoType', \Model\MediaCategory\ModelName::lists('name', 'videoType')->toArray(), null, ["class" => "selectpicker","data-live-search"=>"true", "required" => true, "title" => "-- Выберите --"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.AdminMediaProject') }}</label>
            <div class="col-sm-10">
                {!! Form::select('program', $projectList, null, ["class" => "selectpicker","data-live-search"=>"true", "title" => "-- Выберите --"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.Content') }}</label>
            <div class="col-sm-10">
                {!! Form::textarea('description', null, ["class" => "form-control", "title" => "","id" => "editKg"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="channel_id" class="col-sm-2 control-label">{{ trans('site.AdminMediaURL') }}</label>
            <div class="col-sm-10">
                {!! Form::text('url', null, ["class" => "form-control", "title" => ""]) !!}
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

        <!-- Thumb -->
        <div class="form-group">
            <label for="parentId" class="col-sm-2 control-label">Миниатюра</label>
            <div class="col-sm-10">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 132px; height: 100px;">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 132px; max-height: 100px;"></div>
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
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-top: 10px;">
                <div class="row morepages">
                    <div class="col-sm-4  panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Доп. страницы</h3>
                        </div>

                        <!-- ns -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('ns', 0) !!}
                                    {!! Form::checkbox('ns', 1, null, ["id" => "ns", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="ns">
                                        Наблюдательный совет
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- rs -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('rs', 0) !!}
                                    {!! Form::checkbox('rs', 1, null, ["id" => "rs", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="rs">
                                        Редакционный совет
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- director -->
                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="checkbox checkbox-primary ">
                                    {!! Form::hidden('director', 0) !!}
                                    {!! Form::checkbox('director', 1, null, ["id" => "director", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                    <label for="director">
                                        Страница Ген. директора
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
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
                            <nav class="noneliststyle">
                                <ul>
                                    <li>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-primary ">
                                                        {!! Form::hidden('muzkanalanons1', 0) !!}
                                                        {!! Form::checkbox('muzkanalanons1', 1, null, ["id" => "muzkanalanons1", "class" => "form-control styled", "style" => " margin: 0"]) !!}
                                                        <label for="muzkanalanons1">
                                                            Анонс 1
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="anonstime1" class="col-sm-2 control-label">Время</label>
                                                        <div class="col-sm-5  ">
                                                            {!! Form::text('anonstime1', null, ["class" => "form-control",  "anonstime1" => "","style" => "height: 24px; margin: 0"]) !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    <li>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-primary">
                                                        {!! Form::hidden('muzkanalanons2', 0) !!}
                                                        {!! Form::checkbox('muzkanalanons2', 1, null, ["id" => "muzkanalanons2", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                                        <label for="muzkanalanons2">
                                                            Анонс 2
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="anonstime2" class="col-sm-2 control-label">Время</label>
                                                        <div class="col-sm-5">
                                                            {!! Form::text('anonstime2', null, ["class" => "form-control",  "anonstime2" => "","style" => "height: 24px; margin: 0"]) !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    <li>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-primary ">
                                                        {!! Form::hidden('muzkanalanons3', 0) !!}
                                                        {!! Form::checkbox('muzkanalanons3', 1, null, ["id" => "muzkanalanons3", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                                        <label for="muzkanalanons3">
                                                            Анонс 3
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="anonstime3" class="col-sm-2 control-label">Время</label>
                                                        <div class="col-sm-5">
                                                            {!! Form::text('anonstime3', null, ["class" => "form-control", "anonstime3" => "","style" => "height: 24px; margin: 0"]) !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="checkbox checkbox-primary ">
                                            {!! Form::hidden('promo', 0) !!}
                                            {!! Form::checkbox('promo', 1, null, ["id" => "promo", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}
                                            <label for="promo">
                                                Промо
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary " style="display:block;">
                                            {!! Form::hidden('exclusive', 0) !!}
                                            {!! Form::checkbox('exclusive', 1, null, ["id" => "exclusive", "class" => "form-control styled", "style" => "width: 34px; margin: 0; float:none !important;"]) !!}
                                            <label for="exclusive">
                                                Эксклюзив
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary " style="display:block;">
                                            {!! Form::hidden('concert', 0) !!}
                                            {!! Form::checkbox('concert', 1, null, ["id" => "concert", "class" => "form-control styled", "style" => "width: 34px; margin: 0; float:none !important;"]) !!}
                                            <label for="concert">
                                                Концерт
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label for="channel_id" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10" style="padding: 0px;">
                                                {!! Form::select('hitnumber', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'], null, ["class" => "selectpicker","data-live-search"=>"true", "title" => "-- Хит Парад --"]) !!}
                                            </div>
                                        </div>

                                </ul>
                            </nav>
                        </div>

                        <!-- balastan -->
                        <div class="form-group" style="margin:0px;">
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
<a href="{{ route('admin.media.index') }}" class="btn btn-default">{{ trans('site.Back') }}</a>
