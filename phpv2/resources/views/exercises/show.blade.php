@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="col s12 m6">
      <div class="card horizontal">
        <div class="card-stacked">
          <span class="card-title center">{{$exercise->name}}</span>
          <div class="card-content grey-text text-darken-2">
            <h5>Description</h5>
            <p>{{$exercise->description}}</p>
            <h5>Astuce</h5>
            <p>{{$exercise->astuce}}</p>
            <h5>Auteur</h5>
            <p>{{$exercise->name_teacher}}</p>
          </div>
          <div class="card-action center">
            <p><a href="{{ route('exercise.resolve', ['id' => $exercise->id]) }}"><i class="small material-icons">play_arrow</i>Résoudre</a></p>
          </div>
        </div>
      </div>
@endsection
