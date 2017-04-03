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
                    editer ?
                </div>
            </div>
        </div>
    </div>

    <h3>Ajouter un participant</h3>
    <form class="form-horizontal" role="form" method="POST"
          action="{{ route('dashboard.groupe.users.add', ['id' => $groupe->id]) }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="name" name="name" class="materialize-textarea"/>
                <label for="name">Nom</label>
                @if ($errors->has('name'))
                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    @if(sizeof($participants) > 0)
        <h3>liste des participants inscrits</h3>
        <table class="responsive-table">
            <thead>
            <tr>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($participants as $participant)
                <tr>
                    <td><p>{{ $participant->pseudo }}</p></td>
                    <td><p>{{ $participant->name }}</p></td>
                    <td><p>{{ $participant->firstname }}</p></td>
                    <td><p>{{ $participant->email }}</p></td>
                    <td>
                        <a class="waves-effect red waves-light btn"
                           href="{{ route('dashboard.groupe.users.delete', ['id' => $groupe->id, 'user' => $participant->pseudo]) }}">Supprimer</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
