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
         <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                @if (Route::has('login'))
                <a href="{{ url('/home') }}" class="brand-logo">PHPv2</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Auth::check())

                            <a href="#" class="dropdown-button btn" data-activates='dropdown1' role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                               <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                               {{ Auth::user()->name }} <span class="caret"></span>
                             </a>
                              <ul class="dropdown-content" role="menu" id='dropdown1'>
                                  <li><a href="{{ url('/home') }}">Home</a></li>
                                  <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                              </ul>

                        @else
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif
                </ul>
                @endif
            </div>
        </nav>
    </body>
</html>
