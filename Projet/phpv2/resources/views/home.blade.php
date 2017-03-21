@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
      <div class="col s6">
        <h4>Vous êtes étudiant ?</h4>
        <p>décrire ce qu'est un étudiant et ce qu'il peut faire<p>
        <a href="{{ route('exercise.index') }}">accéder aux exercices</a>
      </div>
      <div class="col s6">
        <h4>Vous êtes professeur ?</h4>
        <p>décrire ce qu'est un professeur et ce qu'il peut faire</p>
      </div>
    </div>
</div>
@endsection
