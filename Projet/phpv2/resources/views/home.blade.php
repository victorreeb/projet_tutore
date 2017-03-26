@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
@if(!Auth::check())
  <h3 class="center orange-text text-accent-2">Bienvenue</h3>
@else
  <h3 class="center orange-text text-accent-2">Bonjour {{ Auth::user()->pseudo }}</h3>
@endif
<div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-fixed-item center">
      @if(!Auth::check())
        <a href=" {{route('login') }}" class="btn waves-effect white orange-text text-accent-2">S'inscrire</a>
      @else
        <a class="btn waves-effect white orange-text text-accent-2">Bienvenue sur PHPV2</a>
      @endif
    </div>
    <div class="carousel-item white-text" href="#one!">
      <img src="{{ asset('storage/img/carrousel/php-1.jpg') }}">
      <!-- <img src="{{ asset('storage/nom_image.jpg') }}"> -->
    </div>
    <div class="carousel-item white-text" href="#two!">
      <img src="{{ asset('storage/img/carrousel/home/php-2.jpg') }}">
    </div>
    <div class="carousel-item white-text" href="#three!">
      <img src="{{ asset('storage/img/carrousel/home/php-3.jpg') }}">
    </div>
</div>
<div class="row">
    <div class="col s6">
      <div class="card">
        <div class="card-content white-text">
          <span class="card-title grey-text text-darken-4">Vous êtes étudiant ?</span>
          <p class="card-subtitle grey-text text-darken-2">
            L’étudiant est un utilisateur inscrit ayant un accès à différents exercices.<br>
            Il peut avoir accès à différents exercices : les consulter et les résoudre.<br>
            Un étudiant peut aussi appartenir à un groupe lui donnant accès à des exercices spécifiques.<br>
            Enfin l’étudiant pourra suivre les différents exercices qu’il a résolu ou qui sont en cours de résolution.<br>
          </p>
        </div>
        <div class="card-action">
          <p><a href="{{ route('exercise.index') }}"><i class="small material-icons">play_arrow</i>accéder aux exercices</a></p>
          <p><a href="{{ route('groupe.index') }}"><i class="small material-icons">play_arrow</i>accéder aux groupes</a></p>
        </div>
      </div>
    </div>
    <div class="col s6">
      <div class="card">
        <div class="card-content white-text">
          <span class="card-title grey-text text-darken-4">Vous êtes enseignant ?</span>
          <p class="card-subtitle grey-text text-darken-2">
            L’enseignant possède les même droits qu’un étudiant mais a aussi la possibilité de pouvoir créer et proposer des exercices à des étudiants à l’aide d’une interface intégrée.<br>
            L’enseignant peut aussi gérer un groupe d’étudiants en leur proposant des exercices et en invitant différents étudiants dans ce groupe<br>
            <br>
          </p>
        </div>
        <div class="card-action">
          <p><a href="{{ route('exercise.create') }}"><i class="small material-icons">play_arrow</i>ajouter un exercice</a></p>
          <p><a href="{{ route('groupe.create') }}"><i class="small material-icons">play_arrow</i>créer un groupe</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.carousel').carousel();
  });
  $('.carousel.carousel-slider').carousel({fullWidth: true});
</script>
@endsection
