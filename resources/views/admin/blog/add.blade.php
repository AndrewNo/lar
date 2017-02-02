@extends('admin.base')

@section('content')
    <form action="post-store" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="control-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="content" class="control-label">Content:</label>
            <textarea name="content" id="content" class="tiny" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Is active:</label>
            <input type="checkbox" name="is_active" id="is_active" class="checkbox-inline">
        </div>
        <div class="form-group">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>

    </form>
@stop