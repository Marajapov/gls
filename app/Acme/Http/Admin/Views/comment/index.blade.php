@extends('Admin::layouts.default')
@section('title', trans('site.Comments'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
@endsection

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">
                    <h4>{{ trans('site.Comments') }}</h4>
                </div>

                <div class="x_content">

                    <table id="example" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]' data-page-length='10'>

                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Статус</th>
                            <th>Автор</th>
                            <th>Email</th>
                            <th>Ресурс</th>
                            <th>{{ trans('site.AdminPostCreatedDate') }}</th>
                            <th>Действия</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($comments as $comment)
                            <tr class="@if($comment->approved == 0) danger @else success @endif">
                                <td class="table-title text-center">
                                    {{ $comment->id }}
                                </td>
                                <td class="text-center">
                                    @if($comment->approved == 0)
                                        <p>не опубликован</p>

                                        {!! Form::open(['route' => ['admin.comment.approve', $comment->id],'class'=>'form-publish', 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                        <input type="hidden" value="{{ $comment->id }}" name="commentId">

                                        <button class="btn btn-labeled btn-success btn-publish" type="submit">опубликовать</button>
                                        {!! Form::close() !!}
                                    @else
                                        <p>опубликован</p>

                                        {!! Form::open(['route' => ['admin.comment.deny', $comment->id],'class'=>'form-publish', 'method' => 'get', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                        <input type="hidden" value="{{ $comment->id }}" name="commentId">

                                        <button class="btn btn-labeled btn-danger btn-publish" type="submit">Снять</button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                <td>
                                    {{ $comment->author }}
                                </td>
                                <td>
                                    {{ $comment->email }}
                                </td>
                                <td>
                                    {{ $comment->resourceType }}
                                </td>
                                <td>
                                    {{ $comment->getDateFormatted() }}
                                </td>

                                <td>
                                    <a class="btn btn-default" href="{{ route('admin.comment.show', $comment) }}">
                                        {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-default" href="{{ route('admin.comment.edit', $comment) }}">
                                        {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    {!! Form::open(['route' => ['admin.comment.destroy', $comment], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                                    <button type="submit" class="btn btn-default">
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
                    { "orderable": false, "targets": 6 }
                ]
            });
        } );
    </script>
@endsection



