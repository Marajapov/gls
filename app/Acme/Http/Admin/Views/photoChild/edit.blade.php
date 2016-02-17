@extends('Admin::layouts.default')
@section('title', $photoChild->getName())

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>{{ trans('site.AdminPhotochildImgChange') }}</h4>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::model($photoChild, ['route' => ['admin.photoChild.update', $photoChild], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal']) !!}
                    @include('Admin::partials.forms.photoChild', $photoChild)
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
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
        $('#tag_ru').tokenfield(
            {
                typeahead: [null, { source: engine.ttAdapter() }],
                delimiter: ";"
            }
        );
        $('#tag_kg').tokenfield('setTokens', [
            @foreach($photoChild->getTagListAttributeKg() as $key => $tag)
            '{{ $tag->name }}'@if($key<count($photoChild->getTagListAttributeKg())-1),@endif
            @endforeach
        ]);
        $('#tag_ru').tokenfield('setTokens', [
            @foreach($photoChild->getTagListAttributeRu() as $key => $tag)
            '{{ $tag->name }}'@if($key<count($photoChild->getTagListAttributeRu())-1),@endif
            @endforeach
        ]);
    </script>
@stop

