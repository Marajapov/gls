@extends('Front::layouts.default')
@section('title', $channel->getDisplay() . ' posts')

@section('content')

    @foreach($channel->posts as $post)
        <div>
            <h3><a href="{{ route('front.post',$post) }}">{{ $post->getName() }}</a> </h3>
        </div>
        <hr>
    @endforeach

@stop
