@extends('admin.base')

@section('content')

    <div class="page-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Content</td>
                <td>Is active</td>
                <td>Action</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title  }}</td>
                    <td>{{ $post->content }}</td>
                    @if($post->is_active)
                        <td>+</td>
                    @else
                        <td>-</td>
                    @endif
                    <td><a href="/admin/post-edit/{{ $post->id }}">Edit</a></td>
                    <td>
                        <form action="/admin/post-delete/{{ $post->id }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-group-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="page-header">
        <a href="/admin/post-add" class="btn btn-primary">New post</a>
    </div>
@stop