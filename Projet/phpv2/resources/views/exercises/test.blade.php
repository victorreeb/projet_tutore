@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h3>Création Exercice</h3><hr>
              <h4>Ajout des tests</h4>
              <form action="#">
                <div class="input-field col s12">
                  <textarea id="nom" class="materialize-textarea"></textarea>
                  <label for="textarea1">Nom de l'exercice</label>
                </div>
              </form>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Confirmation</button>
          </form>
    </div>
</div>
@endsection
