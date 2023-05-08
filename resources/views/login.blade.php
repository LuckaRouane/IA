@extends('layouts.layout')

@section('title')
Admin - Page de connexion
@endsection

@section('content')

<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="card col-lg-3 col-md-4 col-10 mx-auto" action="{{ route('admin_log') }}" method="post">
            @csrf
            <div class="mx-auto text-center my-4">
                <h2 class="my-3">Login</h2>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" value="Admin" name="nom" id="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" value="Admin" class="form-control" name="mdp" id="mdp">
            </div>
            <div class="form-group">
                <button class="btn btn-md btn-primary btn-block" type="submit">Se connecter</button>
            </div>
            @isset($erreur)
            <div class="alert alert-danger" role="alert">
                <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $erreur }} 
            </div>
            @endisset
            <div class="form-group">
                <a href="{{ route('welcome') }}" class="btn mb-2 btn-link">Revenir à l'accueil</a>
            </div>
        </form>
    </div>
</div>

@endsection