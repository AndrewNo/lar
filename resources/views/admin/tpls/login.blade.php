@extends('admin.base');

@section('content')
    <form action="login" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Войти">
        </div>
        @include('admin.tpls.errors')
    </form>
@stop