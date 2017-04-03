@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <h3>Créer un Groupe</h3>
    <hr>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="chip red white-text">
                {{ $error }} <i class="close material-icons">close</i>

            </div>

        @endforeach
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ route('groupe.create') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12 center">
                <input type="text" id="name" name="name" class="materialize-textarea"/>
                <label for="name">Nom</label>
                <button type="submit" class="btn waves-effect orange white-text text-accent-2">Créer</button>
            </div>
        </div>
    </form>
@endsection
