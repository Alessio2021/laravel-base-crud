@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <form action="{{ route('monitors.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
          <label for="genre" class="form-label">Genre</label>
          <input type="text" class="form-control" id="genre" name="genre">
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input type="number" class="form-control" id="photo" name="photo">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="number" class="form-control" id="description" name="description">
        </div>

        <input class="btn btn-primary" type="submit" value="Send">
      </form>
    </div>
  </div>
</div>
@endsection