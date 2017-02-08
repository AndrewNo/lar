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
                <td>Название</td>
                <td>Содержание</td>
                <td>Действие</td>
                <td>Действие</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title  }}</td>
                    <td>{!!  $post->content !!}</td>
                    <td><a href="/admin/post-edit/{{ $post->id }}">Редактировать</a></td>
                    <td>
                        <form action="/admin/post-delete/{{ $post->id }}" method="post">
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
        <a href="/admin/post-add" class="btn btn-primary">Новый пост</a>
        <a href="/admin/post/drafts" class="btn btn-primary">Черновики</a>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-info').hide('slow')
            }, 3000);

            $('.del').on('click', function (e) {
                if (!confirm('Вы уверены, что хотите удалить данный пост?')){
                    e.preventDefault();
                }

            });
        });
    </script>
@stop