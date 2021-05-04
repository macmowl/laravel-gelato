@extendds('layout')

@section('content')
    <section class="section">
        <h1>Nouveau gâteau</h1>
        <form action="/add-product" method="post">
            {{ csrf_field() }}

            <div class="field">
                <div class="control">
                    <textarea class="textarea" name="message" placeholder="Qu'avez-vous à dire ?" placeholder="message" ></textarea>
                </div>
                @if($errors->has('message'))
                    <p class="help is-danger">{{ $errors->first('message') }}</p>
                @endif
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Ajouter</button>
                </div>
            </div>
        </form>

    </section>

@endsection