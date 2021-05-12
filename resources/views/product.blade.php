@extends('layout')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-primary">Retour</a>
    <section class="section">
        <h1>Nouveau gâteau</h1>
        <form action="/add-cake" method="post">
            {{ csrf_field() }}
            <input class="form-control" type="number" name="nbrPersons" placeholder="Nombre de personnes" required>
            @if($errors->has('nbrPersons'))
                <p class="invalid-feedback">{{ $errors->first('nbrPersons') }}</p>
            @endif
            <input class="form-control" name="tastes" type="text" placeholder="Les parfums" required>
            @if($errors->has('tastes'))
                <p class="invalid-feedback">{{ $errors->first('tastes') }}</p>
            @endif

            <div class="form-check">
                <input class="form-check-input" type="radio" name="shape" value="1" id="shape1" checked>
                <label class="form-check-label" for="shape1">
                    Cercle
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="shape" value="2" id="shape2">
                <label class="form-check-label" for="shape2">
                    rectangle
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="shape" value="3" id="shape3">
                <label class="form-check-label" for="shape3">
                    Demi-Sphère
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="vegan" id="vegan">
                <label class="form-check-label" for="vegan">
                    Est-ce un gâteau vegan ?
                </label>
            </div>
            <input class="form-control" name="decoration" type="text" placeholder="Décorations (séparées par des virgules)">
            <div class="form-floating">
                <textarea class="form-control" name="specificities" placeholder="Ajouter une note" id="notes"></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" id="status1" checked>
                <label class="form-check-label" for="status1">
                    Pas commencé
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="2" id="status2">
                <label class="form-check-label" for="status2">
                    Moulé
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="3" id="status3">
                <label class="form-check-label" for="status3">
                    Terminé
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="4" id="status4">
                <label class="form-check-label" for="status4">
                    Livré
                </label>
            </div>
            <input type="datetime-local" class="form-control" id="DeliveryDate" name="DeliveryDate">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="isForDelivery" id="isForDelivery">
                <label class="form-check-label" for="isForDelivery">
                    Gâteau à livrer ?
                </label>
            </div>
            <hr>
            <h2>Client</h2>
            <input class="form-control" type="text" name="client_name" placeholder="Nom et prénom du client" required>
            @if($errors->has('client_name'))
                <p class="invalid-feedback">{{ $errors->first('client_name') }}</p>
            @endif
            <input class="form-control" type="tel" name="client_phone" placeholder="GSM du client" required>
            @if($errors->has('client_phone'))
                <p class="invalid-feedback">{{ $errors->first('client_phone') }}</p>
            @endif
            <input class="form-control" type="email" name="client_email" placeholder="Email du client">
            <hr>
            <input class="form-control" type="number" name="price" placeholder="Prix">
            @if($errors->has('price'))
                <p class="invalid-feedback">{{ $errors->first('price') }}</p>
            @endif
            <input class="form-control" type="number" name="advance_payment" placeholder="Acompte">
            @if($errors->has('advance_payment'))
                <p class="invalid-feedback">{{ $errors->first('advance_payment') }}</p>
            @endif
            <div class="field">
                <div class="control">
                    <button class="btn btn-primary" type="submit">Ajouter ce gâteau</button>
                </div>
            </div>
        </form>
    </section>

@endsection