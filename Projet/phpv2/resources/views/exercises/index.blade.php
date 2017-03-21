@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <h4>Index exercices</h4>
  @if(sizeof($exercises) > 0)
    @foreach($exercises as $exercise)
      <p><a href="{{ route('exercise.show', ['id' => $exercise->id]) }}">{{$exercise->name}}</a></p>
      <p>{{$exercise->description}}</p>
    @endforeach
  @else
    <p>aucun exercice disponible...</p>
    <a href="{{ route('exercise.create') }}">en créer un</a>
  @endif
@endsection
