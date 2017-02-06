@extends('index.base')

@section('content')
    <div class="row">
        <nav>
            <ul class="nav nav-pills">
                @foreach($categories as $category)
                    <li><a href="/shop/category/{{ $category->alias }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>



    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-4">
                <h2>{{ $product->title }}</h2>
                @foreach($product->images as $image)
                    @if($image->type == 'main')
                        <img src="{{ $image->image }}" alt="" width="250" height="250">
                    @endif
                @endforeach
                <p>{{ $product->descr }}</p>
                <p><a class="btn btn-primary" href="/shop/{{ $product->id }}" role="button">View details &raquo;</a></p>
            </div>
        @endforeach

    </div>
@stop