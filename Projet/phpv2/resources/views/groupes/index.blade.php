@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <h4>Index groupes</h4>
  <p><a class="waves-effect waves-light btn" href="{{ route('groupe.create') }}">créer un groupe</a></p>
  @if(sizeof($groupes) > 0)
  <table class="responsive-table">
        <thead>
          <tr>
              <th>Nom</th>
              <th>Créé par</th>
              <th>Participants</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($groupes as $groupe)
            <tr>
              <td><p>{{ $groupe->name }}</p></td>
              <td><p>{{ $groupe->name_teacher }}</p></td>
              <td><p>{{ $groupe->count_members }}</p></td>
              <td>
                <a class="waves-effect waves-light btn" href="{{ route('groupe.show', ['id' => $groupe->id]) }}">voir plus</a>
                @if($groupe->already_signup == 1)
                  <a class="waves-effect waves-light btn" href="{{ route('user.groupe.signout', ['id' => $groupe->id, 'redirect' => 'index']) }}">quitter</a>
                @else
                  <a class="waves-effect waves-light btn" href="{{ route('user.groupe.signup', ['id' => $groupe->id, 'redirect' => 'index']) }}">rejoindre</a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

  @else
    <p>aucun groupe disponible...</p>
  @endif
@endsection
