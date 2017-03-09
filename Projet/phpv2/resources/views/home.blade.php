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
                    <a href="{{ url('/exercises/begin') }}">Commencer exercice test</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
