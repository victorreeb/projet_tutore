@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="flex-container">
      <div class="row">
        <div class="col s4">
          <h4>{{ $exercise->name }}</h4>
          <p>{{ $exercise->description }}</p>
        </div>
        <div class="col s8">
          <h4>Votre réponse</h4>
          <style type="text/css" media="screen">
              #editor {
                  top: 0;
                  right: 0;
                  bottom: 0;
                  left: 0;
              }
          </style>
          <div id="editor" style="width:100%;height:350px;"></div>
          <br>
          <form id="code" action="{{ route('exercise.resolve', ['id' => $exercise->id]) }}" method="POST">
            <input type="hidden" name="code" style="display: none;">
            {{ csrf_field() }}
            <button class="btn waves-effect waves-light" type="submit">Tester</button>
          </form>

        </div>
      </div>
      <div class="row">
        <div class="col s4">
          <h4>Tests</h4>
          @if(!empty($tests))
            @if(count($tests) > 0)
              @foreach($tests as $test)
                <div class="row">
                  <div class="col s4">
                    <p><b>{{ $test->name }}</b></p>
                  </div>
                  <div class="col s4">
                    <p>{{ $test->description }}</p>
                  </div>
                  <div class="col s4">
                    @if($test->result == null)
                      <p>en cours</p>
                    @else
                      <p>{{ $test->result }}</p>
                    @endif
                  </div>
                </div>
              @endforeach
            @endif
          @endif
        </div>
        <div class="col s8">
          <h4>Résultats</h4>
              @if(!empty($console))
              <p>
                @if(!empty($console['errors']))
                  {!! $console['errors'] !!}
                @endif
              </p>
              @if(!empty($console['exit']))
                <b>Affichage de sortie</b>
                <p>
                  {!! $console['exit'] !!}
                @endif
              </p>
              @endif
        </div>
      </div>
    </div>

    <div>

    </div>
    <script src="{{ asset('js/ace-src/ace.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setValue("<\?php");
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setMode("ace/mode/php");
        var input = $('input[name="code"]');
          editor.getSession().on("change", function () {
          input.val(editor.getSession().getValue());
        });
    </script>
@endsection
