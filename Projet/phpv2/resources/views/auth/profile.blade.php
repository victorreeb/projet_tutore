@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="{{ asset('storage/uploads/avatars/'. $user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>Votre profil</h2>
            <form enctype="multipart/form-data" action="{{ url('profile') }}" method="POST">
                <label>mettre à jour</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
