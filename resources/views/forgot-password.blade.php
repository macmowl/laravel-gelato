@extends('layout')

@section('content')
<div class="h-full p-4 w-full bg-gradient-to-r from-green-400 to-blue-500">
    <div class="flex justify-between text-white items-center">
        <a href="/" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
            <img src="assets/icon_back.svg" class="opacity-100"/>
        </a>
        <h1 class="text-xl">Réinitialiser le mot de passe</h1>
    </div>
</div>

<section class="p-3">
    <form method="post" action="/forgot-password" class="flex flex-col space-y-4">
      {{ csrf_field() }}
        <input
          type="email"
          placeholder="Entrer votre email"
          id="email"
          name="email"
          value="{{ old('email') }}"
          class="p-3 mt-10 rounded-md border border-gray-300 @error('email') border-red-500 @enderror"
          autocomplete="email"
          autofocus
        />
        @if($errors->has('email'))
            <p class="text-red-500 text-left text-xs">{{ $errors->first('email') }}</p>
        @endif
        <button type="submit" class="bg-blue-400 p-3 rounded-md text-white">Réinitialiser le mot de passe</button>
      </form>

</section>

@endsection
