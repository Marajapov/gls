@extends('Admin::layouts.default')
@section('title', trans('site.AdminMediaArticles'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
@endsection

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">
                    <h4>{{ trans('site.AdminMediaArticles') }}</h4>
                    <a href="{{ route('admin.media.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i>
                        {{ trans('site.AdminMediaNew') }}
                    </a>
                </div>

                <div class="x_content">

                    <table id="example" class="table table-bordered table-striped" data-order='[[ 4, "desc" ]]' data-page-length='10'>
                        <thead>
                        <tr>
                            <th>Миниатюра</th>
                            <th>{{ trans('site.Title') }}</th>
                            {{--<th>{{ trans('site.TitleRU') }}</th>--}}
                            <th class="hidden-xs">Автор</th>
                            <th class="hidden-xs">{{ trans('site.AdminPostCreatedDate') }}</th>
                            <th class="hidden-xs">Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medias as $key => $media)
                            <tr class="@if($media->published == 1) success @elseif($media->published == 0) danger @endif">
                                <td class="table-img">
                                    @if($media->isImage())
                                        <img src="http://img.youtube.com/vi/{{ $media->getUrl() }}/sddefault.jpg" class="img-responsive">
                                    @endif
                                </td>
                                <td class="table-title">
                                    <a href="{{ route('admin.media.show', $media) }}">
                                        {{ $media->getName() }}
                                    </a>
                                </td>
                                {{--<td class="table-title">--}}
                                {{--<a href="{{ route('admin.media.show', $media) }}">--}}
                                {{--{{ $media->getNameRu() }}--}}
                                {{--</a>--}}
                                {{--</td>--}}
                                <td class="hidden-xs">{{ $media->owner()->first()->name }}</td>
                                <td class="hidden-xs">{{ $media->getDateFormatted() }} </td>
                                <td class="hidden-xs">
                                    @if($media->published == '1')
                                        опубликован
                                    @elseif($media->published == '0')
                                        не опубликован
                                    @endif
                                </td>
                                <td>

                                    <a class="btn btn-default" href="{{ route('admin.media.show', $media) }}">
                                        {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- video1 -->
                                    {!! Form::open(['route' => ['admin.media.dayVideo1', $media->id], 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <input type="hidden" value="{{ $media->id }}" name="media">
                                    <button class="btn @if($media->dayVideo == 1) btn-warning @else btn-default @endif" type="submit">1 - KG</button>
                                    {!! Form::close() !!}

                                    <!-- videoRu1 -->
                                    {!! Form::open(['route' => ['admin.media.dayVideoRu1', $media->id], 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <input type="hidden" value="{{ $media->id }}" name="media">
                                    <button class="btn @if($media->dayVideo == 11) btn-warning @else btn-default @endif" type="submit">1 - RU</button>
                                    {!! Form::close() !!}

                                    <!-- video2 -->
                                    {!! Form::open(['route' => ['admin.media.dayVideo2', $media->id], 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <input type="hidden" value="{{ $media->id }}" name="media">
                                    <button class="btn @if($media->dayVideo == 2) btn-warning @else btn-default @endif" type="submit">2</button>
                                    {!! Form::close() !!}

                                    <!-- video3 -->
                                    {!! Form::open(['route' => ['admin.media.dayVideo3', $media->id], 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <input type="hidden" value="{{ $media->id }}" name="media">
                                    <button class="btn @if($media->dayVideo == 3) btn-warning @else btn-default @endif" type="submit">3</button>
                                    {!! Form::close() !!}

                                    <!-- video4 -->
                                    {!! Form::open(['route' => ['admin.media.dayVideo4', $media->id], 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <input type="hidden" value="{{ $media->id }}" name="media">
                                    <button class="btn @if($media->dayVideo == 4) btn-warning @else btn-default @endif" type="submit">4</button>
                                    {!! Form::close() !!}

                                    <a class="btn btn-default" href="{{ route('admin.media.edit', $media) }}">
                                        {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    {!! Form::open(['route' => ['admin.media.destroy', $media], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <button type="submit" class="btn btn-default" href="#">
                                        {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('js/admin/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "info": "_START_ - _END_ : {{ trans('site.DataTableTotal') }} _TOTAL_ ",
                    "lengthMenu" : "_MENU_ ",
                    "search" : "{{ trans('site.DataTableSearch') }} ",
                    "zeroRecords" : "{{ trans('site.DataTableNoResult') }}",
                    "infoEmpty" : "0-0: {{ trans('site.DataTableTotal') }} 0",
                    "infoFiltered" : "",

                    "paginate": {
                        "first": "{{ trans('site.DataTableFirstPage') }}",
                        "last": "{{ trans('site.DataTableLastPage') }}",
                        "next": "{{ trans('site.DataTableNextPage') }}",
                        "previous": "{{ trans('site.DataTablePreviousPage') }}"
                    }
                },
                "columnDefs": [
                    { "orderable": false, "targets": 0 },
                    { "orderable": false, "targets": 5 }
                ]
            });
        } );
    </script>
@endsection

