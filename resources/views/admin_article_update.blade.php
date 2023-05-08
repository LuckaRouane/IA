@extends('layouts.layout')

@section('title')
{{ $article->resume }}
@endsection

@section('content')

@include('partials.admin_navbar')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h1 class="h2 mb-4 page-title">Fiche article</h1>
                    <form enctype="multipart/form-data" action="{{ route('article_update') }}" method="post">
                        @csrf
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
                        <hr class="my-4">
                        <h1 class="h2">Modification article</h2>
                        <div class="form-group">
                            <label for="resume">Résumé</label>
                            <input type="hidden" name="idarticle" value="{{ $article->idarticle }}">
                            <input type="text" name="resume" id="resume" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" id="categorie" name="idcategorie" >
                                @foreach ($categorie as $c)
                                    <option value="{{ $c->idcategorie }}">{{ $c->nom }}</option>                
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contenu">Contenu</label>
                            <textarea class="ckeditor form-control" id="contenu" name="contenu" cols="50" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">Image</label>
                            <input type="file" id="img" size="50000000" onchange="convertToBase64()" class="form-control-file" />
                            <input type="hidden" id="visuel" name="visuel">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
                        </div>
                        @isset($success)
                        <div class="alert alert-success" role="alert">
                            <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $success }} 
                        </div>
                        @endisset
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script>
    const imageInput = document.getElementById('img');
    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];

        const reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = () => {
            const base64String = reader.result.split(',')[1];
            document.getElementById('visuel').value = "data:image/*;base64," + base64String;
            console.log(base64String);
        };
    });    
</script>

@endsection