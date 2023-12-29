@extends('layout.mainlayout')

@section('title', 'Users Add')

@section('content')
    <h1>User List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/users-banned" class="btn btn-warning me-3">Show Banned User</a>
        <a href="/registered-users" class="btn btn-primary">Registered User</a>
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
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}" class="btn btn-info">Details</a>
                            <a href="/user-ban/{{ $item->slug }}" class="btn btn-danger">Ban User</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
