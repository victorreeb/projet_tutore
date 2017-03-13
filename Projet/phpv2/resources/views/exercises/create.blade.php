@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h3>Création Exercice</h3><hr>
          <p>Pour pouvoir créer un exercice, Veuillez fournir les testes</p>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <textarea id="nom" class="materialize-textarea"></textarea>
                <label for="textarea1">Nom de l'exercice</label>
              </div>
              <div class="input-field col s12">
                <textarea id="description" class="materialize-textarea"></textarea>
                <label for="textarea1">Description de l'exercice</label>
              </div>

              <h4>Ajout des tests</h4>
              <form action="#">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>File</span>
                    <input type="file" multiple>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more test">
                  </div>
                </div>
              </form>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Confirmation</button>
          </form>
        </div>
    </div>
</div>
@endsection