@extends('admin.base')

@section('content')
    <div class="jumbotron">
        <h1>Добро пожаловать в Админ Панель</h1>
    </div>
    @if(Session::has('message'))
        <div class="alert-info" style="width: 500px; height: 150px; margin: 0 auto;
text-align: center; padding-top: 50px; font-size: 20px;">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <form action="{{ url('admin/') }}/update/1" method="post" class="form-group">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <h2>Главная страница:</h2>
            <textarea name="index"  class="tiny" cols="30" rows="30">{{ $page->index
            }}</textarea>
        </div>
        <div class="form-group">
            <h2>Страница "О себе":</h2>
            <textarea name="about" class="tiny" cols="30" rows="30">{{ $page->about
            }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </div>

    </form>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-info').hide('slow')
            }, 3000);
        });
    </script>
@stop