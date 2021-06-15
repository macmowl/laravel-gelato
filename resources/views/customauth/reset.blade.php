@extends('layout')

@section('content')

    <div class="text-center flex flex-col h-screen justify-center items-center bg-gradient-to-tl from-green-400 to-blue-500">
        <div class="absolute sm:relative sm:flex sm:flex-col sm:justify-center bottom-0 flex flex-col justify-self-center">
            <h1 id="logo">Gelato</h1>
            <div class="w-screen bg-gray-50 px-5 py-10 mt-10 sm:max-w-sm sm:rounded-md sm:shadow-2xl">
                <form method="POST" action="/reset-password" class="flex flex-col space-y-4">
                   {{ csrf_field() }}
                   <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="email" class="p-3 mt-10 rounded-md border border-gray-300 @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" placeholder="Adresse email" autofocus>
                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class="p-3 mt-10 rounded-md border border-gray-300 @error('email') border-red-500 @enderror" name="password" autocomplete="new-password" placeholder="Mot de passe">
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password-confirm" type="password" class="p-3 mt-10 rounded-md border border-gray-300" name="password_confirmation" autocomplete="new-password" placeholder="Confirmation du mot de passe">

                    <button type="submit" class="bg-blue-400 p-3 rounded-md text-white">
                        Réinitialiser le mot de passe
                    </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
