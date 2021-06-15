@extends('layout')

@section('content')

    <div class="text-center flex flex-col h-screen justify-center items-center bg-gradient-to-tl from-green-400 to-blue-500">
      <div class="absolute sm:relative sm:flex sm:flex-col sm:justify-center bottom-0 flex flex-col justify-self-center">
        <div class="w-screen bg-gray-50 px-5 py-10 mt-10 sm:max-w-sm sm:rounded-md sm:shadow-2xl">
            <a href="{{ env('APP_URL') }}/reset-password/{{$token}}">Cliquer ici pour réinitialiser votre mot de passe</a>
        </div>
      </div>
    </div>

@endsection
