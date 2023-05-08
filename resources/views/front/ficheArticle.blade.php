@extends('layouts.layout')

@section('title')
{{ $article->resume }}
@endsection

@section('content')

@include('front.navbar')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h1 class="h2 mb-4 page-title">Fiche article</h1>
                    <div class="row mt-5 align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?php echo $article->visuel ?>" alt="{{ $article->resume }}" class="avatar-img">
                        </div>
                        <div class="col">
                            <div class="row mb-4">
                                <div class="col-md-7">
                                <h2 class="h4 mb-2"><p class="small mb-3"><span class="badge badge-dark">Résumé</span></p>{{ $article->resume }}</h2>
                                </div>
                                <div class="col">
                                    <p><p class="small mb-3"><span class="badge badge-dark">Catégorie</span></p>{{ $article->nomcategorie }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card row mt-5 align-items-center">
                        <?php echo $article->contenu ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection