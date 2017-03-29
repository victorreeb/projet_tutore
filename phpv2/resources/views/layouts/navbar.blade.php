<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHPV2</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
<nav class="orange accent-2">
    <div class="nav-wrapper">
        @if (Route::has('login'))
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ route('exercise.index') }}">Exercices</a></li>
                <li><a href="{{ route('groupe.index') }}">Groupes</a></li>
            </ul>
            <a href="{{ url('/') }}" class="brand-logo center">PHPv2</a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @if (Auth::check())
                    <a href="#" class="dropdown-button btn" style="background-color: transparent" data-activates='dropdown1'>
                        <img class="responsive-img circle" style="width: auto;height: 100%;"
                             src="{{URL::asset('storage/uploads/avatars')}}/{{ Auth::user()->avatar }}">
                        <i class="large material-icons right">reorder</i>
                    </a>
                    <ul class="dropdown-content" id='dropdown1'>
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li><a href="{{ route('profile') }}"><i class="fa fa-btn fa-user"></i>Profil</a></li>
                        <li><a href="{{ route('auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a>
                        </li>
                    </ul>

                @else
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                @endif
            </ul>
        @endif
    </div>
</nav>

</body>
</html>
