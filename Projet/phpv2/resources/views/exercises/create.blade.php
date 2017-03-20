@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h3>Création Exercice</h3><hr>
          <p>Etape 1/2 : informations sur l'exercice</p>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('exercise.create') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
<<<<<<< HEAD
                <input type="text" id="name" name="name" class="materialize-textarea"></input>
                <label for="name">Nom</label>
              </div>
              <div class="input-field col s12">
                <input type="text" id="description" name="description" class="materialize-textarea"></input>
                <label for="description">Consigne</label>
              </div>
=======
                <input type="text" id="nomExo" class="materialize-textarea"></input>
                <label for="textarea1">Nom de l'exercice</label>
              </div>
              <div class="input-field col s12">
                <input type="text" id="descriptionExo" class="materialize-textarea"></input>
                <label for="textarea1">Description de l'exercice</label>
>>>>>>> master

              </div>
            </div>
            <button type="submit" class="btn btn-primary">
              Suivant
            </button>
          </form>
<<<<<<< HEAD
=======
        </br><button class="btn waves-effect waves-light" type="submit" name="action">Suivant</button>
>>>>>>> master
        </div>
    </div>
</div>
@endsection
