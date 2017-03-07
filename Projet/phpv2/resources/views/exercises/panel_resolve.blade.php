@extends('layouts.app')
@section('content')
    <div class="flex-container">
        <div class="flex-item-center">
            <h1>TEST DE RESOLUTION D'EXERCICE PREDEFINI</h1>
            <p>Afficher "PHPV2"</p>
        </div>
    </div>

    <div style="margin-top: 3em;" class="flex-container">
        <div class="flex-item-center">
            <b>Votre réponse : </b>
            <form id="answer" action="{{ action('ExerciseController@resolve') }}" method="POST">
                <textarea name="myanswer" rows="10" cols="50"></textarea>
                {{ csrf_field() }}
                <button type="submit">VALIDER</button>
            </form>
        </div>
    </div>

    <div>
        <h2>
            MA CONSOLE
        </h2>
        <p>
            @if(isset($console))
                @if(isset($console['errors']))
                    {{ $console['errors'] }}
                @endif
            @endif
        </p>
    </div>
@endsection
