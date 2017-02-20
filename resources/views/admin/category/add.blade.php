@extends('admin.base')

@section('content')
    <form action="category-store" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="control-label">Название:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="alias" class="control-label">Ссылка (должна быть уникальна и латиницей):</label>
            <input type="text" name="alias" id="alias" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Создать" class="btn btn-primary">
        </div>
        <a href="/admin/categories" class="btn btn-primary">Назад</a>
    </form>
@stop