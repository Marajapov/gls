@extends('Admin::layouts.default')
@section('title', "Цитата")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
@endsection

@section('content')
    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">
                    <h4>Цитата</h4>
                    <a href="{{ route('admin.quote.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i>
                        {{ trans('site.AdminQuoteNew') }}
                    </a>
                </div>

                <div class="x_content">

                    <table id="example" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]' data-page-length='10'>

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>File</th>
                            <th>{{ trans('site.AdminQuoteAuthor') }}</th>
                            <th>{{ trans('site.AdminQuoteAuthorRU') }}</th>                            
                            <th>{{ trans('site.AdminQuoteDesc') }}</th>
                            <th>{{ trans('site.AdminQuoteDescRU') }}</th>
                            <th>Канал</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($quote)
                            @foreach($quote as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td class="table-img text-center">
                                        <img style="height: 105px;" src="{{ asset($row->file) }}" alt=""/>
                                    </td>
                                    <td class="table-title">
                                        <a href="{{ route('admin.quote.show', $row) }}">
                                            {{ $row->author}}
                                        </a>
                                    </td>
                                    <td class="table-title">
                                        <a href="{{ route('admin.quote.show', $row) }}">
                                            {{ $row->authorRu }}
                                        </a>
                                    </td>                                    
                                    <td class="table-title">
                                        <a href="{{ route('admin.quote.show', $row) }}">
                                            {{ $row->description }}
                                        </a>
                                    </td>
                                    <td class="table-title">
                                        <a href="{{ route('admin.quote.show', $row) }}">
                                            {{ $row->descriptionRu }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $row->channel()->first()->getNameOne()}}                                     
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{ route('admin.quote.show', $row) }}">
                                            {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-default" href="{{ route('admin.quote.edit', $row) }}">
                                            {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        {!! Form::open(['route' => ['admin.quote.destroy', $row], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                        <button type="submit" class="btn btn-default">
                                            {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
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
                    { "orderable": false, "targets": 1 },
                    { "orderable": false, "targets": 5 }
                ]
            });
        } );
    </script>
@endsection
