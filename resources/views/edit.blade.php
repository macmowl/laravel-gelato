@extends('layout')

@section('content')
    <div class="flex flex-col justify-center">
            <div class="h-full p-4 w-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center">
                <a href="{{ url()->previous() }}" class="h-11 w-11 rounded-full border-2 border-opacity-10 border-white flex items-center justify-center">
                    <img src="/assets/icon_back.svg" alt="Retour" class="opacity-100"/>
                </a>
                <h1 class="flex-1 justify-center text-xl text-white text-center">Édition du gâteau</h1>
                <a href="/cakes/{{ $cake->id }}/delete">
                    <div class="block p-2 rounded-full border-white border-opacity-20 border-2"><img src="/assets/icon_delete.svg" alt="Supprimer ce gâteau" /></div>
                </a>
            </div>
            <form class="container px-5 py-8 flex flex-col self-center sm:max-w-sm" action="/edit-cake" method="post">
                <h2 class="text-gray-500 font-semibold text-xl mb-4">Le gâteau</h2>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $cake->id }}">
                <input class="form-control mb-3 p-3 rounded-md border border-gray-300 @error('email') border-red-500 @enderror" name="tastes" type="text" placeholder="Les parfums" value="{{ $cake->tastes ?? null }}" required>
                @if($errors->has('tastes'))
                    <p class="text-sm text-red-600">{{ $errors->first('tastes') }}</p>
                @endif
                <div class="radio-group flex flex-row flex-initial bg-white py-3 border-gray-300 border justify-center rounded-md">
                    <input class="pl-3 w-full" type="number" id="nbrPersons" name="nbrPersons" placeholder="64" value="{{ $cake->nbrPersons > 10 ? $cake->nbrPersons : null }}">
                    <span class="mr-3">pers</span>
                </div>
                <div>
                    <h2>Shape</h2>
                        <div class="radio-group flex flex-row flex-initial border-gray-300 border justify-center rounded-md">
                            <div class="radioShape bg-white flex-1 rounded-tl-md rounded-bl-md">
                                <input type="radio" name="shape" id="circle" value="circle" {{ $cake->shape == 'circle' ? "checked" : null }}>
                                <label for="circle" class="block text-center px-4 py-3 bg-white rounded-tl-md rounded-bl-md h-20">
                                    <div class="font-semibold tracking-wide">Cercle</div>
                                </label>
                            </div>
                            <div class="radioShape bg-white flex-1">
                                <input type="radio" name="shape" id="square" value="square" {{ $cake->shape == 'square' ? "checked" : null }}>
                                <label for="square" class="block text-center px-4 py-3 bg-white h-20 border-l border-r">
                                    <div class="font-semibold tracking-wide">Rectangle</div>
                                </label>
                            </div>
                            <div class="radioShape bg-white flex-1 rounded-tr-md rounded-br-md">
                                <input type="radio" name="shape" id="halfSphere" value="halfSphere" {{ $cake->shape == 'halfSphere' ? "checked" : null }}>
                                <label for="halfSphere" class="block text-center px-4 py-3 bg-white h-20 rounded-tr-md rounded-br-md">
                                    <div class="font-semibold tracking-wide">Demi-Sphère</div>
                                </label>
                            </div>
                        </div>
                        <label for="vegan" class="flex my-4">
                            <input type="checkbox" name="vegan" class="form-checkbox h-5 w-5 text-blue-400">
                            <div class="flex ml-2">
                                <p>Vegan</p>
                                <img src="/assets/icon_vegan.svg" alt="Vegan" />
                            </div>
                        </label>
                </div>
                <div class="my-4">
                    <h2 class="text-gray-400">Décorations</h2>
                    <input type="checkbox" name="decoration[]" class="form-checkbox h-5 w-5 text-blue-400 mr-2" id="decoration" value="Crème fraiche" {{ in_array("Crème fraiche", $cake->decoration) ? "checked" : null }}>Crème fraiche<br>
                    <input type="checkbox" name="decoration[]" class="form-checkbox h-5 w-5 text-blue-400 mr-2" id="decoration" value="Topping Chocolat" {{ in_array("Topping Chocolat", $cake->decoration) ? "checked" : null }}>Topping Chocolat<br>
                    <input type="checkbox" name="decoration[]" class="form-checkbox h-5 w-5 text-blue-400 mr-2" id="decoration" value="Topping caramel" {{ in_array("Topping caramel", $cake->decoration) ? "checked" : null }}>Topping caramel<br>
                    <input type="checkbox" name="decoration[]" class="form-checkbox h-5 w-5 text-blue-400 mr-2" id="decoration" value="Brésilienne" {{ in_array("Brésilienne", $cake->decoration) ? "checked" : null }}>Brésilienne<br>
                    <input type="checkbox" name="decoration[]" class="form-checkbox h-5 w-5 text-blue-400 mr-2" id="decoration" value="Granulés chocolat" {{ in_array("Granulés chocolat", $cake->decoration) ? "checked" : null }}>Granulés chocolat<br>
                    <input type="checkbox" name="decoration[]" class="form-checkbox h-5 w-5 text-blue-400 mr-2" id="decoration" value="Fruits frais" {{ in_array("Fruits frais", $cake->decoration) ? "checked" : null }}>Fruits frais<br>
                </div>
                <div class="my-4">
                    <h2 class="text-gray-400">État</h2>
                    <select id="status" name="status"  class="w-full h-10 bg-white border rounded-md px-2 border-gray-400" >
                        <option value="1" {{ $cake->status == 1 ? "selected" : null }}>Pas commencé</option>
                        <option value="2" {{ $cake->status == 2 ? "selected" : null }}>Moulé</option>
                        <option value="3" {{ $cake->status == 3 ? "selected" : null }}>Terminé</option>
                        <option value="4" {{ $cake->status == 4 ? "selected" : null }}>Livré</option>
                    </select>
                </div>
                <div>
                    <textarea
                        class="form-control w-full mb-3 p-3 rounded-md border border-gray-300 @error('specificities') border-red-500 @enderror"
                        placeholder="Notes"
                        name="specificities"
                    >{{ $cake->specificities ?? null }}</textarea>
                </div>
                <input type="datetime-local" class="form-control w-full mb-3 p-3 bg-white rounded-md border border-gray-300 @error('DeliveryDate') border-red-500 @enderror" id="DeliveryDate" name="DeliveryDate" value="{!! date('Y-m-d\TH:i', strtotime($cake->DeliveryDate)) !!}" required>

                <label for="isForDelivery">
                    <input type="checkbox" name="isForDelivery" class="form-checkbox h-5 w-5 text-blue-400" {{ $cake->isForDelivery == 'on' ? "checked" : null}}>
                    <span class="ml-2 text-gray-700">Le client veut être livré</span>
                </label>
                <h2 class="text-gray-500 font-semibold text-xl my-4">Client</h2>
                <input class="form-control w-full mb-3 p-3 bg-white rounded-md border border-gray-300 @error('client_name') border-red-500 @enderror" type="text" name="client_name" placeholder="Nom et prénom du client" value="{{ $cake->client_name ?? null }}" required>
                @if($errors->has('client_name'))
                    <p class="invalid-feedback">{{ $errors->first('client_name') }}</p>
                @endif
                <input class="form-control w-full mb-3 p-3 bg-white rounded-md border border-gray-300 @error('client_phone') border-red-500 @enderror" type="tel" name="client_phone" placeholder="GSM du client" value="{{ $cake->client_phone ?? null }}" maxlength="13">
                @if($errors->has('client_phone'))
                    <p class="invalid-feedback">{{ $errors->first('client_phone') }}</p>
                @endif
                <input class="form-control w-full mb-3 p-3 bg-white rounded-md border border-gray-300 @error('client_email') border-red-500 @enderror" type="email" name="client_email" placeholder="Email du client" value="{{ $cake->client_email ?? null }}">
                <hr class="mb-3">
                <div class="flex space-x-3 w-full">
                    <div class="form-control flex justify-items-end mb-3 p-3 bg-white rounded-md border">
                        <input class="text-right mr-2 w-full border-gray-300 @error('price') border-red-500 @enderror" type="number" id="price" name="price" placeholder="Prix" value="{{ $cake->price ?? null }}" required>
                        <span class="text-gray-600">€</span>
                    </div>
                    <div class="flex justify-items-end mb-3 p-3 bg-white rounded-md border">
                        <input class="text-right mr-2 w-full border-gray-300 @error('advance_payment') border-red-500 @enderror" type="number" id="advance" name="advance_payment" placeholder="Acompte" value="{{ $cake->advance_payment ?? null }}" required>
                        <span class="text-gray-600">€</span>
                    </div>
                </div>
                @if($errors->has('price'))
                    <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                @endif
                @if($errors->has('advance_payment'))
                    <p class="invalid-feedback">{{ $errors->first('advance_payment') }}</p>
                @endif
                <p class="text-right mr-1">Le solde restant est de : <span id="remaining">0</span> €</p>
                <button class="rounded-md w-full bg-blue-400 text-white h-10 mt-5">Modifier ce gâteau</button>
            </form>
        </div>

@endsection
