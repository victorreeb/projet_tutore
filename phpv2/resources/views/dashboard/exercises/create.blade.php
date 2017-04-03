@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <h3>Création Exercice</h3>
    <hr>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="chip red">
                {{ $error }} <i class="close material-icons">close</i>
            </div>
        @endforeach
    @endif
    <p>Etape 1/2 : informations sur l'exercice</p>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('exercise.create') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="name" name="name" class="materialize-textarea"/>
                <label for="name">Nom</label>
            </div>
            <div class="input-field col s12">
                <input type="text" id="description" name="description" class="materialize-textarea"/>
                <label for="description">Consigne</label>
            </div>
            <div class="input-field col s12">
                <input type="text" id="astuce" name="astuce" class="materialize-textarea"/>
                <label for="astuce">Astuce</label>
            </div>
            <div class="input-field col s12 center">
                <p class="range-field">
                    Difficulté de l'exercice
                    <input type="range" id="difficulte" name="difficulte" min="1" max="5"/>
                </p>
                <button type="submit" class="btn waves-effect orange white-text text-accent-2">Suivant</button>
            </div>
        </div>
    </form>
@endsection
