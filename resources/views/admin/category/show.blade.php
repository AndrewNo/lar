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
                @if($category->id != 0)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title  }}</td>
                    <td>{{ $category->alias }}</td>
                    <td><a href="" data-position = "down" data-id= "{{ $category->id }}" class="position">&#8681;</a> <a data-position = "up" data-id= "{{ $category->id }}" class="position" href="">&#8679;</a></td>
                    <td><a href="/admin/category-edit/{{ $category->id }}">Редактировать</a></td>
                    <td>
                        <form action="/admin/category-delete/{{ $category->id }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-group-sm btn-danger del">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endif
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

            $('.position').on('click', function (e) {
                e.preventDefault();

                $.ajax('/admin/categories', {

                    method: 'POST',
                    data: {
                        id: $(this).attr('data-id'),
                        position: $(this).attr('data-position'),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (obj) {
                        if (obj == 'ok'){
                            location.reload();
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }

                });

            });
        });
    </script>
@stop