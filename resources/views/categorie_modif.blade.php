@extends('layouts.layout')

@section('title')
Admin - Modification catégorie
@endsection

@section('content')

@include('partials.admin_navbar')

<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="card col-lg-6 col-md-8 col-10 mx-auto" action="{{ route('admin_categorie_update') }}" method="post">
            @csrf
            <div class="mx-auto text-center my-4">
                <h1 class="my-3">Modification catégorie</h1>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="hidden" name="idcategorie" value="{{ $categorie->idcategorie }}">
                <input type="text" name="nom" id="nom" value="{{ $categorie->nom }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Marque</label>
                <textarea class="form-control" name="description" id="description">{{ $categorie->description }}</textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection