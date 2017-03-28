<ul class="collection">
  <li class="collection-item avatar">
    <i class="material-icons circle grey">description</i>
    <span class="title">Profil</span>
    <p>
      <a href="{{ route('profile') }}">accéder</a>
    </p>
  </li>
  @if(Auth::user()->type_user == 1 or Auth::user()->type_user == 0)
    <li class="collection-item avatar">
      <i class="material-icons circle blue">playlist_add</i>
      <span class="title">Créer un groupe</span>
      <p>
        <a href="{{ route('groupe.create') }}">créer</a>
      </p>
    </li>
  @endif
  <li class="collection-item avatar">
    <i class="material-icons circle blue">folder</i>
    <span class="title">Mes groupes</span>
    <p>
      <a href="{{ route('profile.groupe.index') }}">gérer</a>
    </p>
  </li>
  @if(Auth::user()->type_user == 1 or Auth::user()->type_user == 0)
    <li class="collection-item avatar">
      <i class="material-icons circle green">playlist_add</i>
      <span class="title">Ajouter un exercice</span>
      <p>
        <a href="{{ route('exercise.create') }}">ajouter</a>
      </p>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle green">folder</i>
      <span class="title">Mes exercices</span>
      <p>
        <a href="{{ route('profile.exercise.index') }}">gérer</a>
      </p>
    </li>
  @endif
</ul>
