@extends('layout')

@section('content')

    <h1>Liste des cakes</h1>
    <div class="list-group">
    @forelse($cakes as $cake)
    <a href="/cakes/{{ $cake->id }}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">{{ $cake->tastes }}</h5>
        <small>{{ $cake->price }}€</small>
        </div>
        <p class="mb-1">{{ $cake->DeliveryDate }}</p>
        <small>{{ $cake->nbrPersons }} personnes</small>
    </a>
    @empty
    <p>Il n'y a pas de commandes pour l'instant.</p>

    @endforelse
    </div>

    <a href="/new-cake" class="btn btn-danger">Ajouter un gâteau</a>

@endsection