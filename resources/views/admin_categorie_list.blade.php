@extends('layouts.layout')

@section('title')
Admin - Liste Categorie
@endsection

@section('content')
@include('partials.admin_navbar')

<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
           <div class="col-md-12 my-4">
              <h1 class="h4 mb-1">Liste catégorie</h1>
              <div class="card shadow">
                <div class="card-body">
                  <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $ci=0; ?>
                        @foreach ($categorie as $c)
                        <tr>
                            <td>{{ $c->nom }}</td>
                            <td>{{ $c->description }}</td>
                            <td><a href="{{ route('admin_categorie_toupdate', ['idcategorie'=>$c->idcategorie, 'titre'=>$titres[$ci]]) }}" class="btn mb-2 btn-outline-primary">Modifier</a></td>
                        </tr>
                        <?php $ci++; ?>
                        @endforeach
                    </tbody>
                  </table>
                  {{ $categorie->render('page.pagination') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

@endsection