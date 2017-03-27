@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <div class="row">
    <div class="col s12">
      <div class="card blue-grey lighten-1">
        <div class="card-content white-text">
          <span class="card-title">{{ $groupe->name }}</span>
          <p>créer par <b>{{ $groupe->name_teacher }}</b></p>
          <p>participants : {{ $groupe->count_members }}</p>
        </div>
        <div class="card-action grey lighten-3">
          @if($groupe->already_signup == 1)
            <a class="waves-effect waves-light btn" href="{{ route('user.groupe.signout', ['id' => $groupe->id, 'redirect' => 'show']) }}">quitter</a>
          @else
            <a class="waves-effect waves-light btn" href="{{ route('user.groupe.signup', ['id' => $groupe->id, 'redirect' => 'show']) }}">rejoindre</a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
