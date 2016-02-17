@extends('Admin::layouts.default')
@section('title', trans('site.AdminUserAlls') )

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
@endsection

@section('content')

  <div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title clearfix">
          <h4>{{ trans('site.AdminUserAlls') }}</h4>
          <a href="{{ route('admin.user.create') }}" class="btn btn-success pull-right">
            <i class="fa fa-plus"></i>
            {{ trans('site.AdminUserNew') }}
          </a>
        </div>

        <div class="x_content">

          <table id="example" class="table table-bordered table-striped" data-order='[[ 0, "asc" ]]' data-page-length='10'>

            <thead>
            <tr>
              <th>{{ trans('site.AdminUserName') }}</th>
              <th>E-mail</th>
              <th>Канал</th>
              <th>Роль</th>
              <th>Действия</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
              <tr>
                <td class="table-title">
                  <a href="{{ route('admin.user.show', $user) }}">
                    {{ $user->name }}
                  </a>
                </td>
                <td>
                  {{ $user->email }}
                </td>
                <td>
                  {{ $user->channel()->first()->display }}
                </td>
                <td>
                  {{ $user->role }}
                </td>
                <td>
                  <a class="btn btn-default" href="{{ route('admin.user.show', $user) }}">
                    {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                    <i class="fa fa-eye"></i>
                  </a>
                  <a class="btn btn-default" href="{{ route('admin.user.edit', $user) }}">
                    {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                    <i class="fa fa-pencil"></i>
                  </a>
                  {!! Form::open(['route' => ['admin.user.destroy', $user], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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
          { "orderable": false, "targets": 1 },
          { "orderable": false, "targets": 3 },
          { "orderable": false, "targets": 4 }
        ]
      });
    } );
  </script>
@endsection