@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h3>Création Exercice</h3><hr>
          <p>Pour pouvoir créer un exercice, Veuillez fournir les tests</p>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" id="nomExo" class="materialize-textarea"></input>
                <label for="textarea1">Nom de l'exercice</label>
              </div>
              <div class="input-field col s12">
                <input type="text" id="descriptionExo" class="materialize-textarea"></input>
                <label for="textarea1">Description de l'exercice</label>

              </div>
            </div>
          </form>
        </br><button class="btn waves-effect waves-light" type="submit" name="action">Suivant</button>
        </div>
    </div>
</div>
@endsection
