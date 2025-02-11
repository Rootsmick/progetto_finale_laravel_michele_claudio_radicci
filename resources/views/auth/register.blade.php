<h1>Pagina di Registrazione</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <label for="password_confirmation">Conferma Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation">
    <button type="submit">Registrati</button>
</form>
<hr>
<a href="{{ route('login') }}">Già Registrato? Clicca qui</a>
<hr>
<a href="/">Torna indietro</a>
