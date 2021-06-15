<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom_css')
    <title>@yield('title')</title>
</head>
<body>
    <div class="row">
    <div class="col-lg-6 mx-auto">
    <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">TronS</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-2 ms-md-4">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('contacts.index')}}">Весь список</a>
        <form class="d-inline-flex" method="get" action="{{route('search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>
    </header>
        @include('inc.massege')
        </div>
        </div>
        @yield('content')
</body>
</html>