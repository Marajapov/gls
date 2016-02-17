@extends('Admin::layouts.default')
@section('title', "Banner")
@section('styles')
  <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
@endsection

@section('content')

<div class="row modals">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title clearfix">
				<h4>{{ trans('site.AdminBanners') }}</h4>
				<a href="{{ route('admin.banner.create') }}" class="btn btn-success pull-right">
					<i class="fa fa-plus"></i>
					{{ trans('site.AdminBannerNew') }}
				</a>
			</div>
			<div class="x_content">
				<table id="example" class="table table-bordered table-striped" data-order='[[ 1, "asc" ]]' data-page-length='10'>
		            <thead>
		              <tr>
		                <th>Название</th>
			            <th>Файл</th>
			            <th>{{ trans('site.AdminPostCreatedDate') }}</th>
		                <th>Расположение</th>
		                <th>Ссылка</th>
		                <th>Действия</th>
		              </tr>
		            </thead>
		            <tbody>
		            @foreach($banners as $banner)
		            	<tr class="@if($banner->published == 1) success @elseif($banner->published == 0) danger @endif">
		            		<td class="table-title">
		            			<a href="{{ route('admin.banner.show', $banner) }}">
				                  {{ $banner->name }}
				                </a>
		            		</td>
		            		<td class="table-img text-center">
		            			<a href="{{ route('admin.banner.show', $banner) }}">
				                  <img src="{{ asset($banner->file) }}" alt=""/>
				                </a>
		            		</td>
		            		<td>
				                {{ $banner->created_at }}
				            </td>
				            <td>
				            	@if($banner->positionTop == 1) Сверху 
				            	@elseif($banner->positionCenter == 1) По центру 
				            	@elseif($banner->positionRight == 1) Справа 
				            	@elseif($banner->positionLeft == 1) Слева 
				            	@elseif($banner->positionBottom == 1) Снизу 
				            	@endif
				            </td>
				            <td>
				                  {{ $banner->linkTo }}				                
				            </td>
				            <td>
				                <a class="btn btn-default" href="{{ route('admin.banner.show', $banner) }}">
				                  {{--<span class="glyphicon glyphicon-eye-open"></span>--}}
				                  <i class="fa fa-eye"></i>
				                </a>
				                <a class="btn btn-default" href="{{ route('admin.banner.edit', $banner) }}">
				                  {{--<span class="glyphicon glyphicon-pencil"></span>--}}
				                  <i class="fa fa-pencil"></i>
				                </a>
				                {!! Form::open(['route' => ['admin.banner.destroy', $banner], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
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
          { "orderable": false, "targets": 3 },
          { "orderable": false, "targets": 4 }
        ]
      });
    } );
  </script>
@endsection

