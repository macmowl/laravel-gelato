@extends('layout')

@section('content')

    <section class="section">
        <h1>Formulaire de contact</h1>
        <form action="/signin" method="post">
            {{ csrf_field() }}
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <p>{{ $errors->first('email') }}</p>
            @endif
            <input type="password" name="password" id="password" placeholder="password">
            @if($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
            @endif
            <input type="submit" value="Se connecter">
        </form>
    </section>

@endsection