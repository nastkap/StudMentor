<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <!-- Przycisk do przełączania paska bocznego (sidebar) na urządzeniach o szerokości mniejszej niż 'md' -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
 <!-- Prawa strona paska nawigacyjnego -->
  <ul class="navbar-nav ml-auto">
    <!-- Separator paska nawigacyjnego widoczny tylko na większych ekranach -->
    <div class="topbar-divider d-none d-sm-block"></div>
     <!-- Element nawigacyjny typu dropdown z informacjami o zalogowanym użytkowniku -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <!-- Wyświetlanie nazwy użytkownika i poziomu dostępu --> 
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          {{ auth()->user()->name }}
          <br>
          <small>{{ auth()->user()->role }}</small>
        </span>
        <!-- Ikona profilu użytkownika -->
        <img class="img-profile rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg">
      </a>
    <!-- Menu rozwijane dla użytkownika -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
       <!-- Opcja menu: Przejście do profilu użytkownika -->
      <a class="dropdown-item" href="/profile">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profil
        </a>
      <!-- Separator w menu -->
        <div class="dropdown-divider"></div>
        <!-- Opcja menu: Wylogowanie -->
        <a class="dropdown-item" href="{{ route('logout') }}">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Wyloguj się
        </a>
    </li>
  </ul>
</nav>