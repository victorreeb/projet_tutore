@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="col s12">
        <div class="card horizontal">
            <div class="card-stacked">
                <span class="card-title center">{{ $groupe->name }}</span>
                <div class="card-content grey-text text-darken-2">
                    <p>Créer par <b>{{ $groupe->name_teacher }}</b></p>
                    <p>Participants : {{ $groupe->count_members }}</p>
                </div>
                <!-- <div class="card-action center">
                </div> -->
            </div>
        </div>
    </div>

    <h3>Ajouter un participant</h3>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="chip red white-text">
                {{ $error }} <i class="close material-icons">close</i>

            </div>

        @endforeach
    @endif

    <form class="form-horizontal" role="form" method="POST"
          action="{{ route('dashboard.groupe.users.add', ['id' => $groupe->id]) }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="name" name="name" class="materialize-textarea"/>
                <label for="name">Nom</label>
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
    <h3>liste des exercices</h3>
    @if(sizeof($exercises) > 0)
        <table class="responsive-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Difficulté</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($exercises as $exercise)
                <tr>
                    <td><p>{{$exercise->name}}</p></td>
                    <td><p>{{$exercise->description}}</p></td> 
                    <td>
                        <p class="right">
                            @for($i = 0 ; $i < $exercise->difficulte ; $i++)
                                <i class="material-icons">star</i>
                            @endfor
                        </p>
                    </td>
                    <td>
                        <a class="waves-effect red waves-light btn" href="{{ route('dashboard.groupe.exercise.delete', ['id' => $groupe->id, 'id_exercise' => $exercise->id]) }}">supprimer</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun exercice n'a été ajouté au groupe.</p>
    @endif
@endsection
