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
            <p><a href="{{ route('user.groupe.signout', ['id' => $groupe->id]) }}}"><i class="small material-icons">play_arrow</i>Quitter</a></p>
          @else
           <p><a href="{{ route('user.groupe.signup', ['id' => $groupe->id]) }}"><i class="small material-icons">play_arrow</i>Rejoindre</a></p>
          @endif
        </div>
      </div>
    </div>
@endsection
