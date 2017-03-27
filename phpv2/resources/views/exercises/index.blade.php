@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <h4>Index exercices</h4>
  <p><a class="waves-effect waves-light btn" href="{{ route('exercise.create') }}">ajouter un exercice</a></p>
  @if(sizeof($exercises) > 0)
  <table class="responsive-table">
        <thead>
          <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($exercises as $exercise)
            <tr>
              <td><p><a href="{{ route('exercise.show', ['id' => $exercise->id]) }}">{{$exercise->name}}</a></p></td>
              <td><p>{{$exercise->description}}</p></td>
              <td><p><a href="{{ route('exercise.resolve', ['id' => $exercise->id]) }}">Résoudre</a></p></td>
            </tr>
          @endforeach
        </tbody>
      </table>

  @else
    <p>aucun exercice disponible...</p>
  @endif
@endsection
