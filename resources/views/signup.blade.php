@extends('layout')

@section('content')

    <section class="section">
        <h1>Gelato</h1>
        <form action="/signup" method="post">
            {{ csrf_field() }}
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <p>{{ $errors->first('email') }}</p>
            @endif
            <input type="password" name="password" placeholder="Mot de passe">
            @if($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
            @endif
            <input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)">
            @if($errors->has('password_confirmation'))
                <p>{{ $errors->first('password_confirmation') }}</p>
            @endif
            <input type="submit" value="S'inscrire">
        </form>
    
    </section>

@endsection