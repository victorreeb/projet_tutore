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
                <a href=" {{route('register') }}" class="btn waves-effect white orange-text text-accent-2">S'inscrire</a>
            @else
                <a class="btn waves-effect white orange-text text-accent-2">Bienvenue sur PHPV2</a>
            @endif
        </div>
        <div class="carousel-item white-text" href="#one!">
            <img src="{{ asset('storage/img/carrousel/img1.jpg') }}">
        <!-- <img src="{{ asset('storage/nom_image.jpg') }}"> -->
        </div>
        <div class="carousel-item white-text" href="#two!">
            <img src="{{ asset('storage/img/carrousel/img2.jpg') }}">
        </div>
        <div class="carousel-item white-text" href="#three!">
            <img src="{{ asset('storage/img/carrousel/img3.jpg') }}">
        </div>
    </div>
    @if(Auth::check())
      <h5 class="center"><strong>PHPV2 est une plateforme d'auto-apprentissage du langage web PHP</strong></h5>
      <p>Vous retrouverez les différentes fonctionnalités du site dans le menu latéral à votre gauche : </p>
      <ul class="collection">
        <li class="collection-item avatar">
          <i class="material-icons circle grey">description</i>
          <span class="title">Profil</span>
          <p>Un espace profil permettant de personnaliser votre profil ainsi que de mettre à jour vos informations</p>
        </li>
        <li class="collection-item avatar">
          <i class="material-icons circle blue">folder</i>
          <span class="title">Gestion des groupes</span>
          <p>Gérez vos groupes : accéder rapidement à vos groupes, les mettre à jour</p>
        </li>
        @if(Auth::user()->type_user == 1 or Auth::user()->type_user == 0)
          <li class="collection-item avatar">
            <i class="material-icons circle blue">playlist_add</i>
            <span class="title">Création de groupe (professeur uniquement)</span>
            <p>Créer un groupe d'étudiants</p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">folder</i>
            <span class="title">Gestion des exercices (professeur uniquement)</span>
            <p>Gérez vos exercices : accéder rapidement à vos exercices, les mettre à jour</p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">playlist_add</i>
            <span class="title">Création d'exercice (professeur uniquement)</span>
            <p>Créer un exercice : soumettre un exercice à l'ensemble du site, l'assigner à un groupe d'étudiants</p>
          </li>
        @endif
      </ul>
    @else
      <div class="row">
          <div class="col s6">
              <div class="card">
                  <div class="card-content white-text">
                      <span class="card-title grey-text text-darken-4">Vous êtes étudiant ?</span>
                      <p class="card-subtitle grey-text text-darken-2">
                          L’étudiant est un utilisateur inscrit ayant un accès à différents exercices.<br>
                          Il peut avoir accès à différents exercices : les consulter et les résoudre.<br>
                          Un étudiant peut aussi appartenir à un groupe lui donnant accès à des exercices spécifiques.<br>
                          Enfin l’étudiant pourra suivre les différents exercices qu’il a résolu ou qui sont en cours de
                          résolution.<br>
                      </p>
                  </div>
                  @if(Auth::check())
                      <div class="card-action center">
                          <p><a href="{{ route('exercise.index') }}"><i class="small material-icons">play_arrow</i>accéder
                                  aux
                                  exercices</a></p>
                          <p><a href="{{ route('groupe.index') }}"><i class="small material-icons">play_arrow</i>accéder
                                  aux
                                  groupes</a></p>
                      </div>
                  @endif
              </div>
          </div>
          <div class="col s6">
              <div class="card">
                  <div class="card-content white-text">
                      <span class="card-title grey-text text-darken-4">Vous êtes enseignant ?</span>
                      <p class="card-subtitle grey-text text-darken-2">
                          L’enseignant possède les même droits qu’un étudiant mais a aussi la possibilité de pouvoir créer
                          et proposer des exercices à des étudiants à l’aide d’une interface intégrée.<br>
                          L’enseignant peut aussi gérer un groupe d’étudiants en leur proposant des exercices et en
                          invitant différents étudiants dans ce groupe<br>
                          <br>
                      </p>
                  </div>
                  @if(Auth::check())
                      <div class="card-action center">
                          <p><a href="{{ route('exercise.create') }}"><i class="small material-icons">play_arrow</i>ajouter
                                  un exercice</a></p>
                          <p><a href="{{ route('groupe.create') }}"><i class="small material-icons">play_arrow</i>créer un
                                  groupe</a></p>
                          @endif
                      </div>
              </div>
          </div>
      </div>
    @endif

    <script>
        $(document).ready(function () {
            $('.carousel').carousel();
        });
        $('.carousel.carousel-slider').carousel({fullWidth: true});
    </script>
@endsection
