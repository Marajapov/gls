@extends('Admin::layouts.default')
@section('title', trans('site.Reporter'))

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
@endsection

@section('content')
  <div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title clearfix">
          <h4>{{ trans('site.Reporter') }}</h4>
        </div>

        <div class="x_content">

          <table id="example" class="table table-bordered table-striped" data-order='[[ 3, "asc" ]]' data-page-length='10'>

            <thead>
            <tr>
              <th>Автор</th>
              <th>Телефон / Email</th>
              <th>Медиа</th>
              <th>{{ trans('site.AdminPostCreatedDate') }}</th>
              <th>Действия</th>
            </tr>
            </thead>

            <tbody>
              @foreach($peopleReporters as $peopleReporter)
                <tr class="@if(!$peopleReporter->isPublished()) danger @else primary @endif">
                  <td class="table-title">
                    {{ $peopleReporter->getName() }}
                  </td>
                  <td class="table-title">
                    {{ $peopleReporter->getNameRu() }}
                  </td>
                  <td class="media-content">
                    @if($peopleReporter->thumbnail)
                      <i class="fa fa-photo"></i>
                    @endif
                    @if($peopleReporter->video)
                      <i class="fa fa-video-camera"></i>
                    @endif
                  </td>
                  <td>
                    {{ $peopleReporter->getDateFormatted() }}
                  </td>
                  <td>
                    <a class="btn btn-default" href="{{ route('admin.peopleReporter.show', $peopleReporter) }}">
                      {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                      <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-default" href="{{ route('admin.peopleReporter.edit', $peopleReporter) }}">
                      {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                      <i class="fa fa-pencil"></i>
                    </a>
                    {!! Form::open(['route' => ['admin.peopleReporter.destroy', $peopleReporter], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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
          { "orderable": false, "targets": 2 },
          { "orderable": false, "targets": 4 }
        ]
      });
    } );
  </script>
@endsection


