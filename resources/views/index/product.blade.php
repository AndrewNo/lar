@extends('index.base')

@section('content')

    <div class="row">

            <div class="col-lg-12">
                <h2>{{ $product->title }}</h2>
                <img src="{{ $product->image }}" alt="">
                <p>{{ $product->descr }}</p>
                <p><a class="btn btn-primary" href="#" role="button" id="send">Order</a></p>
            </div>

            <div class="order" style="display: none">
                <form action="order-store" method="post" class="form-group col-lg-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">E-mail:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city" class="control-label">City:</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="comment" class="control-label">Comment:</label>
                        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Order" class="btn btn-primary">
                    </div>
                </form>
            </div>

    </div>

    <script>
        $(document).ready(function () {
            $('#send').on('click', function (e) {
                e.preventDefault();
                $('.order').css({'display': 'block', 'position': 'absolute', 'top': '20%', 'left': '30%', 'width':
                    '900px'});
                $('body').css({'background-color' : 'gray'});
            });
        });
    </script>
@stop