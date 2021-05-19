<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('welcome')}}" class="brand-link">
      <img src="{{asset('dist/img/isims.png')}}" alt="ISIMS Logo" class="brand-image" >
      <span class="brand-text font-weight-light">ISIMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('welcome')}}" class="d-block">Administrateur</a>
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
              <i class="nav-icon fas fa-user-graduate" ></i>
              <p>
                Etudiants
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('etudiant.create')}}" class="nav-link"> <?php //{{route('article.create')}}?>
                 <i class="fas fa-plus"></i>
                  <p>Ajouter Etudiant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('etudiant.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste des Etudiants</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Enseignants
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('enseignant.create')}}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Ajouter Enseignant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('enseignant.index')}}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Liste des Enseignants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('responsabletd.index')}}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Responsable TDs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('responsablecours.index')}}" class="nav-link">
                  <i class="fas fa-list"></i>
                  <p>Responsable Cours</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Diplomes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('diplome.create')}}" class="nav-link">
                  <i class="fas fa-plus"></i>
                  <p>Ajouter Diplome</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('diplome.index')}}" class="nav-link">
                 <i class="fas fa-list"></i>
                  <p>Liste des Diplomes</p>
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
                <li class="nav-item">
                  <a href="{{route('cours.create')}}" class="nav-link">
                    <i class="fas fa-plus"></i>
                    <p>Ajouter Cours</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('cours.index')}}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>Liste des Cours</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Groupe
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('groupe.create')}}" class="nav-link">
                    <i class="fas fa-plus"></i>
                    <p>Ajouter Groupe</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('groupe.index')}}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>Liste des Groupes</p>
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