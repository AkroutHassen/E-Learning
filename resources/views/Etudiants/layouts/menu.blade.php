<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('etudiant.infos.show', session('id')) }}" class="brand-link">
      <img src="{{asset('dist/img/isims.png')}}" alt="ISIMS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Learning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ session('prenom'). ' '. session('nom') }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('etudiant.infos.show', session('id'))}}" class="nav-link"> <?php //{{route('article.create')}}?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infos personnelles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Diplomes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('etudiant.diplome.index')}}" class="nav-link"> <?php //{{route('article.create')}}?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des diplomes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cours
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
            //function alert($msg) {
              //echo "<script type='text/javascript'>alert('.$msg.');</script>";
              //}
              ?>
              @if (null !== session('codeDip'))
                @php
                    $href = route('etudiant.cours.index');
                @endphp             
              @else
                @php
                  //alert("Priere de vous s'inscrire dans un diplome");
                  //echo "<script>alert('Priere de vous s\'inscrire dans un diplome');</script>";
                  $href = route('etudiant.diplome.index');
                @endphp  
              @endif
              <li class="nav-item">
                <a href="{{ $href }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des cours</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullseye"></i>
              <p>
                Notes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (null !== session('codeDip'))
                @php
                    $href = route('etudiant.note.show', session('id'));
                @endphp             
              @else
                @php
                  //alert("Priere de vous s'inscrire dans un diplome");
                  //echo "<script>alert('Priere de vous s\'inscrire dans un diplome');</script>";
                  $href = route('etudiant.diplome.index');
                @endphp  
              @endif
              <li class="nav-item">
                <a href="{{ $href }}" class="nav-link"> <?php //{{route('article.create')}}?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Relevé des notes</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>