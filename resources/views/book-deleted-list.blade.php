@extends('layout.mainlayout')

@section('title', 'Deleted Book List')

@section('content')
    <h1 class="mb-5">Book Deleted List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/books" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Cover</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedBooks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="storage/cover/{{ $item->cover }}" alt="" height="100px" width="100px"></td>
                        <td>
                            <a href="book-restore/{{ $item->slug }}" class="btn btn-info">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
