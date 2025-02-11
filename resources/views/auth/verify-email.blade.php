@if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        Ti è stata appena inviata una mail di verifica!
    </div>
@endif

<form action="{{ route('verification.send') }}" method="POST">
    @csrf
    <button type="submit">Reinvia Email</button>
</form>
<hr>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
