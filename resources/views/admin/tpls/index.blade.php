@extends('admin.base')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Admin Panel</h1>
    </div>
    @if(Session::has('message'))
        <div class="alert-info" style="width: 500px; height: 150px; margin: 0 auto;
text-align: center; padding-top: 50px; font-size: 20px;">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <form action="{{ url('admin/') }}/update/1" method="post" class="form-group col-lg-6">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <h2>Index page:</h2>
            <textarea name="index"  class="tiny" cols="30" rows="10">{{ $page->index
            }}</textarea>
        </div>
        <div class="form-group">
            <h2>About page:</h2>
            <textarea name="about" class="tiny" cols="30" rows="10">{{ $page->about
            }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary">
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