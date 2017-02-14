@extends('index.base')

@section('content')

    <div class="content">
        @if(Session::has('message'))
            <div class="alert-info" style="width: 500px; height: 150px; margin: 0 auto;
text-align: center; padding-top: 50px; font-size: 20px;">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
        <div class="contact_great">
            <p>Отправьте мне сообщение:</p>
        </div>
        <form action="/contact/store" method="post" class="contact_form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="contact_label">Имя:</label>
                <input type="text" name="name" id="name" class="contact_input">
            </div>

            <div class="form-group">
                <label for="email" class="contact_label">E-mail:</label>
                <input type="text" name="email" id="email" class="contact_input">
            </div>
            <div class="form-group">
                <label for="comment" class="contact_label">Сообщение:</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="contact_input"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Отправить сообщение" class="contact_btn">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-info').hide('slow')
            }, 3000);
        });
    </script>
@stop