@extends('admin.base')

@section('content')
    <form action="{{ url('admin/') }}/product-update/{{ $product->id }}" method="post" class="form-group col-lg-6"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="title" class="control-label">Наименование:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}">
        </div>

        <div class="form-group">
            <label for="descr" class="control-label">Описание:</label>
            <textarea name="descr" id="descr" cols="30" rows="10" class="form-control">{{ $product->descr }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id" class="control-label">Категория:</label>

            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{
                    $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">

            <label for="image" class="control-label">Основное изображение:</label>
            @foreach($main_pic as $item)
                <img src="{{ $item->image }}" alt="" width="250" style="display: block; margin-bottom: 10px;">
                <input type="hidden" name="main_id" value="{{ $item->id }}">
            @endforeach
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="add_photo" class="control-label">Дополнительные изображения (можно выбрать до 10 файлов)
                :</label>
            <input name='add_photo[]' id="add_photo" type='file' multiple='true' min='1' max='10' class="form-control"/>
        </div>
        <div class="form-group">
            <label for="is_new" class="control-label">Новинка:</label>
            <input type="checkbox" name="is_new" id="is_new" class="checkbox-inline"
                   @if($product->is_new) checked @endif>
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Выставить товар на витрину:</label>
            <input type="checkbox" name="is_active" id="is_active" class="checkbox-inline" @if($product->is_active)
            checked @endif>
        </div>
        <div class="form-group">
            <label for="position" class="control-label">Позиция:</label>
            <input type="number" name="position" id="position" class="form-control" value="{{ $product->position }}">
        </div>
        <div class="form-group">
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </div>
        <a href="/admin/shop" class="btn btn-primary">Назад</a>
    </form>
    <p>Дополнительные изображения:</p>
    @foreach($cover as $item)
        <form action="/admin/img-delete/{{ $item->id }}" method="post">
            <img src="{{ $item->image }}" alt="" width="150">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn-danger btn-sm del">Удалить</button>
        </form>
        <hr>
    @endforeach
    <script>
        $(document).ready(function () {

            $('.del').on('click', function (e) {
                if (!confirm('Вы уверены, что хотите удалить позицию?')){
                    e.preventDefault();
                }

            });
        });
    </script>
@stop