<!doctype html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Film</title>
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
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 ">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/">
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
                <a class="nav-item nav-link link-body-emphasis active" href="/">Home</a>
            </nav>
        </div>
    </div>
    <main>

        <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

            <div class="container mt-5">
                <div class="align-middle gap-2 d-flex justify-content-between">
                    <h3>Elenco Film inseriti</h3>
                    <form class="d-flex" role="search" action="/index" method="GET">
                        <input class="form-control me-2" type="search" name="name" id="query"
                            placeholder="Cerca Articolo" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">Cerca</button>
                    </form>
                    <a href="/create" type="button" class="btn btn btn-success me-md-2">
                        Crea Nuovo Film
                    </a>
                </div>
                <table class="table border mt-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Durata</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $i => $movie)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>
                                    {{ $movie->name }}
                                </td>
                                <td>{{ $movie->duration }}</td>

                                <td class="text-truncate" style="max-width: 150px;">
                                    {{ $movie->synopsis }}</td>
                                <td>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                        <a href="/show/{{ $movie->id }}" class="btn btn-primary me-md-2">
                                            Visualizza
                                        </a>
                                        <a href="/edit/{{ $movie->id }}" class="btn btn-warning me-md-2">
                                            Modifica
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ route('delete.movie', $movie->id) }}">
                                            Elimina
                                        </button>

                                        <div class="modal fade" id="deleteModal-{{ route('delete.movie', $movie->id) }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="deleteModal-{{ route('delete.movie', $movie->id) }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <form class="modal-content"
                                                    action="{{ route('delete.movie', $movie->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button class="btn btn-danger me-md-2"
                                                        type="submit">Elimina</button> --}}
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="deleteModal-{{ route('delete.movie', $movie->id) }}">
                                                            Cancella Articolo</h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Sicuro di voler cancellare il film? L'azione non è
                                                            reversibile</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Chiudi</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">Conferma</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
