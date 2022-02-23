@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">Home</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                 <h1>{{ $comic->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <img class="fluid-img" src=" {{ $comic->photo }}" alt="{{$comic->title}}">
            </div>
            <div class="col">
              <div>{{ $comic->description }}</div>
              <div><h2>{{  $comic->price }} €</h2></div>
            </div>
        </div>
    </div>
@endsection