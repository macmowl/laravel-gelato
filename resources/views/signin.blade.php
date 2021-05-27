@extends('layout')

@section('content')

    <div class="text-center flex flex-col h-screen justify-center items-center bg-gradient-to-tl from-blue-400 to-blue-200">
      <div class="absolute sm:relative sm:flex sm:flex-col sm:justify-center bottom-0 flex flex-col justify-self-center">
        <h1 id="logo">Gelato</h1>
        <div class="w-screen bg-gray-50 px-5 py-10 mt-10 sm:max-w-sm sm:rounded-md sm:shadow-2xl">
            <h2 class="text-left text-xl text-gray-700">Connexion</h2>
          <form method="post" action="/signin" class="flex flex-col space-y-4">
          {{ csrf_field() }}
            <input
              type="email"
              placeholder="Entrer votre email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              class="p-3 mt-10 rounded-md border border-gray-300 @error('email') border-red-500 @enderror"
              required
            />
            @if($errors->has('email'))
                <p class="text-red-500 text-left text-xs">{{ $errors->first('email') }}</p>
            @endif
            <input
              type="password"
              placeholder="Entrer votre mot de passe"
              id="password"
              name="password"
              class="p-3 rounded-md border border-gray-300 @error('email') border-red-500 @enderror"
              required
            />
            @if($errors->has('password'))
                <p class="text-red-500 text-left text-xs">{{ $errors->first('password') }}</p>
            @endif
            <button type="submit" class="bg-blue-400 p-3 rounded-md text-white">Se connecter</button>
          </form>
        </div>
      </div>
    </div>

@endsection