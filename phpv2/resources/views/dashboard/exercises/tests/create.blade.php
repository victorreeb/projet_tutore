@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="row">
  <div class="col s3">
    @include('dashboard.partials.sidebar')
  </div>
  <div class="col s6">
    <h3>Création Exercice</h3><hr>
    <p>Etape 2/2 : ajout des tests</p>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('test.create', $id_exercise) }}">
      {{ csrf_field() }}
      <div class="input-field col s12">
        <input type="text" id="name" name="name" class="materialize-textarea"></input>
        <label for="name">Nom du test</label>
      </div>
      <div class="input-field col s12">
        <input type="text" id="description" name="description" class="materialize-textarea"></input>
        <label for="description">Description du test</label>
      </div>
      <p class="blue-text">
        Pour créer un test fonctionnel, suivez l'exemple suivant : $this->assertEquals('bonjour', $response['content_ob']);<br>
        $this est l'objet permettant d'effectuer les méthodes de tests<br>
        assertEquals est la méthode pour comparer 2 valeurs : assertEquals(résultat attendu, résultat obtenu)<br>
        'bonjour' est le résultat attendu<br>
        $response est l'objet permettant de récupérer les écho (contenu dans content_ob), ou autres variables par exemple $response['v'] vous retournera la valeur de la variable $v<br>
      </p>
      <div class="input-field col s12">
        <input type="text" id="code" name="code" class="materialize-textarea"></input>
        <label for="code">Code</label>
      </div>
      <p class="red-text">
        <i class="small material-icons">info_outline</i>
        Attention : Nous ne validons pas la synthaxe de vos tests actuellement. Pensez à ajouter un ";" à la fin de chaque ligne/commande pour éviter tout problème.
      </p>
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</div>
@endsection
