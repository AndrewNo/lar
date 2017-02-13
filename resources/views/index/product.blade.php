@extends('index.base')

@section('content')

    <div class="content">

        @include('index.categories')

        <div class="shop_product">
            <h2>{{ $product->title }}</h2>
            <div class="shop_product_one_container">
                <div class="shop_product_item_one_product">
                    @foreach($product->images as $image)
                        @if($image->type == 'main')
                            <img src="{{ $image->image }}" alt="" width="150" height="550">
                        @endif
                    @endforeach
                    @foreach($product->images as $image)
                        @if($image->type == 'cover')
                            <img src="{{ $image->image }}" alt="" width="150" height="250">
                        @endif
                    @endforeach
                </div>
                <div class="shop_product_item_one_product">
                    <p>{{ $product->descr }}</p>
                </div>
            </div>
            <div class="shop_order">
                <a class="a_btn" href="#" role="button" id="send">Заказать</a>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
    <div class="order">
        <div class="order_close">X</div>
        <form action="order-store" method="post" class="form-group col-lg-9">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="form-group">
                <label for="name" class="order_label">Имя:</label>
                <input type="text" name="name" id="name" class="contact_input">
            </div>
            <div class="form-group">
                <label for="phone" class="order_label">Телефон:</label>
                <input type="text" name="phone" id="phone" class="contact_input">
            </div>
            <div class="form-group">
                <label for="email" class="order_label">E-mail:</label>
                <input type="text" name="email" id="email" class="contact_input">
            </div>
            <div class="form-group">
                <label for="city" class="order_label">Город:</label>
                <input type="text" name="city" id="city" class="contact_input">
            </div>
            <div class="form-group">
                <label for="comment" class="order_label">Комментарий:</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="contact_input"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Заказать" class="contact_btn">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#send').on('click', function (e) {
                e.preventDefault();
                document.body.scrollTop = 0;
                $('.order').css({
                    'display': 'block', 'position': 'absolute', 'top': '20%', 'left': '30%', 'width': '900px'
                });
                $('body').css({'background-color': 'gray'});

            });

            $('.order_close').on('click', function () {
                $('.order').css({'display': 'none'});
                $('body').css({'background-color': 'white'});
            });
            $(document).keydown(function(e) {

                if( e.keyCode === 27 ) {

                    $('.order').css({'display': 'none'});
                    $('body').css({'background-color': 'white'});

                }

            });

        });
    </script>
@stop