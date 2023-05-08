<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>L'intelligence artificielle</title>
  <meta name="L'intelligence artificielle" content="L'intelligence artificielle">
  <meta name="description" content="L'intelligence artificielle">
  <meta name="keywords" content="L'intelligence artificielle">
  <meta name="robots" content="L'intelligence artificielle">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{  asset('assets/homepage/css/bootstrap.min.css') }}">
  {{-- <link rel="stylesheet" href="{{  asset('assets/homepage/css/bootstrap-theme.min.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{  asset('assets/homepage/css/fontAwesome.css') }}"> --}}
  <link rel="stylesheet" href="{{  asset('assets/homepage/css/tooplate-style.css') }}">
</head>

<body>
  <section class="first-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h1>Bienvenue dans l'univers de l'IA</h1>
            <div class="line-dec"></div>
            <span>Le meilleur site de renseignement sur l'Intelligence Artificielle</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="second-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <a href="{{ route('front_categories') }}">
            <div class="service-item">
              <div class="icon">
                <img width="100" height="100" src="{{ asset('assets/homepage/img/ebrecher.webp') }}" alt="">
              </div>
              <h2>Voir les catégories</h2>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-sm-6">
          <a href="{{ route('front_articles') }}">
            <div class="service-item">
              <div class="icon">
                <img width="100" height="100" src="{{ asset('assets/homepage/img/ia.webp') }}" alt="">
              </div>
              <h2>Voir les articles</h2>
            </div>
          </a>
        </div>
      </div>
  </section>

  <section class="third-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="left-image col-md-4">
            <img src="{{ asset('assets/homepage/img/intelligence-artificielle.webp') }}" alt="L' intelligence artificielle">
          </div>
          <div class="right-text col-md-8">
            <h3>L' Intelligence Artificielle</h3>
            <p>L'IA est un domaine de l'informatique qui vise à créer des systèmes capables de réaliser des tâches qui
              nécessitent normalement l'intelligence humaine, telles que la reconnaissance de la parole, la
              compréhension du langage naturel, la prise de décision, l'apprentissage et la résolution de problèmes.
              L'objectif de l'IA est de créer des systèmes qui peuvent apprendre et s'adapter à de nouvelles situations
              de manière autonome, sans intervention humaine continue.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>Copyright &copy; 2023 | Lucka Rouane</p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>