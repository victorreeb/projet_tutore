@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="col s6 offset-s3">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <span class="card-title center">Ajouter des exercices au groupe</span>
                        <div class="card-content">
                            <form action="{{ route('groupe.exercise.add', ['id' => $groupeId]) }}"
                                  method="post">
                                {{ csrf_field() }}
                                @foreach($exercises as $exercise)
                                    <p>
                                        <input name="exercice[]" type="checkbox" value="{{$exercise->id}}"
                                               id="{{$exercise->name}}"/>
                                        <label for="{{$exercise->name}}">{{$exercise->name}}</label>
                                    </p>
                                @endforeach
                                <br>
                                <button type="submit" class="btn waves-effect white orange-text text-accent-2">
                                    Valider
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection