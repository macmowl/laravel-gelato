@extends('layout')

@section('content')
<div class="text-center flex flex-col h-screen justify-center items-center bg-gradient-to-r from-green-400 to-blue-500">
      <div class="absolute sm:relative sm:flex sm:flex-col sm:justify-center bottom-0 flex flex-col justify-self-center">
        <h1 id="logo">Gelato</h1>
        <div class="w-screen bg-gray-50 px-5 py-10 mt-10 sm:max-w-sm sm:rounded-md sm:shadow-2xl">
            <h2 class="text-left text-xl text-gray-700">Inscrire un utilisateur</h2>
          <form method="post" action="/signup" class="flex flex-col space-y-4">
            {{ csrf_field() }}
            <input
              type="text"
              placeholder="Entrer un pseudo"
              id="username"
              name="username"
              value="{{ old('username') }}"
              class="p-3 mt-10 rounded-md border border-gray-300 @error('username') border-red-500 @enderror"
              required
            />
            @if($errors->has('email'))
                <p class="text-red-500 text-left text-xs">{{ $errors->first('email') }}</p>
            @endif
            <input
              type="email"
              placeholder="Entrer un email"
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
              placeholder="Choisissez un mot de passe"
              id="password"
              name="password"
              class="p-3 rounded-md border border-gray-300 @error('email') border-red-500 @enderror"
              required
            />
            @if($errors->has('password'))
                <p class="text-red-500 text-left text-xs">{{ $errors->first('password') }}</p>
            @endif
            <input
              type="password"
              placeholder="Confirmer votre mot de passe"
              id="password_confirmation"
              name="password_confirmation"
              class="p-3 rounded-md border border-gray-300 @error('email') border-red-500 @enderror"
              required
            />
            @if($errors->has('password_confirmation'))
                <p class="text-red-500 text-left text-xs">{{ $errors->first('password_confirmation') }}</p>
            @endif
            <button type="submit" class="bg-blue-400 p-3 rounded-md text-white">Inscrire cet utilisateur</button>
          </form>
        </div>
      </div>
    </div>

@endsection
