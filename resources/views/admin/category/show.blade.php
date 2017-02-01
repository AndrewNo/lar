@extends('admin.base');

@section('content')
    <div class="page-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Alias</td>
                <td>Action</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title  }}</td>
                    <td>{{ $category->alias }}</td>
                    <td><a href="/admin/category-edit/{{ $category->id }}">Edit</a></td>
                    <td>
                        <form action="/admin/category-delete/{{ $category->id }}" method="post">
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
        <a href="/admin/category-add" class="btn btn-primary">New category</a>
    </div>
@stop