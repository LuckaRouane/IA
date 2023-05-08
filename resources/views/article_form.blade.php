@extends('layouts.layout')

@section('title')
Admin - Insertion Article
@endsection

@section('content')

@include('partials.admin_navbar')

<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="card col-lg-6 col-md-8 col-10 mx-auto" enctype="multipart/form-data" action="{{ route('article_save') }}" method="post">
            @csrf
            <div class="mx-auto text-center my-4">
                <h2 class="my-3">Insertion Article</h2>
            </div>
            <div class="form-group">
                <label for="resume">Résumé</label>
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
            @isset($erreur)
            <div class="alert alert-danger" role="alert">
                <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $erreur }} 
            </div>
            @endisset
        </form>
    </div>
</div>
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