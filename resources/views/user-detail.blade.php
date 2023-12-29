@extends('layout.mainlayout')

@section('title', 'User Detail')

@section('content')
    <h1>Data Users Detail</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary me-4">Back</a>
        @if ($user->status == 'inactive')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-info">Approved User</a>
        @endif
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5 w-50">
        <div class="mb-3">
            <label for="" class="form-label">User Name :</label>
            <input type="text" readonly class="form-control" value="{{ $user->username }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone Number:</label>
            <input type="text" readonly class="form-control" value="{{ $user->phone }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">User Name :</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control" readonly>
                {{ $user->address }}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Status:</label>
            <input type="text" readonly class="form-control" value="{{ $user->status }}">
        </div>
    </div>
@endsection
