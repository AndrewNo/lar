@extends('admin.base');

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
                <td>Название</td>
                <td>Ссылка</td>
                <td>Позиция</td>
                <td>Действие</td>
                <td>Действие</td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title  }}</td>
                    <td>{{ $category->alias }}</td>
                    <td>{{ $category->position }}</td>
                    <td><a href="/admin/category-edit/{{ $category->id }}">Редактировать</a></td>
                    <td>
                        <form action="/admin/category-delete/{{ $category->id }}" method="post">
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
        <a href="/admin/category-add" class="btn btn-primary">Добавить категорию</a>
    </div>

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-info').hide('slow')
            }, 3000);

            $('.del').on('click', function (e) {
                if (!confirm('Вы уверены, что хотите удалить данную категорию?')){
                    e.preventDefault();
                }

            });
        });
    </script>
@stop