@extends('Admin::layouts.default')
@section('title', "Posts")

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
@endsection

@section('content')
  <div class="row modals">

    <div class="x_panel">

      <div class="x_title clearfix">
        <h4>{{ trans('site.Articles') }}</h4>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success pull-right">
          <i class="fa fa-plus"></i>
          {{ trans('site.NewArticle') }}
        </a>
      </div>

      <div class="x_content clearfix">

        <table id="example" class="table table-striped table-bordered" data-order='[[ 0, "desc" ]]' data-page-length='10'>
          <thead>
            <tr>
              <th class="text-center">ID</th>
              {{--<th>Миниатюра</th>--}}
              <th>{{ trans('site.TitleKG') }}</th>
              <th>{{ trans('site.TitleRU') }}</th>
              <th class="hidden-xs">Автор</th>
              <th class="hidden-xs">Дата добавления</th>
              <th class="hidden-xs">На главном(6)</th>
              <th class="hidden-xs">Статус</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $key => $post)
              <tr>
                <td class="table-title text-center">
                  {{ $post->id }}
                </td>
                {{--<td class="table-img">--}}
                  {{--<img src="{{ asset($post->thumbnail) }}" alt=""/>--}}
                {{--</td>--}}
                <td class="table-title">
                  <a href="{{ route('admin.post.show', $post) }}">
                    {{ $post->getTitle() }}
                  </a>
                </td>
                <td class="table-title">
                  <a href="{{ route('admin.post.show', $post) }}">
                    {{ $post->getTitleRu() }}
                  </a>
                </td>
                <td class="hidden-xs">{{ $post->owner()->first()->name }}</td>
                <td class="hidden-xs">{{ $post->getTime().', '.$post->getDateFormatted() }} </td>
                <td>
                  @if(($post->number) > 0 && ($post->number) != 99 && ($post->number) != 88)
                    {!! Form::open(['route' => ['admin.post.unnumber', $post], 'method' => 'GET', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <div class="input-group">
                      <input type="text" style="width:100px;" disabled="disabled" value="{{ $post->number}}" class="form-control">
                      <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">Убрать!</button>
                      </span>
                    </div>
                    {!! Form::close() !!}
                  @elseif(($post->numberRu) > 0 && ($post->numberRu) != 99 && ($post->numberRu) != 88)
                    {!! Form::open(['route' => ['admin.post.unnumber', $post], 'method' => 'GET', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <div class="input-group">
                      <input type="text" style="width:100px;" disabled="disabled" value="{{ $post->numberRu}}" class="form-control">
                      <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">Убрать!</button>
                      </span>
                    </div>
                    {!! Form::close() !!}
                  @else
                    {!! Form::open(['route' => ['admin.post.number', $post], 'method' => 'GET', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <div class="input-group">
                      <input name="number" style="width:100px;" type="text" class="form-control">
                      <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">Ок!</button>
                      </span>
                    </div>
                    {!! Form::close() !!}
                  @endif
                </td>
                <td class="hidden-xs">
                  @if($post->published == '1')
                    опубликован
                  @elseif($post->published == '0')
                    не опубликован
                  @endif
                </td>
                <td>
                  <a class="btn btn-default" href="{{ route('admin.post.show', $post) }}">
                    {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
                    <i class="fa fa-eye"></i>
                  </a>
                  <a class="btn btn-default" href="{{ route('admin.post.edit', $post) }}">
                    {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                    <i class="fa fa-pencil"></i>
                  </a>
                  {!! Form::open(['route' => ['admin.post.destroy', $post], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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
          { "orderable": false, "targets": 5 },
          { "orderable": false, "targets": 7 }
        ]
      });
    } );
  </script>
@endsection

