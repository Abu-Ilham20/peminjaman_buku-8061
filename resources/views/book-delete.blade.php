@extends('layout.mainlayout')

@section('title', 'Delete Book')

@section('content')
    <h2>Are you Sure to delete this book {{ $book->title }}?</h2>
    <div class="m-5">
        <a href="/book-destroy/{{ $book->slug }}" class="btn btn-danger me-5">Sure</a>
        <a href="/books" class="btn btn-info">Cancel</a>
    </div>
@endsection
