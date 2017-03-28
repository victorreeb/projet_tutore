@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <div class="col s12 m6">
    <div class="card horizontal">
      <div class="card-stacked">
        <span class="card-title center">{{ $groupe->name }}</span>
        <div class="card-content grey-text text-darken-2">
          <p>Créer par <b>{{ $groupe->name_teacher }}</b></p>
          <p>Participants : {{ $groupe->count_members }}</p>
        </div>
        <div class="card-action center">
          @if($groupe->already_signup == 1)
            <p><a href="{{ route('user.groupe.signout', ['id' => $groupe->id]) }}"><i class="small material-icons">play_arrow</i>Quitter</a></p>
          @else
            <p><a href="{{ route('user.groupe.signup', ['id' => $groupe->id]) }}"><i class="small material-icons">play_arrow</i>Rejoindre</a></p>
          @endif
        </div>
      </div>
    </div>
  </div>
  @if(sizeof($participants) > 0)
    @foreach($participants as $participant)
      <div class="row">
        <div class="col s12 m6">
          <h2 class="header">{{ $participant->pseudo }}</h2>
          <div class="card horizontal">
            <div class="card-image">
              <img src="{{ asset('storage/uploads/avatars/'. $participant->avatar) }}" style="width:150px; height:150px;">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p>utilisateur : {{ $participant->pseudo }}</p>
                <p>{{ $participant->firstname }} {{ $participant->name }}</p>
              </div>
              <div class="card-action">
                <a href="#">voir le profil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @endif
@endsection
