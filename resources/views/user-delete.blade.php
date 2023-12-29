@extends('layout.mainlayout')

@section('title', 'Delete User')

@section('content')
    <h2>Are you Sure to Banned this User {{ $user->username }}?</h2>
    <div class="m-5">
        <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger me-5">Sure</a>
        <a href="/users" class="btn btn-info">Cancel</a>
    </div>
@endsection
