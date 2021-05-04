@extends('layout')

@section('content')

<section class="section">
    <h1>Mon compte</h1>
    <a href="/logout" class="btn btn-primary">Se déconnecter</a>
</section>
<section class="section">
    <h2>Modifier mon mot de passe</h2>
    <form class="section" action="/update-password" method="post">
        {{ csrf_field() }}

        <div class="field">
            <input class="input" type="password" name="password" placeholder="Mot de passe">
            @if($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="field">
                <input class="input" type="password" name="password_confirmation" placeholder="Confirmation du mot de passe">
            @if($errors->has('password_confirmation'))
                <p>{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button class="btn btn-secondary" type="submit">Modifier mon mot de passe</button>
            </div>
        </div>
    </form>

</section>

@endsection