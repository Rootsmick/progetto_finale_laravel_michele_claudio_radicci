<h1 class="display-5 fw-bold">Benvenuto, {{ Auth::user()->name }}</h1>
<h2>Modifica Informazioni Base</h2>
<form action="{{ route('user-profile-information.update') }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}">
    {{ $errors->updateProfileInformation->first('name') ?? '' }}
    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}">
    {{ $errors->updateProfileInformation->first('email') ?? '' }}
    <button type="submit">Aggiorna Dati</button>
</form>
<hr>
<h2>Modifica Password</h2>
<form action="{{ route('user-password.update') }}" method="POST">
    @csrf
    @method('PUT')
    <input type="password" name="current_password" id="current_password">
    {{ $errors->updatePassword->first('current_password') ?? '' }}
    <input type="password" name="password" id="password">
    {{ $errors->updatePassword->first('password') ?? '' }}
    <input type="password" name="password_confirmation" id="password_confirmation">
    {{ $errors->updatePassword->first('password_confirmation') ?? '' }}
    <button type="submit">Modifica Password</button>
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
        <div>
            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                <div>{{ $code }}</div>
            @endforeach
        </div>
    @else
        @if (!auth()->user()->two_factor_confirmed_at)
            <div>
                {!! auth()->user()->twoFactorQrCodeSvg() !!}
            </div>

            <form action="{{ route('two-factor.confirm') }}" method="POST">
                @csrf
                <input type="text" name="code" id="code">
                <button type="submit">Conferma</button>
            </form>
        @endif
    @endif

    <form action="{{ route('two-factor.disable') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Disabilita 2FA</button>
    </form>
@else
    <form action="{{ route('two-factor.enable') }}" method="POST">
        @csrf
        <button type="submit">Abilita 2FA</button>
    </form>
@endif




<hr>
<a href="/">Torna Indietro</a>
