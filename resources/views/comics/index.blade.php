@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
<div class="row container-fluid bg-info">
    <div class="row">
        <div class="col">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('comics.create') }}" class="btn btn-primary">Add new Comic</a>
        </div>
    </div>
    <div class="col">
    <div class="d-flex text-light flex-wrap justify-content-center">
        @foreach ($comic as $comics)
        <ul class="card w-25 bg-warning m-2 p-4 shadow-lg list-group">
            <li class="list-group-item">{{$comics->title}}</li>
            <li class="list-group-item">{{$comics->author}}</li>
            <li class="list-group-item">{{$comics->price}}</li>
            <li class="list-group-item">{{$comics->genre}}</li>
            <li class="list-group-item">{{$comics->photo}}</li>
            <li class="list-group-item">{{$comics->description}}</li>
            <li class="list-group-item d-flex justify-content-center">
                <a href="{{ route('comics.show', $comics->id) }}" class="btn btn-primary m-1">View</a>
                <a href="{{ route('comics.edit', $comics->id) }}" class="btn btn-primary m-1">Edit</a>
                <form action="{{ route('comics.destroy', $comics->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger m-1" type="submit" value="Delete">
                </form>
            </li>
        </ul>
        @endforeach
    </div>
</div>
    <div class="container-fluid bg-info row">
        <div class="col d-flex justify-content-center pt-4">
            {{$comic->links()}}
        </div>
    </div>
@endsection