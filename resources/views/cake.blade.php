@extends('layout')

@section('content')
<a href="{{ url()->previous() }}" class="btn btn-primary">Retour</a>
<div class="section">
    <h1>{{ $cake->tastes }}</h1>
    <p>{{ $cake->nbrPersons }} personnes | {{ $cake->shape }}</p>

    @if ($cake->vegan)
        <div>VEGAN</div>
    @endif

    @if ($cake->decoration)
        <h2>Décorations</h2>
        <p>{{ $cake->decoration }}</p>
    @endif

    @if ($cake->specificities)
        <h2>Notes</h2>
        <p>{{ $cake->specificities }}</p>
    @endif

    <h2>Client</h2>
    <p>{{ $cake->client_name }}</p>
    <p>{{ $cake->client_phone }}</p>
    @if ($cake->client_email)
        <p>{{ $cake->email }}</p>
    @endif

</div>

@endsection