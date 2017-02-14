@extends('index.base')
@section('content')

    <div class="content">
            <div class="fotorama" data-nav="thumbs">
                @foreach($images as $image)
                        <img class="slide" src="{{ $image->image }}" width="250"/>
                @endforeach
            </div>
    </div>


@stop