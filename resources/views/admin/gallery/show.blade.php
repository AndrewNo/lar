@extends('admin.base')

@section('content')
    <div class="page-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{$image->image}}" height="150" width="150" alt=""></td>
                    <td>
                        <form action="/admin/image-delete/{{ $image->id }}" method="post">
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
        <a href="/admin/image-add" class="btn btn-primary">New image</a>
    </div>
@stop
