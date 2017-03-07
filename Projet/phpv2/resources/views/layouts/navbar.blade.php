<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    </head>
    <body>
        @section('nav')
        <nav>
            <div class="nav-wrapper">
                @if (Route::has('login'))
                <a href="#" class="brand-logo">PHPv2</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            <li><a href="#">Déconnexion</a></li>
                        @else
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif
                </ul>
                @endif
            </div>
        </nav>
        @endsection
    </body>
</html>
