@extends('index.base')
@section('content')

    <div class="content">

            @foreach($images as $image)

                <img class="slide" src="{{ $image->image }}" width="250"/>

            @endforeach

    </div>

@stop