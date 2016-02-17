@extends('Front::layouts.default')
@section('title', $channel->getDisplay())

@section('content')


    {{ $channel->getDisplay() }}

    <hr>
    <a href="{{ route('ktr.posts')  }}">КТР новости</a>

@stop
