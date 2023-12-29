<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Buku | @yield('title') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    <ul>
                        @if (Auth::user())
                            @if (Auth::user()->role_id == 1)
                                <a href="/dashboard"
                                    @if (request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                                <a href="/books" @if (request()->route()->uri == 'books' ||
                                        request()->route()->uri == 'book-add' ||
                                        request()->route()->uri == 'book-edit/{slug}' ||
                                        request()->route()->uri == 'book-deleted/{slug}') class="active" @endif>Books</a>
                                <a href="/categories"
                                    @if (request()->route()->uri == 'categories' ||
                                            request()->route()->uri == 'category-add' ||
                                            request()->route()->uri == 'category-show' ||
                                            request()->route()->uri == 'category-edit/{slug}' ||
                                            request()->route()->uri == 'category-delete/{slug}') class="active" @endif>Categories</a>
                                <a href="/users" @if (request()->route()->uri == 'users' ||
                                        request()->route()->uri == 'registered-users' ||
                                        request()->route()->uri == 'user-detail/{slug}' ||
                                        request()->route()->uri == 'user-approve/{slug}' ||
                                        request()->route()->uri == 'user-ban/{slug}' ||
                                        request()->route()->uri == 'users-banned') class="active" @endif>Users</a>
                                <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class="active" @endif>Rent
                                    Log</a>
                                <a href="/logout">Logout</a>
                            @else
                                <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                                <a href="/" @if (request()->route()->uri == '/') class="active" @endif>Book List</a>
                                <a href="/logout">Logout</a>
                            @endif
                        @else
                        <a href="/login" >Login</a>
                        @endif
                    </ul>
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
