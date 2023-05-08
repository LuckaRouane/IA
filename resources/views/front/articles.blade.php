@extends('layouts.layout')

@section('title')
Liste Article
@endsection

@section('content')
@include('front.navbar')

<main role="main" class="main-content">
    <div class="container-fluid">
    <h1 class="h4 mb-1">Liste article</h1>
    <div class="row justify-content-center">
        <?php $b=0; ?>
        @foreach ($article as $a)
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="h6">{{ $a->resume }}</p>
                    <p class="text-muted">Catégorie : {{ $a->nomcategorie }}</p>
                </div>
                <div class="card-body">
                    <img src="<?php echo $a->visuel ?>" alt="{{ $a->resume }}" class="w-100">
                </div>
                <div class="card-footer">
                    <a href="{{ route('front_fiche_article', ['idarticle'=>$a->idarticle, 'titre'=>$titres[$b] ]) }}" class="btn mb-2 btn-outline-primary">Voir fiche</a>
                </div>
            </div>
        </div>
        <?php $b++; ?>
        @endforeach
    </div>
    {{ $article->render('page.pagination') }}
    </div>
</main>
@endsection