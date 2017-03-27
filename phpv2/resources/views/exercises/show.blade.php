@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
  <div class="row">
    <div class="col s12">
      <div class="card blue-grey lighten-1">
        <div class="card-content white-text">
          <span class="card-title">{{$exercise->name}}</span>
          <p>{{$exercise->description}}</p>
        </div>
        <div class="card-action grey lighten-3">
          <a href="{{ route('exercise.resolve', $exercise->id) }}">résoudre</a>
        </div>
      </div>
    </div>
  </div>

@endsection