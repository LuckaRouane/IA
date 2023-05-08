<nav class="topnav navbar navbar-light">
  <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
        <i class="fe fe-sun fe-16"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('admin_acceuil') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Acceuil</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('admin_categorie_form') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-file-plus fe-16"></i>
            <span class="ml-3 item-text">Ajout Catégorie</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('admin_categorie_list') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-package fe-16"></i>
            <span class="ml-3 item-text">Liste catégorie</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('article_list') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-map fe-16"></i>
            <span class="ml-3 item-text">Liste article</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('article_form') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-save fe-16"></i>
            <span class="ml-3 item-text">Ajout Article</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('admin_deconnect') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-log-out fe-16"></i>
            <span class="ml-3 item-text">Se déconnecter</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>