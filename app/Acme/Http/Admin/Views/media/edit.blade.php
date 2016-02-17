@extends('Admin::layouts.default')
@section('title', $media->getName())

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">
                    <h4 class="pull-left">{{ trans('site.AdminMediaChanged') }}</h4>
                    <h5 class="pull-right" style="text-transform: none;">{{ $media->owner()->first()->name }}</h5>
                </div>

                <div class="x_content">
                    {!! Form::model($media, ['route' => ['admin.media.update', $media], 'method' => 'PUT','enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
                    @include('Admin::partials.forms.media', $media)
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <!-- Include JS files. -->
    <script src="{{ asset('froala/js/froala_editor.min.js') }}"></script>

    <!-- Include Plugins. -->
    <script type="text/javascript" src="{{ asset('froala/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/char_counter.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/code_view.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/file.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/fullscreen.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/image.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/image_manager.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/quote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/table.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/url.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('froala/js/plugins/video.min.js') }}"></script>

    <!-- Include Language file if we'll use it. -->
    <script type="text/javascript" src="{{ asset('froala/js/languages/ru.js') }}"></script>

    <!-- Initialize the editor. -->
    <script>
        $(function() {
            $('#editKg').froalaEditor({
                language: 'ru',
                height: 300,
                placeholderText: '{{ trans('site.AdminPostEnterText') }}',

                imageUploadParam: 'file',
                imageUploadURL: "{{ asset('froala/upload_image.php') }}",

                imageManagerLoadURL: "{{ asset('froala/load_images.php') }}"

            });
        });
    </script>

    <script>
        $.FroalaEditor.DEFAULTS.key = 'Xf1onF2phouE4kf==';
    </script>

    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>

    <script src="{{ asset('js/admin/bootstrap-tokenfield.js') }}"></script>
    <script src="{{ asset('js/admin/scrollspy.js') }}"></script>
    <script src="{{ asset('js/admin/affix.js') }}"></script>
    <script src="{{ asset('js/admin/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/docs.js') }}"></script>
    <script>
        var engine = new Bloodhound({
            local: [
                @foreach($tags as $tag)
                {value: '{{ $tag }}' },
                @endforeach
              ],
            datumTokenizer: function(d) {
                return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        engine.initialize();
        $('#tag_kg').tokenfield(
            {
                typeahead: [null, { source: engine.ttAdapter() }],
                delimiter: ";"
            }
        );
        $('#tag_kg').tokenfield('setTokens', [
            @foreach($media->getTagListAttributeKg() as $key => $tag)
                '{{ $tag->name }}'@if($key<count($media->getTagListAttributeKg())-1),@endif
            @endforeach
        ]);
        $('#tag_ru').tokenfield(
            {
                typeahead: [null, { source: engine.ttAdapter() }],
                delimiter: ";"
            }
        );
        $('#tag_ru').tokenfield('setTokens', [
            @foreach($media->getTagListAttributeRu() as $key => $tag)
                '{{ $tag->name }}'@if($key<count($media->getTagListAttributeRu())-1),@endif
            @endforeach
        ]);
    </script>
@stop