@extends('layout.mainlayout')

@section('title', 'Books List')

@section('page-name', 'Dashboard')

@section('content')
    <h1>List Book</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="/book-show" class="btn btn-warning me-3">Show Deleted Data</a>
        <a href="/book-add" class="btn btn-primary">Add Data</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>cover</th>
                    <th>Categories</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="storage/cover/{{ $item->cover }}" alt="" width="100px" height="150px"></td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-edit/{{ $item->slug }}" class="btn btn-info">Edit</a>
                            <a href="/book-deleted/{{ $item->slug}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
