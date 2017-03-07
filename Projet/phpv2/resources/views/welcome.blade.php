<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>


    <header class="row">
        @include('includes.header')
    </header>

<div class="container">
    <div id="main" class="row">
        @yield('content')
    </div>
</div>

    <footer class="row">
        Projet tutoré 2016
        <!-- @include('includes.footer') -->
    </footer>


</body>
</html>
