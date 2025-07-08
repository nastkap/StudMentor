<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class=" rotate-n-5">
    <i class="fas fa-terminal"></i>
  </div>
  <div class="sidebar-brand-text mx-3">STUDMENTOR</div>
</a>
  <hr class="sidebar-divider my-0">
  <!-- Element nawigacyjny - Strona główna -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Strona główna</span></a>
  </li>

  <!-- Element nawigacyjny - Pytania -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('questions') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Pytania</span></a>
  </li>

  <!-- Element nawigacyjny - Dokumenty -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('documents') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dokumenty</span></a>
  </li>
  
  <!-- Element nawigacyjny - Profil -->
  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profil</span></a>
  </li>
  
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Przycisk do ukrywania/pokazywania bocznego paska, ukryty na większych ekranach -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>