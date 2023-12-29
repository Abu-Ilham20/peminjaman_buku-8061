@extends('layout.mainlayout')

@section('title', 'Add Category')

@section('content')
    <h1>Add New Category</h1>

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
        <form action="category-add" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="id" placeholder="input name here" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" name="" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
