<!doctype html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Blog Template · Bootstrap v5.3</title>
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
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/">
                        <img height="48px" src="black-logo.png" width="100px" height="auto">
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary mx-2" href="#">Registrati</a>
                    <a class="btn btn-sm btn-outline-secondary mx-2" href="#">Entra</a>
                    <span>Benvenuto, Tizio</span>
                    <a class="btn btn-sm btn-outline-secondary mx-2" href="#">Logout</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                <a class="nav-item nav-link link-body-emphasis active" href="#">World</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">U.S.</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Technology</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Culture</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Politics</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Opinion</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Science</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Health</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Style</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Travel</a>
            </nav>
        </div>
    </div>
    <main>

        <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

            <div class="container mt-5">
                <div class="align-middle gap-2 d-flex justify-content-between">
                    <h3>Elenco Articoli inseriti</h3>
                    <form class="d-flex" role="search" action="#" method="POST">
                        <input class="form-control me-2" name="search" type="search" placeholder="Cerca Articolo"
                            aria-label="Search">
                    </form>
                    <a href="/create" type="button" class="btn btn btn-success me-md-2">
                        Crea Nuovo Articolo
                    </a>
                </div>
                <table class="table border mt-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Corpo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $i => $article)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>
                                    {{ $article->name }}
                                </td>
                                <td>{{ $article->body }}</td>
                                <td>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                        <a href="#" class="btn btn-primary me-md-2">
                                            Visualizza
                                        </a>
                                        <a href="/edit/{{ $article->id }}" class="btn btn-warning me-md-2">
                                            Modifica
                                        </a>
                                        <button type="button" class="btn btn-danger me-md-2">Elimina</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <footer class="footer py-5 mt-auto text-center text-body-secondary bg-body-tertiary">
        <p>Copyright</p>
    </footer>
</body>

</html>
