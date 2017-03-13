@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="flex-container">
      <div class="row">
        <div class="col s6">
          <h3>Enoncé</h3>
          <p>Afficher "phpv2" dans la console</p>
          <p>Astuce : utilisez la méthode echo</p>
        </div>
        <div class="col s6">
          <h3>Votre réponse</h3>
          <form id="code" action="{{ action('ExerciseController@resolve') }}" method="POST">
              <textarea name="code" rows="10" cols="50"></textarea>
              {{ csrf_field() }}
              <button type="submit">VALIDER</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          <h3>Console</h3>
          <p>
              @if(isset($console))
                  @if(isset($console['errors']))
                      {!! $console['errors'] !!}
                  @endif
                  @if(isset($console['tests']))
                      {!! $console['tests'] !!}
                  @endif
              @endif
          </p>
        </div>
        <div class="col s6">
          <h3>Tests</h3>
          <p>Test 1</p>
        </div>
      </div>
    </div>

    <div>

    </div>
@endsection
