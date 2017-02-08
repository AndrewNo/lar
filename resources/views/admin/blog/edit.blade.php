@extends('admin.base')

@section('content')
    <form action="{{ url('admin/') }}/post-update/{{ $post->id }}" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="title" class="control-label">Название:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="content" class="control-label">Содержание:</label>
            <textarea name="content" id="content" class="tiny" cols="30" rows="30">{{ $post->content
            }}</textarea>
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Опубликовать:</label>
            <input type="checkbox" name="is_active" id="is_active" class="checkbox-inline" @if($post->is_active)
            checked @endif >
        </div>
        <div class="form-group">
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </div>
        <a href="/admin/blog" class="btn-primary btn">Назад</a>
    </form>
@stop