@extends('index.base')

@section('content')


    <div class="content">
        @foreach($posts as $post)
            <div class="blog_posts">
                <a href="/blog/{{ $post->id }}"><h1>{{ $post->title }}</h1></a>
                <p>{!! $post->content !!}</p>
                <p class="blog_posts_time">{{  $post->created_at }}</p>
            </div>
        @endforeach
    </div>

@stop