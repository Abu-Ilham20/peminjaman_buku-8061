@extends('layout.mainlayout')

@section('title', 'Edit Book')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Book</h1>

    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="book_code" class="form-label">Code Book</label>
                <input type="text" name="book_code" id="id" class="form-control" value="{{ $book->book_code }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="id" class="form-control" value="{{ $book->title }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="CurrentImage">Current image</label>
                @if ($book->cover != '')
                    <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="" height="100px" width="100px">
                @else
                    <img src="{{ asset('image/notfound.jpeg') }}" alt="" height="100px" width="100px">
                @endif
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="CurrentCategory">Current Category</label>
                <ul>
                    @foreach ($book->categories as $categories)
                        <li>{{ $categories->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-3">
                <button type="submit" name="" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection
