@extends('layout')

@section('content')
<div class="h-full p-4 w-full bg-gradient-to-r from-green-400 to-blue-500">
    <div class="flex justify-between text-white items-center">
        <a href="/" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
            <img src="assets/icon_back.svg" class="opacity-100"/>
        </a>
        <h1 class="text-xl">{{ auth()->user()->email }}</h1>
        <a href="/logout" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
            <img src="assets/icn_logout.svg" class="opacity-100"/>
        </a>
    </div>
</div>

<section class="p-3">

    <h2 class="my-2 text-xl font-semibold text-gray-500">Modifier mon mot de passe</h2>
    <form class="section" action="/update-password" method="post">
        {{ csrf_field() }}

        <div class="field">
            <input class="form-control w-full mb-3 p-3 bg-white rounded-md border border-gray-300 @error('client_email') border-red-500 @enderror"" type="password" name="password" placeholder="Mot de passe">
            @if($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="field">
                <input class="form-control w-full mb-3 p-3 bg-white rounded-md border border-gray-300 @error('client_email') border-red-500 @enderror"" type="password" name="password_confirmation" placeholder="Confirmation du mot de passe">
            @if($errors->has('password_confirmation'))
                <p>{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>
        <button class="rounded-md w-full bg-blue-400 text-white h-10 mt-5" type="submit">Modifier</button>
    </form>

    <a href="/signup"><button class="rounded-md w-full bg-green-400 text-white h-10 mt-5" type="submit">Créer un admin</button></a>

</section>

@endsection
