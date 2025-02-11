<h1>Pagina di Login</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <button type="submit">Accedi</button>
</form>
<hr>
<a href="{{ route('password.request') }}">Password Dimenticata? Clicca qui</a>

<hr>
<a href="{{ route('register') }}">Non sei Registrato? Clicca qui</a>
<hr>
<a href="/">Torna indietro</a>
