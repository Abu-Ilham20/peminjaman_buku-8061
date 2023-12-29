@extends('layout.mainlayout')

@section('title', 'Book List')

@section('content')

    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Title Book" name="title">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="my-5">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top"
                            src="{{ $book->cover != null ? asset('storage/cover/' . $book->cover) : asset('image/notfound.jpeg') }}"
                            alt="Card image cap" draggable="false">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->book_code }}</h5>
                            <p class="card-text">{{ $book->title }}</p>
                            <p
                                class="card-text text-end fw-bold {{ $book->status == 'in stock' ? 'text-success' : 'text-danger' }} ">
                                {{ $book->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
