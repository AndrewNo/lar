@extends('admin.base')

@section('content')
    <form action="category-store" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="control-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="alias" class="control-label">Alias:</label>
            <input type="text" name="alias" id="alias" class="form-control">
        </div>
        <div class="form-group">
            <label for="position" class="control-label">Position:</label>
            <input type="number" name="position" id="position" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>

    </form>
@stop