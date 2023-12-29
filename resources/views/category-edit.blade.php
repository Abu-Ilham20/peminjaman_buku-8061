@extends('layout.mainlayout')

@section('title', 'Update Category')

@section('content')
    <h1>Update Category</h1>

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
        <form action="/category-edit/{{$category->slug}}" method="post">
            @csrf
            @method('put')
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="id" value="{{ $category->name }}" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" name="" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
