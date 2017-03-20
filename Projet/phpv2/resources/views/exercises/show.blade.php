@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <h3>Page d'un Exercice</h3>

  Afficher les infos exercise
  <p>{{$exercise->name}}</p>
  <p>{{$exercise->description}}</p>
@endsection
