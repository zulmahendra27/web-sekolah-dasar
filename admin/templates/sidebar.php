<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?p=dashboard">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-home"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><?= $WEB_NAME ?></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= !isset($_GET['p']) ? 'active' : ($_GET['p'] == 'dashboard' ? 'active' : '') ?>">
    <a class="nav-link" href="?p=dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Berita Sekolah -->
  <li class="nav-item <?= $_GET['p'] == 'berita' ? 'active' : '' ?>">
    <a class="nav-link" href="?p=berita">
      <i class="fas fa-fw fa-newspaper"></i>
      <span>Berita Sekolah</span></a>
  </li>
  <!-- Nav Item - Guru -->
  <li class="nav-item <?= $_GET['p'] == 'guru' ? 'active' : '' ?>">
    <a class="nav-link" href="?p=guru">
      <i class="fas fa-fw fa-user"></i>
      <span>Guru</span></a>
  </li>
  <!-- Nav Item - Siswa -->
  <li class="nav-item <?= $_GET['p'] == 'siswa' ? 'active' : '' ?>">
    <a class="nav-link" href="?p=siswa">
      <i class="fas fa-fw fa-users"></i>
      <span>Siswa</span></a>
  </li>
  <!-- Nav Item - Ekstrakurikuler -->
  <li class="nav-item <?= $_GET['p'] == 'ekstrakurikuler' ? 'active' : '' ?>">
    <a class="nav-link" href="?p=ekstrakurikuler">
      <i class="fas fa-fw fa-futbol"></i>
      <span>Ekstrakurikuler</span></a>
  </li>
  <!-- Nav Item - PPDB -->
  <li class="nav-item <?= $_GET['p'] == 'ppdb' ? 'active' : '' ?>">
    <a class="nav-link" href="?p=ppdb">
      <i class="fas fa-fw fa-user-check"></i>
      <span>PPDB</span></a>
  </li>
  <!-- Nav Item - Meta Web -->
  <li class="nav-item <?= $_GET['p'] == 'meta' ? 'active' : '' ?>">
    <a class="nav-link" href="?p=meta">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Meta Web</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->