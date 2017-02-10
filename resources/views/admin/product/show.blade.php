@extends('admin.base')

@section('content')
    @if(Session::has('message'))
        <div class="alert-info" style="width: 500px; height: 150px; margin: 0 auto;
text-align: center; padding-top: 50px; font-size: 20px;">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <div class="page-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Наименование</td>
                <td>Изображение</td>
                <td>Описание</td>
                <td>Категория</td>
                <td>Новинка</td>
                <td>Позиция</td>
                <td>Действие</td>
                <td>Действие</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title  }}</td>
                    @foreach($product->images as $image)
                        @if($image->type == 'main')
                    <td><img src="{{$image->image}} " alt="" width="150"></td>
                        @endif
                    @endforeach
                    <td>{{ $product->descr }}</td>
                    <td>{{ $product->category->title  }}</td>
                    @if($product->is_new)
                        <td>+</td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{ $product->position }}</td>
                    <td><a href="/admin/product-edit/{{ $product->id }}">Редактировать</a></td>
                    <td>
                        <form action="/admin/product-delete/{{ $product->id }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-group-sm btn-danger del">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="page-header">
        <a href="/admin/product-add" class="btn btn-primary">Добавить изделие</a>
        <a href="/admin/product/store" class="btn btn-primary">Не опубликовыные изделия ({{ $store }})</a>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-info').hide('slow')
            }, 3000);

            $('.del').on('click', function (e) {
                if (!confirm('Вы уверены, что хотите удалить позицию?')){
                    e.preventDefault();
                }

            });
        });
    </script>
@stop