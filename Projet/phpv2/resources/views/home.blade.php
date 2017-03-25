@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
      <div class="col s6">
        <div class="row">
          <div class="col s12">
            <div class="card amber lighten-2">
              <div class="card-content white-text">
                <span class="card-title">Vous êtes étudiant ?</span>
                <p>L’étudiant est un utilisateur inscrit ayant un accès à différents exercices.</p>
                <p>Il peut avoir accès à différents exercices : les consulter et les résoudre.</p>
                <p>Un étudiant peut aussi appartenir à un groupe lui donnant accès à des exercices spécifiques.</p>
                <p>Enfin l’étudiant pourra suivre les différents exercices qu’il a résolu ou qui sont en cours de résolution.</p>
              </div>
              <div class="card-action">
                <a href="{{ route('exercise.index') }}">accéder aux exercices</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col s6">
        <div class="row">
          <div class="col s12">
            <div class="card green lighten-2">
              <div class="card-content white-text">
                <span class="card-title">Vous êtes enseignant ?</span>
                <p>L’enseignant possède les même droits qu’un étudiant mais a aussi la possibilité de pouvoir créer et proposer des exercices à des étudiants à l’aide d’une interface intégrée.</p>
                <p>L’enseignant peut aussi gérer un groupe d’étudiants en leur proposant des exercices et en invitant différents étudiants dans ce groupe</p>
              </div>
              <div class="card-action">
                <a href="{{ route('exercise.create') }}">ajouter un exercice</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
