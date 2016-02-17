@extends('Admin::layouts.default')
@section('title', "Фотогалерея")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
@endsection

@section('content')
    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">
                    <h4>{{ trans('site.AdminPhotoParents') }}</h4>
                    <a href="{{ route('admin.photoParent.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i>
                        {{ trans('site.AdminPhotoParentNewGal') }}
                    </a>
                </div>

                <div class="x_content">

                    <table id="example" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]' data-page-length='10'>

                        <thead>
                        <tr>
                            <th class="hidden">ID</th>
                            <th>Миниатюра</th>
                            <th>{{ trans('site.TitleKG') }}</th>
                            <th>{{ trans('site.TitleRU') }}</th>
                            <th class="hidden-xs">{{ trans('site.AdminPostCreatedDate') }}</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($photoParents as $photoParent)
                            <tr class="@if($photoParent->published == 1) success @elseif($photoParent->published == 0) danger @endif">
                                <td class="hidden">{{ $photoParent->id }}</td>
                                <td class="table-img text-center">
                                    <img src="{{ asset($photoParent->getThumbnail()) }}" alt=""/>
                                </td>
                                <td class="table-title">
                                    <a href="{{ route('admin.photoParent.show', $photoParent) }}">
                                        {{ $photoParent->getNameKg() }}
                                    </a>
                                </td>
                                <td class="table-title">
                                    <a href="{{ route('admin.photoParent.show', $photoParent) }}">
                                        {{ $photoParent->getNameRu() }}
                                    </a>
                                </td>
                                <td>
                                    {{ $photoParent->getDateFormatted() }}
                                </td>
                                <td class="hidden-xs text-center">
                                    @if($photoParent->published == 1)

                                        <p>опубликован</p>

                                        {!! Form::open(['route' => ['admin.photoParent.unpublish', $photoParent->id],'class'=>'form-publish', 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                        <input type="hidden" value="{{ $photoParent->id }}" name="photoParentId">

                                        <button class="btn btn-labeled btn-danger btn-publish" type="submit">Снять</button>
                                        {!! Form::close() !!}

                                    @else

                                        <p>не опубликован</p>

                                        {!! Form::open(['route' => ['admin.photoParent.publish', $photoParent->id],'class'=>'form-publish', 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                        <input type="hidden" value="{{ $photoParent->id }}" name="photoParentId">

                                        <button class="btn btn-labeled btn-success btn-publish" type="submit">опубликовать</button>
                                        {!! Form::close() !!}

                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-default" href="{{ route('admin.photoParent.show', $photoParent) }}">
                                        {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-default" href="{{ route('admin.photoParent.edit', $photoParent) }}">
                                        {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    {!! Form::open(['route' => ['admin.photoParent.destroy', $photoParent], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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
                    { "orderable": false, "targets": 4 },
                    { "orderable": false, "targets": 5 }
                ]
            });
        } );
    </script>
@endsection


