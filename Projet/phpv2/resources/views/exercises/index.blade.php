@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <h3>Index exercises</h3>

  @foreach($exercises as $exercise)
    <p><a href="{{ route('exercise.show', ['id' => $exercise->id]) }}">{{$exercise->name}}</a></p>
    <p>{{$exercise->description}}</p>
  @endforeach
@endsection
