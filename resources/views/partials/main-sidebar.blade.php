 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo.png" alt="Ristekdikti Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MIPT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
           <router-link to="/dashboard" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          <div id="myDiv">
          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/profile" class="ml-2 nav-link ">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Profile</p>
                <router-link>
              </li>
              @can('admin')
              <li class="nav-item">
                <router-link to="/users" class=" ml-2 nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Manajemen User</p>
                </router-link>
              </li>
              @endcan
            </ul>
          </li><li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                 Kusioner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            @can('admin')
              <li class="nav-item">
                <a href="#" class="nav-link ml-2">
                  <i class="fas fa-pen-square nav-icon"></i>
                  <p>Pembuatan Kusioner</p>
                </a>
              </li> 
              @endcan
              @can('verifikator')
              <li class="nav-item">
                <a href="#" class="nav-link ml-2">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Verifikasi Kusioner</p>
                </a>
              </li>
              @endcan
              @can('admin')
              <li class="nav-item">
                <a href="#" class="nav-link ml-2">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Verifikasi Kusioner</p>
                </a>
              </li>
              @endcan
              @can('user')
              <li class="nav-item">
                <a href="#" class="nav-link ml-2">
                  <i class="fas fa-spell-check nav-icon"></i>
                  <p>Pengisian Kusioner</p>
                </a>
              </li>
              @endcan
              @can('admin')
              <li class="nav-item">
                <a href="#" class="nav-link ml-2">
                  <i class="fas fa-spell-check nav-icon"></i>
                  <p>Pengisian Kusioner</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          
          </div>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>