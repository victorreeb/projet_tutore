@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <h2 class="header">Index Groupe</h2>
    @if(sizeof($groupes) > 0)
        <div class="row">
            @foreach($groupes as $groupe)
                <div class="col s12 m6">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <span class="card-title center">{{ $groupe->name }}</span>
                            <div class="card-content grey-text text-darken-2">
                                <p>Créateur : {{ $groupe->name_teacher }}</p>
                                <p>Participants : {{ $groupe->count_members }}</p>
                            </div>
                            <div class="card-action">
                                <p><a href="{{ route('groupe.show', ['id' => $groupe->id]) }}"><i
                                                class="small material-icons">play_arrow</i>Voir plus</a></p>
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
            @endforeach
        </div>
    @else
        <p>Aucun groupe disponible...</p>
    @endif
@endsection
