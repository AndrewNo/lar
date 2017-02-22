@extends('index.base')

@section('content')
    <div class="content">
        <h1>{{$post->title}}</h1>
        {!! $post->content !!}
        <p>{{ date('d/m/Y', strtotime($post->created_at)) }} <i>{{ date('H:i', strtotime($post->created_at)) }}</i></p>

    </div>

@stop