<h1>Conferma Password</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('password.confirm.store') }}" method="POST">
    @csrf
    <label for="password">Conferma Password</label>
    <input type="password" name="password" id="password">


    <button type="submit">Conferma Password</button>
</form>
