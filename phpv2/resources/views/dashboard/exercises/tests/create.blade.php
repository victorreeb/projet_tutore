@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <h3>Création Exercice</h3>
    <hr>
    <p>Etape 2/2 : ajout des tests</p>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="chip red white-text">
                {{ $error }} <i class="close material-icons">close</i>

            </div>

        @endforeach
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ route('test.create', $id_exercise) }}">
        {{ csrf_field() }}
        <div class="input-field col s12">
            <input type="text" id="name" name="name" class="materialize-textarea"/>
            <label for="name">Nom du test</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="description" name="description" class="materialize-textarea"/>
            <label for="description">Description du test</label>
        </div>
        <p class="blue-text">
            Pour créer un test fonctionnel, suivez l'exemple suivant : $this->assertEquals('bonjour',
            $response['content_ob']);<br>
            $this est l'objet permettant d'effectuer les méthodes de tests<br>
            assertEquals est la méthode pour comparer 2 valeurs : assertEquals(résultat attendu, résultat obtenu)<br>
            'bonjour' est le résultat attendu<br>
            $response est l'objet permettant de récupérer les écho (contenu dans content_ob), ou autres variables par
            exemple $response['v'] vous retournera la valeur de la variable $v<br>
        </p>
        <div class="input-field col s12">
            <input type="text" id="code" name="code" class="materialize-textarea"/>
            <label for="code">Code</label>
        </div>
        <p class="red-text">
            <i class="small material-icons">info_outline</i>
            Attention : Nous ne validons pas la synthaxe de vos tests actuellement. Pensez à ajouter un ";" à la fin de
            chaque ligne/commande pour éviter tout problème.
        </p>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
