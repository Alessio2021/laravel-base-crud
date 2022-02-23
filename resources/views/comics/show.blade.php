@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                 <h1>{{ $keyboard->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <img class="fluid-img" src=" {{$keyboard->photo }}" alt="{{$keyboard->name}}">
            </div>
            <div class="col">
              <div>{{ $keyboard->features }}</div>
              <div><h2>{{  $keyboard->price }} €</h2></div>
            </div>
        </div>
    </div>
   
@endsection