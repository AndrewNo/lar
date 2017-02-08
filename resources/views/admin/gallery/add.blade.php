@extends('admin.base')

@section('content')
    <h1>Добавить изображения</h1>
    <form action="image-store" method="post" class="form-group col-lg-6" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="add_photo" class="control-label">Вы можете загрузить до 10 изображений:</label>
            <input name='add_photo[]' id="add_photo" type='file' multiple='true' min='1' max='10' class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" value="Добавить изображения" class="btn btn-primary">
        </div>
        <a href="/admin/gallery" class="btn btn-primary">Назад</a>
    </form>
@stop