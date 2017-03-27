@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <h2 class="header">Index Exercices</h2>
  @if(sizeof($exercises) > 0)
      <div class="row">
      @foreach($exercises as $exercise)
        <div class="col s12 m6">
          <div class="card horizontal">
            <div class="card-stacked">
              <span class="card-title center">{{$exercise->name}}</span>
              <div class="card-content grey-text text-darken-2">
                <p>{{$exercise->description}}</p>
              </div>
              <div class="card-action">
                <p><a href="{{ route('exercise.show', ['id' => $exercise->id]) }}"><i class="small material-icons">play_arrow</i>Voir plus</a></p>
                <p><a href="{{ route('exercise.resolve', ['id' => $exercise->id]) }}"><i class="small material-icons">play_arrow</i>Résoudre</a></p>
                <!-- <a class="waves-effect waves-light btn" href="{{ route('exercise.show', ['id' => $exercise->id]) }}">voir plus</a>
                <a class="waves-effect waves-light btn" href="{{ route('exercise.resolve', ['id' => $exercise->id]) }}">Résoudre</a> -->
              </div>
            </div>
          </div>
      </div>
        @endforeach
    </div>

  @else
    <p>Aucun exercice disponible...</p>
  @endif
@endsection
