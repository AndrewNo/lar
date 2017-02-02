@extends('index.base')

@section('content')
    <div class="row">
        <div class="jumbotron">
            <p>Send me message:</p>
        </div>
        <form action="/contact/store" method="post" class="form-group col-lg-6">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="control-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">E-mail:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="comment" class="control-label">Comment:</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
            </div>
        </form>
    </div>
@stop