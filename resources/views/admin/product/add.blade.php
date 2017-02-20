@extends('admin.base')

@section('content')
    <form action="product-store" method="post" class="form-group col-lg-6" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="control-label">Наименование:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="descr" class="control-label">Описание:</label>
            <textarea name="descr" id="descr" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="category_id" class="control-label">Категория:</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    @if($category->id != 0)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image" class="control-label">Основное изображение:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="add_photo" class="control-label">Дополнительные изображения (до 10 изображений):</label>
            <input name='add_photo[]' id="add_photo" type='file' multiple='true' min='1' max='10' class="form-control"/>
        </div>
        <div class="form-group">
            <label for="is_new" class="control-label">Новинка:</label>
            <input type="checkbox" name="is_new" id="is_new" class="checkbox-inline">
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Выставить товар на сайт:</label>
            <input type="checkbox" name="is_active" id="is_active" class="checkbox-inline">
        </div>
        <div class="form-group">
            <input type="submit" value="Создать" class="btn btn-primary">

        </div>
        <a href="/admin/shop" class="btn btn-primary">Назад</a>
    </form>

@stop