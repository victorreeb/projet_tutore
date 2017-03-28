@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="row">
  <div class="col s3">
    @include('dashboard.partials.sidebar')
  </div>
  <div class="col s6">
  <h4>Index exercices</h4>
  @if(sizeof($exercises) > 0)
  <table class="responsive-table">
        <thead>
          <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Difficulté</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($exercises as $exercise)
            <tr>
              <td><p>{{$exercise->name}}</p></td>
              <td><p>{{$exercise->description}}</p></td>
              <td>
                <p class="right">
                  @for($i = 0 ; $i < $exercise->difficulte ; $i++)
                    <i class="material-icons">star</i>
                  @endfor
                </p>
              </td>
              <td>
                <a class="waves-effect waves-light btn" href="{{ route('exercise.show', ['id' => $exercise->id]) }}">voir plus</a>
                <a class="waves-effect red waves-light btn" href="{{ route('dashboard.exercise.delete', ['id' => $exercise->id]) }}">supprimer</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Vous ne possédez aucun exercice...</p>
    @endif
  </div>
</div>
@endsection
