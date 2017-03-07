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
