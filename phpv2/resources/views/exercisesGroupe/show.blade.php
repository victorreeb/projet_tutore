@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="col s8 offset-s2">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <span class="card-title center">Ajouter des exercices à {{$groupe->name}}</span>
                        <div class="card-content">
                            @if($exercises and sizeof($exercises) > 0)
                              <form action="{{ route('groupe.exercise.add', ['id' => $groupe->id]) }}"
                                    method="post">
                                  {{ csrf_field() }}
                                  @foreach($exercises as $exercise)
                                      <p>
                                        <input name="exercice[]" type="checkbox" value="{{$exercise->id}}" id="{{$exercise->name}}"/>
                                        <label for="{{$exercise->name}}">{{$exercise->name}}</label>
                                      </p>
                                  @endforeach
                                  @if ($errors->has('exercice'))
                                      <span class="red-text">
                                          <strong>{{ $errors->first('exercice') }}</strong>
                                      </span>
                                  @endif
                                  <br
                                  <button type="submit" class="btn waves-effect white orange-text text-accent-2">
                                      Valider
                                  </button>
                              </form>
                            @else
                              <p class="red-text center">Vous ne possédez pas d'exercices à ajouter à ce groupe pour le moment. Veuillez créer un nouvel exercice puis réessayez !</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
