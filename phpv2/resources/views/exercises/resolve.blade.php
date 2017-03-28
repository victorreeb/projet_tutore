@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="row code_typing">
        <div class="center-align">
            <h4>{{ $exercise->name }}</h4>
            <div class="col s12 m4 l2">
                <div class="card-panel large" style="background-color: #272822">
                    <div class="card-content white-text">
                        <span class="card-title"><h4>Consigne :</h4></span>
                        <p class="flow-text">
                            {{ $exercise->description }}
                        </p>
                        <hr>
                        <span class="card-title">
                            <h4>
                                <i class="material-icons">info</i>
                                Astuces :
                            </h4>
                        </span>
                        <p class="flow-text">
                            {{ $exercise->astuce }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col s12 m4 l8">
                <br>
                <style type="text/css" media="screen">
                    #editor {
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                    }
                </style>
                <div id="editor" style="width:100%;height: 400px;"></div>
            </div>


            <div class="col s12 m4 l2">

                <div class="card-panel large" style="background-color: #272822">
                    <div class="card-content white-text">
                        <span class="card-title"><h4>Tests :</h4></span>
                        @if(!empty($tests))
                            @if(sizeof($tests) > 0)
                                <table class="centered bordered">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Résultat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tests as $test)
                                        <tr>
                                            <td>{{ $test->name }}</td>
                                            <td>{{ $test->description }}</td>
                                            <td><b>
                                                    @if($test->result == null)
                                                        <p class="amber-text">en cours</p>
                                                    @elseif($test->result == "validé")
                                                        <p class="green-text text-darken-3">{{ $test->result }}</p>
                                                    @else
                                                        <p class="red-text text-darken-4">{{ $test->result }}</p>
                                                    @endif
                                                </b>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endif
                        <h4>Résultat</h4>
                        @if(isset($validated) and $validated == true)
                            <p class="green-text text-darken-3">exercice résolu</p>
                        @else
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
                            @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row center-align">
        <div class="s12">
            @if(isset($validated) and $validated == true)
                <a class="btn-large waves-effect waves-light"
                   href="{{ route('exercise.show', ['id' => $exercise->id]) }}">Terminer</a>
            @else
                <form id="code" action="{{ route('exercise.resolve', ['id' => $exercise->id]) }}" method="POST">
                    <input type="hidden" name="code" style="display: none;">
                    {{ csrf_field() }}
                    <button class="btn-large waves-effect waves-light" type="submit">Soumettre mon code</button>
                </form>
            @endif
        </div>
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
