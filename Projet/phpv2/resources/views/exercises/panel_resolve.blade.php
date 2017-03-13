@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="flex-container">
      <div class="row">
        <div class="col s4">
          <h3>Enoncé</h3>
          <p>Afficher "phpv2" dans la console</p>
          <p>Astuce : utilisez la méthode echo</p>
        </div>
        <div class="col s8">
          <h3>Votre réponse</h3>
          <style type="text/css" media="screen">
              #editor {
                  top: 0;
                  right: 0;
                  bottom: 0;
                  left: 0;
              }
          </style>
          <div id="editor" style="width:100%;height:300px;"></div>
          <form id="code" action="{{ action('ExerciseController@resolve') }}" method="POST">
            <input type="hidden" name="code" style="display: none;">
            {{ csrf_field() }}
            <button type="submit">Tester</button>
          </form>

        </div>
      </div>
      <div class="row">
        <div class="col s4">
          <h3>Tests</h3>
          <p>Test 1</p>

        </div>
        <div class="col s8">
          <h3>Résultats</h3>
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
