@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
        <img src="{{ asset('storage/uploads/avatars/'. $user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <h2>Votre profil</h2></br></br></br>
        <h5>Name</h5>
        <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ Auth::user()->name }}" required autofocus>
        <h5>Pseudo</h5>
        <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ Auth::user()->pseudo }}" required autofocus>

        <button class="btn waves-effect orange white-text text-accent-2">Changer mon mot de passe</button>

        <h4>Avatar</h4>
        <form enctype="multipart/form-data" action="{{ route('profile') }}" method="POST">
            <label>Changer d'avatar</label>
            <input type="file" name="avatar">
            {{ csrf_field() }}
            <input type="submit" class="btn waves-effect orange white-text text-accent-2">
        </form>
    </div>
  </div>
@endsection
