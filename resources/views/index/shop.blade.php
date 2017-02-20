@extends('index.base')

@section('content')
    <div class="content">

        @include('index.categories')

        <div class="shop_product">
            <div class="shop_product_flex_container">

                @foreach($products as $product)
                    <div class="shop_product_item">
                        <h2>{{ $product->title }}</h2>
                        @if($product->is_new)
                        <img src="{{asset('/backgrounds/new.png')}}" alt="" class="product_new" style="position:
                        absolute; width: 150px">
                        @endif
                        @foreach($product->images as $image)
                            @if($image->type == 'main')
                                <img src="{{ $image->image }}" alt="">
                            @endif
                        @endforeach
                        <p>{{ $product->descr }}</p>
                        <a class="a_btn" href="/shop/{{ $product->id }}" role="button">Подробнее &raquo;</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop