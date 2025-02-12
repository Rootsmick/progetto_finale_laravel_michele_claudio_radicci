<!doctype html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Verifica Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/assets/style.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column h-100">

    <body class="d-flex flex-column h-100">
        <div class="container">
            <header class="border-bottom lh-1 py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 ">
                        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/homepage">
                            <img height="48px" src="/black-logo.png">
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
            <div class="container py-4">
                <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                    <div class="container-fluid py-5">
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                Ti è appena stata inviata una nuova mail di verifica!
                            </div>
                        @else
                            <div class="mb-4 font-medium text-sm text-green-600">
                                Mail di verifica inviata con successo!
                            </div>
                        @endif

                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary btn-sm mt-3" type="submit">Reinvia Email</button>
                        </form>
                        <hr>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary btn-sm mt-3" type="submit">Logout</button>
                        </form>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm mt-3">Annulla</a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer py-5 mt-auto text-center text-body-secondary bg-body-tertiary">
            <p>Copyright 2025 Michele C. Radicci</p>
        </footer>
    </body>

</html>
