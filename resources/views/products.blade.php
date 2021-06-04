@extends('layout')

@section('content')
    <div id="menuModal" class="absolute bg-black bg-opacity-70 hidden w-screen h-screen">
        <div class="flex flex-col mt-20 justify-items-center items-center text-white w-screen">
            <h3 class="inline-block font-semibold text-4xl mb-4 opacity-100">Menu</h3>
            <a href="/" class="inline-block text-2xl my-2 opacity-100">Accueil</a>
            <a href="/account" class="inline-block text-2xl my-2 opacity-100">Mon compte</a>
            <a href="/archived" class="inline-block text-2xl my-2 opacity-100">Gâteaux archivés</a>
        </div>
    </div>
    <a href="/new-cake" class="fixed bottom-4 right-4 bg-blue-400 rounded-full h-11 w-11 flex justify-items-center justify-center items-center">
        <img src="assets/icn_add.svg" alt="add cake" width="20" height="20"/>
    </a>
    <div class="bg-gray-100">
        <div class="h-full p-4 w-full bg-gradient-to-r from-green-400 to-blue-500">
            <div class="flex justify-between text-white items-center">
                @if ($archived)
                    <h1 class="text-xl">Liste des gâteaux archivés</h1>
                @else
                    <div>
                        <h1 class="text-xl">Hello, {{ auth()->user()->email }}</h1>
                        <p class="text-sm font-light">Que fait-on aujourd'hui ?</p>
                    </div>
                @endif
                <div id="openMenu" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
                    <img src="assets/icn_menu.svg" class="opacity-100"/>
                </div>
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
                        @elseif ($cake->status == 3)
                            <p class="text-red-400">Terminé</p>
                        @else
                            <p class="text-blue-400">Livré</p>
                        @endif
                    </div>
                </a>
            @empty
                <p class="text-center mt-4 text-gray-500">Il n'y a pas de commandes pour l'instant.</p>
            @endforelse
            </div>
        </div>
    </div>
    <div class="hidden bg-black bg-opacity-50">
        <div class="flex">
            <p><b>Menu</b></p>
            <p>Dashboard</p>
            <p>Profil</p>
        </div>
    </div>

@endsection