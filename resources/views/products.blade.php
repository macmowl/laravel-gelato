@extends('layout')

@section('content')
    <a href="/new-cake" class="absolute bottom-4 right-4 bg-blue-400 rounded-full h-11 w-11 flex justify-items-center justify-center items-center">
        <img src="assets/icn_add.svg" alt="add cake" width="20" height="20"/>
    </a>
    <div class="bg-gray-100">
        <div class="h-full p-4 w-full bg-gradient-to-r from-green-400 to-blue-500">
            <div class="flex justify-between text-white items-center">
                <div>
                    <h1 class="text-xl">Hello, {{ auth()->user()->email }}</h1>
                    <p class="text-sm font-light">What will you do today?</p>
                </div>
                <a href="/logout" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
                    <img src="assets/icn_menu.svg" class="opacity-100"/>
                </a>
            </div>
        </div>
        <div class="container px-5 flex flex-col sm:max-w-sm">
            <div class="md:justify-between">
            @forelse($cakes as $cake)
                <a href="/cakes/{{ $cake->id }}" class="container flex justify-between rounded-md transition duration-500 ease-in-out shadow-md p-3 my-5 md:max-w-lg bg-white cursor-pointer hover:shadow-xl">
                    <div class="flex-row">
                        <p class="font-semibold">{{ $cake->client_name }}</p>
                        <div class="flex">
                            {!! $cake->isForDelivery ? '<img src="assets/delivery-truck.svg" alt="Need a delivery" class="mr-2" />' : null !!}
                            <p class="text-gray-400 font-light">
                                {!! date('d M y', strtotime($cake->DeliveryDate)) !!}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p>{{ $cake->nbrPersons }} pers | {{ $cake->price }} €</p>
                        @if ($cake->status == 1)
                            <p class="text-gray-400">Pas commencé</p>
                        @elseif ($cake->status == 2)
                            <p class="text-green-400">Moulé</p>
                        @else
                            <p class="text-red-400">Terminé</p>
                        @endif
                    </div>
                </a>
            @empty
                <p class="text-center mt-4 text-gray-500">Il n'y a pas de commandes pour l'instant.</p>
            @endforelse
            </div>
        </div>
    </div>

@endsection