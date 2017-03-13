@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h3>Création Exercice</h3><hr>
              <h4>Ajout des tests</h4>
              <div>
               <a class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">+</i></a>
             </div>
              <form action="#">
                <div class="input-field col s12">
                  <textarea id="nomTest" class="materialize-textarea"></textarea>
                  <label for="textarea1">Nom du test</label>
                </div>
                <div class="input-field col s12">
                  <textarea id="descriptionTest" class="materialize-textarea"></textarea>
                  <label for="textarea1">Description du test</label>
                </div>
                <div class="input-field col s12">
                  <p>Exemple de code de test: $this->assertEquals("phpv2", $response["content_ob"]);</p>
                </div>
                <div class="input-field col s12">
                  <textarea id="codeTest" class="materialize-textarea"></textarea>
                  <label for="textarea1">Code du test</label>
                </div>
              </form>
            </div>
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="action">Confirmation</button>
            </div>
          </form>
    </div>
</div>
@endsection
