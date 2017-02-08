@extends('index.base');

@section('content')
    <div class="jumbotron">
    @foreach($posts as $post)
            <a href="/blog/{{ $post->id }}"><h1>{{ $post->title }}</h1></a>
        {!! $post->content !!}
        <p>{{  $post->created_at }}</p>
    @endforeach
    </div>
@stop