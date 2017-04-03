@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="col s12">
        <div class="card horizontal">
            <div class="card-image">
                <img src="{{ asset('storage/uploads/avatars/'. $user->avatar) }}">
            </div>
            <div class="card-stacked">
                <span class="card-title center">{{ $groupe->name }}</span>
                <div class="card-content grey-text text-darken-2">
                    <p>Créer par <b>{{ $groupe->name_teacher }}</b></p>
                    <p>Participants : {{ $groupe->count_members }}</p>
                    <br>
                    <p>List des exercices associées : </p>
                    <ul class="collection">
                        @foreach($exercises as $exercise)
                            <li class="collection-item">
                                {{$exercise[0]->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-action center">
                    @if($groupe->already_signup == 1)
                        <p><a href="{{ route('user.groupe.signout', ['id' => $groupe->id]) }}"><i
                                        class="small material-icons">play_arrow</i>Quitter</a></p>
                    @else
                        <p><a href="{{ route('user.groupe.signup', ['id' => $groupe->id]) }}"><i
                                        class="small material-icons">play_arrow</i>Rejoindre</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(sizeof($participants) > 0)
        <div class="row">
            @foreach($participants as $participant)
                <div class="col s12 m4">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="{{ asset('storage/uploads/avatars/'. $participant->avatar) }}">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h4>{{ $participant->pseudo }}</h4>
                            </div>
                            <div class="card-action">
                                <a href="#">voir le profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
