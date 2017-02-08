@extends('index.base')
@section('content')

    <div class="row">

            @foreach($images as $image)

                <img class="slide" src="{{ $image->image }}" width="250"/>

            @endforeach

    </div>

@stop