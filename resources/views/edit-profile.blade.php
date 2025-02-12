<!doctype html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Modifica Profilo</title>
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
            <div class="container py-4">
                <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                    <div class="container-fluid py-5">

                        <h1 class="display-5 fw-bold text-center">Benvenuto, {{ Auth::user()->name }}</h1>
                        <h2 class="pt-5">Modifica Informazioni Base</h2>
                        <form class="form" action="{{ route('user-profile-information.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <lable for="name">User:</lable>
                            <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                                class="form-control w-25">
                            {{ $errors->updateProfileInformation->first('name') ?? '' }}
                            <lable for="email">E-mail</lable>
                            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                                class="form-control w-25 mb-3">
                            {{ $errors->updateProfileInformation->first('email') ?? '' }}
                            <button class="btn btn-sm btn-secondary" type="submit">Aggiorna Dati</button>
                        </form>
                        <hr>
                        <h2>Modifica Password</h2>
                        <form action="{{ route('user-password.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <lable for="current_password">Password Attuale</lable>
                            <input type="password" name="current_password" id="current_password"
                                class="form-control w-25">
                            {{ $errors->updatePassword->first('current_password') ?? '' }}
                            <lable for="password">Nuova Password</lable>
                            <input type="password" name="password" id="password" class="form-control w-25">
                            {{ $errors->updatePassword->first('password') ?? '' }}
                            <lable for="password_confirmation">Conferma Password</lable>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control w-25 mb-3">
                            {{ $errors->updatePassword->first('password_confirmation') ?? '' }}
                            <button class="btn btn-sm btn-secondary" type="submit">Modifica Password</button>
                        </form>
                        <hr>
                        <h2>Autenticazione a due fattori</h2>

                        @if (auth()->user()->two_factor_secret)
                            @if (Laravel\Fortify\Features::optionEnabled(Laravel\Fortify\Features::twoFactorAuthentication(), 'confirm'))
                                <span>Completa l'abilitazione della Autenticazione a due fattori</span>
                            @else
                                <span>Autenticazione a due Fattori Abilitata</span>
                            @endif
                        @else
                            <span>Autenticazione a due Fattori Disabilitata</span>
                        @endif

                        @if (auth()->user()->two_factor_secret)
                            @if (
                                !Laravel\Fortify\Features::optionEnabled(Laravel\Fortify\Features::twoFactorAuthentication(), 'confirm') ||
                                    auth()->user()->two_factor_confirmed_at)
                                <div class="mb-3">
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                                        <div>{{ $code }}</div>
                                    @endforeach
                                </div>
                            @else
                                @if (!auth()->user()->two_factor_confirmed_at)
                                    <div class="mb-3">
                                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                    </div>

                                    <form action="{{ route('two-factor.confirm') }}" method="POST">
                                        @csrf
                                        <input type="text" name="code" id="code"
                                            class="form-control w-25 mb-3">
                                        <button class="btn btn-sm btn-secondary mb-3" type="submit">Conferma
                                            Codice</button>
                                    </form>
                                @endif
                            @endif

                            <form action="{{ route('two-factor.disable') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-secondary" type="submit">Disabilita 2FA</button>
                            </form>
                        @else
                            <form action="{{ route('two-factor.enable') }}" method="POST" class="mb-3">
                                @csrf
                                <button class="btn btn-sm btn-secondary" type="submit">Abilita 2FA</button>
                            </form>
                        @endif




                        <hr>
                        <a class="btn btn-sm btn-secondary" href="{{ url()->previous() }}">Torna Indietro</a>
                    </div>
                </div>
            </div>

        </main>
        <footer class="footer py-5 mt-auto text-center text-body-secondary bg-body-tertiary">
            <p>Copyright 2025 Michele C. Radicci</p>
        </footer>
    </body>

</html>
