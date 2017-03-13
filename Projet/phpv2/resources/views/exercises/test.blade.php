@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h3>Création Exercice</h3><hr>
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
@endsection
