@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="row">
  <div class="col s3">
    @include('dashboard.partials.sidebar')
  </div>
  <div class="col s6">
    <h3>Créer un Groupe</h3><hr>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('groupe.create') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input type="text" id="name" name="name" class="materialize-textarea"></input>
          <label for="name">Nom</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Créer</button>
    </form>
  </div>
</div>
@endsection
