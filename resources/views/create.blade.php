<!doctype html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Crea Articolo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/assets/style.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 ">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/homepage">
                        <img height="48px" src="black-logo.png">
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @if (!Auth::user())
                        <a class="btn btn-sm btn-outline-secondary mx-2" href="register">Registrati</a>
                        <a class="btn btn-sm btn-outline-secondary mx-2" href="login">Entra</a>
                    @else
                        <div class="dropdown-center">
                            <a href="#" class="dropdown-toggle text-decoration-none text-dark"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/edit-profile"
                                        class="dropdown-item text-decoration-none text-dark">Modifica
                                        Profilo</a></li>
                            </ul>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-secondary mx-2" type="submit">Logout</button>
                        </form>
                    @endif
                    <!-- <a class="btn btn-sm btn-outline-secondary mx-2" href="#">Logout</a>-->
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                <a class="nav-item nav-link link-body-emphasis active" href="/homepage">Home</a>
            </nav>
        </div>
    </div>
    <main>
        <div class="px-4 px-md-5 mb-5">

            <div class="row gx-5 justify-content-center ">
                <div class="col-lg-8 col-xl-6 border p-5 rounded">
                    <form action="/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" id="name" value="{{ old('name') }}" name="name"
                                type="text" placeholder="Nome" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="duration" id="duration" value="{{ old('duration') }}"
                                placeholder="Duration" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="synopsis" rows="10" id="synopsis" placeholder="Synopsis" required>{{ old('synopsis') }}</textarea>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-lg my-2"
                                type="submit">Annulla</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
    <footer class="footer py-5 mt-auto text-center text-body-secondary bg-body-tertiary">
        <p>Copyright 2025 Michele C. Radicci</p>
    </footer>
</body>

</html>
