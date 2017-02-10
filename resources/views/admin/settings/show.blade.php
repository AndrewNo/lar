@extends('admin.base')

@section('content')
    @if(Session::has('message'))
        <div class="alert-info" style="width: 500px; height: 150px; margin: 0 auto;
text-align: center; padding-top: 50px; font-size: 20px;">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <form action="{{ url('admin/') }}/settings-update/{{ $user->id }}" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="title" class="control-label">Логин:</label>
            <input type="text" name="login" id="title" class="form-control" value="{{ $user->login }}">
        </div>

        <div class="form-group">
            <label for="alias" class="control-label">E-mail:</label>
            <input type="text" name="email" id="alias" class="form-control" value="{{ $user->email }}">
        </div>
        <hr>
        <div class="form-group prepass">
            <p style="font-weight: 700; font-size: 20px; cursor: pointer" class="p_tit">Сменить пароль &#8681;</p>
            <p style="font-weight: 700; font-size: 20px; cursor: pointer; display: none" class="p_tit_2">Сменить пароль &#8679;</p>
        </div>
        <div class="pass" style="display: none">
            <div class="form-group">
                <label for="position" class="control-label">Старый пароль:</label>
                <input type="password" name="old_password" id="position" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="position" class="control-label">Новый пароль пароль:</label>
                <input type="password" name="new_password" id="position" class="form-control" value="">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </div>

        @include('admin.tpls.errors')
    </form>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-info').hide('slow')
            }, 3000);

            $('.p_tit').on('click', function () {
                $('.p_tit').hide();
                $('.p_tit_2').show();
                $('.pass').show('slow');
            });

            $('.p_tit_2').on('click', function () {
                $('.p_tit_2').hide();
                $('.p_tit').show();
                $('.pass').hide('slow');
            });

        });
    </script>
@stop