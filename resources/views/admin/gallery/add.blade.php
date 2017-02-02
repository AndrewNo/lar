@extends('admin.base')

@section('content')
    <h1>Add photos</h1>
    <form action="image-store" method="post" class="form-group col-lg-6" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="add_photo" class="control-label">You can upload 10 photos:</label>
            <input name='add_photo[]' id="add_photo" type='file' multiple='true' min='1' max='10' class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" value="Add photos" class="btn btn-primary">
        </div>
    </form>
@stop