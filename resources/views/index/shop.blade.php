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
                <img src="{{ $product->image }}" alt="">
                <p>{{ $product->descr }}</p>
                <p><a class="btn btn-primary" href="/shop/{{ $product->id }}" role="button">View details &raquo;</a></p>
            </div>
        @endforeach

    </div>
@stop