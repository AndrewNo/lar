@extends('admin.base')

@section('content')
    <form action="{{ url('admin/') }}/category-update/{{ $category->id }}" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="title" class="control-label">Название:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
        </div>

        <div class="form-group">
            <label for="alias" class="control-label">Ссылка (должна быть уникальна и латиницей):</label>
            <input type="text" name="alias" id="alias" class="form-control" value="{{ $category->alias }}">
        </div>
        <div class="form-group">
            <label for="position" class="control-label">Позиция:</label>
            <input type="number" name="position" id="position" class="form-control" value="{{ $category->position }}">
        </div>
        <div class="form-group">
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </div>
        <a href="/admin/categories" class="btn btn-primary">Назад</a>
    </form>
@stop