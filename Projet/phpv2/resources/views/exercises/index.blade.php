@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <h4>Index exercices</h4>
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
              <td><p>{{$exercise->name}}</p></td>
              <td><p>{{$exercise->description}}</p></td>
              <td>
                <a class="waves-effect waves-light btn" href="{{ route('exercise.show', ['id' => $exercise->id]) }}">voir plus</a>
                <a class="waves-effect waves-light btn" href="{{ route('exercise.resolve', ['id' => $exercise->id]) }}">Résoudre</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

  @else
    <p>aucun exercice disponible...</p>
  @endif
@endsection
