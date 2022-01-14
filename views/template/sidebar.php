<!-- Sidebar -->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #0097a7" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-address-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Buku Tamu </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">
            <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan/index'); ?>">
          <i class="far fa-file-pdf"></i>
          <span>Laporan</span></a>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/daftar'); ?>">
          <i class="far fa-address-book"></i>
          <span>Daftar</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/index'); ?>">
          <i class="far fa-fw fa-user"></i>
          <span>Profil</span></a>
      </li>

           
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>LogOut</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->