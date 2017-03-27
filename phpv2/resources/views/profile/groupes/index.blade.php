@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="row">
  <div class="col s3">
    @include('profile.partials.sidebar')
  </div>
  <div class="col s6">
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
                <a class="waves-effect waves-light btn" href="{{ route('groupe.show', ['id' => $groupe->id]) }}">voir plus</a>
                <a class="waves-effect red waves-light btn" href="{{ route('profile.groupe.delete', ['id' => $groupe->id]) }}">supprimer</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Vous ne possédez aucun groupe...</p>
    @endif
  </div>
</div>
@endsection
