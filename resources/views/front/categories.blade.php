@extends('layouts.layout')

@section('title')
Liste Catégorie
@endsection

@section('content')
@include('front.navbar')

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
                            <th>Déscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorie as $c)
                        <tr>
                            <td>{{ $c->nom }}</td>
                            <td>{{ $c->description }}</td>
                        </tr>
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