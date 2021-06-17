@extends('layout')

@section('content')
<div class="flex flex-col justify-center mb-5 p-4 bg-gradient-to-r from-green-400 to-blue-500">
    <div class="flex justify-between pb-8 sm:max-w-sm">
        <a href="{{ $archived ? "/archived" : "/" }}" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
            <img src="/assets/icon_back.svg" alt="Retour" class="opacity-100"/>
        </a>
        <a href="/cakes/{{ $cake->id }}/edit">
            <div class="block p-2 rounded-full border-white border-opacity-20 border-2 ml-4"><img src="/assets/icon_edit.svg" alt="Editer ce gâteau" /></div>
        </a>
    </div>

    <h1 class="text-white text-2xl font-semibold mb-2">{{ $cake->tastes }}</h1>
    <p class="text-blue-900 font-semibold mb-2">{{ $cake->nbrPersons }} personnes <span class="text-white text-opacity-30">|</span> {{ $cake->shape }}</p>
    @if ($cake->vegan)
        <div class="flex items-center justify-center vegan rounded-full bg-white shadow-md mt-3 w-11 h-11">
            <img src="/assets/icon_vegan.svg" alt="Gâteau vegan" class=""/>
        </div>
    @endif
</div>
<div class="flex flex-col px-4 self-center sm:max-w-sm">
    @if ($cake->decoration)
        <div class="my-5">
            <h2 class="text-gray-400">Décorations</h2>
            <ul>
            @foreach($cake->decoration as $deco)
                <li><span class="text-gray-200">•</span> {{ $deco }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    @if ($cake->specificities)
        <div class="mb-5">
            <h2 class="text-gray-400">Notes</h2>
            <p>{{ $cake->specificities }}</p>
        </div>
    @endif
    <div class="mb-5">
        <h2 class="text-gray-400">Date de livraison</h2>
        <p>{!! date('d M y à H:i', strtotime($cake->DeliveryDate)) !!}</p>
        @if ($cake->isForDelivery)
            <div class="flex">
                <img src="/assets/delivery-truck.svg" alt="For delivery" class="mr-2"/>
                <p class="text-red-500 text-sm font-light">Cette commande est à livrer.</p>
            </div>
        @endif
    </div>
    <div class="mb-5">
        <h2 class="text-gray-400">Client</h2>
        <div class="flex">
            <img src="/assets/icon_client_user.svg" alt="Phone's client" class="mr-2"/>
            <p class="font-semibold">{{ $cake->client_name }}</p>
        </div>
        @if ($cake->client_phone)
        <div class="flex">
            <img src="/assets/icon_client_phone.svg" alt="Phone's client" class="mr-2"/>
            <p>{{ $cake->client_phone}}</p>
        </div>
        @endif
        @if ($cake->client_email)
        <div class="flex">
            <img src="/assets/icon_client_phone.svg" alt="Phone's client" class="mr-2"/>
            <p><a href="mailto:{{ $cake->client_email }}">{{ $cake->client_email }}</a></p>
        </div>
        @endif
    </div>
    <div class="flex flex-col mb-5 w-100 gap-2">
        <h2 class="text-gray-400">Détail du prix</h2>
        <div class="flex flex-row gap-2">
            <div class="bg-white flex flex-col flex-1 py-2 justify-between items-center rounded-lg">
                <p>{{ $cake->price}} €</p>
                <p class="text-sm text-gray-400 font-light">prix</p>
            </div>
            <div class="bg-white flex flex-col flex-1 py-2 justify-between items-center rounded-lg">
                <p>{{ $cake->advance_payment}} €</p>
                <p class="text-sm text-gray-400 font-light">Acompte</p>
            </div>
        </div>
        <div class="bg-white flex flex-1 py-2 px-4 justify-between items-center rounded-lg">
            <p class="text-sm text-gray-400 font-light">Solde restant</p>
            <p class="font-bold text-xl">{{ $cake->price - $cake->advance_payment }} €</p>
        </div>
    </div>
    <form>
        <h2 class="text-gray-400">État</h2>
        <select id="change-status"  class="w-full h-10 bg-white border rounded-md px-2 border-gray-400" >
            <option value="1" {{ $cake->status == 1 ? "selected" : null }}>Pas commencé</option>
            <option value="2" {{ $cake->status == 2 ? "selected" : null }}>Moulé</option>
            <option value="3" {{ $cake->status == 3 ? "selected" : null }}>Terminé</option>
            <option value="4" {{ $cake->status == 4 ? "selected" : null }}>Livré</option>
        </select>
        <input type="hidden" id="idCake" name="id" value="{{ $cake->id }}">
    </form>
    <p class="text-sm text-gray-400 font-light text-center mt-4">Créé le {!! date('d M y', strtotime($cake->created_at)) !!} par {{ $creator->username }}</p>
</div>

@endsection
