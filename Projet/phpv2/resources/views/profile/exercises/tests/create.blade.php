@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="row">
  <div class="col s3">
    @include('profile.partials.sidebar')
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
      <div class="input-field col s12">
        <input type="text" id="code" name="code" class="materialize-textarea"></input>
        <label for="code">Code</label>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</div>
@endsection
