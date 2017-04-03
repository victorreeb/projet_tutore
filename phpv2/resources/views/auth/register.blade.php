@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                @yield('content')
                <!-- <div class="panel-heading">Register</div> -->
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="chip red white-text">
                                    {{ $error }} <i class="close material-icons">close</i>

                                </div>

                            @endforeach
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                <label for="pseudo" class="col-md-4 control-label">Pseudo</label>

                                <div class="col-md-6">
                                    <input id="pseudo" type="text" class="form-control" name="pseudo"
                                           value="{{ old('pseudo') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">Prénom</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname"
                                           value="{{ old('firstname') }}" required autofocus>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Adresse Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <h6>Vous êtes ?</h6>
                                <div class="row">
                                    <div class="col s4">
                                        <p>
                                            <input class="with-gap" name="role" type="radio" value="etudiant" id="role1"
                                                   checked/>
                                            <label for="role1">Etudiant</label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <input class="with-gap" name="role" type="radio" value="professeur"
                                                   id="role2"/>
                                            <label for="role2">Professeur</label>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmer mot de
                                    passe</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 center">
                                    <button type="submit" class="btn waves-effect orange white-text text-accent-2">
                                        Confirmer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
