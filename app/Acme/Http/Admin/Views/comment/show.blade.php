@extends('Admin::layouts.default')

@section('title', trans('site.Comments'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')

    <div class="row modals">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title clearfix">

                    <h4>{{ trans('site.Info') }}</h4>

                    <a href="{{ route('admin.comment.index') }}" class="btn btn-default pull-right btn-back">{{ trans('site.Back') }}</a>

                    {!! Form::open(['route' => ['admin.comment.destroy', $comment], 'method' => 'DELETE', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}
                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="fa fa-times"></i>
                        {{ trans('site.Delete') }}
                    </button>
                    {!! Form::close() !!}

                    <a href="{{ route('admin.comment.edit', $comment) }}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i>
                        {{ trans('site.Change') }}
                    </a>

                </div>

                <div class="x_content post-info clearfix">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <p class="header">Автор</p>
                            <p class="body">
                                {{ $comment->author }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">Email</p>
                            <p class="body">
                                {{ $comment->email }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">Комментарий</p>
                            <p class="body">
                                <em>"{{ $comment->text }}"</em>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p class="header">Ресурс</p>
                            <p class="body text-uppercase">
                                @if($comment->resourceType == 'post')
                                    <a target="_blank" href="{{ route('front.post',$comment->resourceId) }}">{{ $comment->post()->first()->getTitleRuOrKg() }}</a>
                                @else
                                    <a target="_blank" href="{{ route('front.media.video',$comment->resourceId) }}">{{ $comment->media()->first()->getName() }}</a>
                                @endif
                            </p>
                        </li>

                        <li class="list-group-item">
                            <p class="header">Статус</p>
                            <p class="body">
                                @if($comment->approved == 0)
                                    не опубликован
                                @else
                                    опубликован
                                @endif
                            </p>
                        </li>


                        <li class="list-group-item">
                            <p class="header">{{ trans('site.AdminPostCreatedDate') }}</p>
                            <p class="body">
                                {{ $comment->getDateFormatted() }} {{ $comment->getTime() }}
                            </p>
                        </li>

                    </ul>

                </div>

            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        @if(session('success') == true)
            swal("Сделано!", "Ваши изменения сохранены!", "success");
        @endif
    </script>
@endsection