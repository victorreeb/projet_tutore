@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <h4>Index groupes</h4>
    @if(sizeof($groupes) > 0)
        <table class="responsive-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Participants</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groupes as $groupe)
                <tr>
                    <td><p>{{ $groupe->name }}</p></td>
                    <td><p>{{ $groupe->count_members }}</p></td>
                    <td>
                        <a class="waves-effect waves-light btn"
                           href="{{ route('dashboard.groupe.show', ['id' => $groupe->id]) }}">voir plus</a>
                        @if(Auth::user()->type_user == 0 or Auth::user()->type_user == 1)
                            <a class="waves-effect waves-light btn"
                               href="{{ route('groupe.exercise.show', ['id' => $groupe->id]) }}">Ajout exercice</a>
                            <a class="waves-effect red waves-light btn"
                               href="{{ route('dashboard.groupe.delete', ['id' => $groupe->id]) }}">supprimer</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Vous ne possédez aucun groupe...</p>
    @endif
@endsection
