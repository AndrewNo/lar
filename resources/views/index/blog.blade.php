@extends('index.base')

@section('content')
    <div class="content">
        @foreach($posts as $post)
            <a href="/blog/{{ $post->id }}"><h1>{{ $post->title }}</h1></a>
            <p>{!! $post->content !!}</p>
            <p>{{  $post->created_at }}</p>
        @endforeach
    </div>
@stop