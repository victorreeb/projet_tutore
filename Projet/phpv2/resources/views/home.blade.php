@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in!
                    <h4>Etu</h4><hr>
                  </br><a href="{{ url('/exercises/resolve') }}" class="button btn">Commencer exercice test</a>
                  <h4>Prof</h4><hr>
                  </br><a href="{{ url('/exercises/getCreate') }}" class="button btn">Creation exercice</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
