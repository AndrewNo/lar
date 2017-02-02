@extends('index.base')

@section('content')
    <h1>{{$post->title}}</h1>
    {!! $post->content !!}
    <p>{{ $post->created_at }}</p>
@stop