@extends('admin.base')

@section('content')
    <form action="post-store" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="control-label">Название:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="content" class="control-label">Содержание:</label>
            <textarea name="content" id="content" class="tiny" cols="30" rows="30"></textarea>
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Опубликовать:</label>
            <input type="checkbox" name="is_active" id="is_active" class="checkbox-inline">
        </div>
        <div class="form-group">
            <input type="submit" value="Создать" class="btn btn-primary">
        </div>
        <a href="/admin/blog" class="btn-primary btn">Назад</a>
    </form>
@stop