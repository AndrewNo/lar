@extends('admin.base')

@section('content')
    <form action="{{ url('admin/') }}/product-update/{{ $product->id }}" method="post" class="form-group col-lg-6"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="title" class="control-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}">
        </div>

        <div class="form-group">
            <label for="descr" class="control-label">Description:</label>
            <textarea name="descr" id="descr" cols="30" rows="10" class="form-control">{{ $product->descr }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id" class="control-label">Category:</label>

            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{
                    $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <img src="{{ $product->image }}" alt="">
            <label for="image" class="control-label">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_new" class="control-label">Is new:</label>
            <input type="checkbox" name="is_new" id="is_new" class="checkbox-inline"
                   @if($product->is_new) checked @endif>
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Is active:</label>
            <input type="checkbox" name="is_active" id="is_active" class="checkbox-inline" @if($product->is_active)
            checked @endif>
        </div>
        <div class="form-group">
            <label for="position" class="control-label">Position:</label>
            <input type="number" name="position" id="position" class="form-control" value="{{ $product->position }}">
        </div>
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
@stop