<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="?p=dashboard"><?= $WEB_NAME ?></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li>
          <a class="<?= isset($_GET['p']) ? ($_GET['p'] == 'dashboard' ? 'active' : '') : 'active' ?>"
            href="?p=dashboard">Home</a>
        </li>
        <li>
          <a class="<?= in_array($_GET['p'], ['berita', 'detail_berita']) ? 'active' : '' ?>"
            href="?p=berita">Berita</a>
        </li>
        <li>
          <a class="<?= in_array($_GET['p'], ['guru']) ? 'active' : '' ?>" href="?p=guru">Guru</a>
        </li>
        <li class="dropdown">
          <a href="#" class="<?= in_array($_GET['p'], ['ppdb', 'finalisasi_ppdb']) ? 'active' : '' ?>">
            <span>PPDB</span>
            <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="?p=ppdb" class="<?= $_GET['p'] == 'ppdb' ? 'active' : '' ?>">Daftar</a></li>
            <li><a href="?p=finalisasi_ppdb" class="<?= $_GET['p'] == 'finalisasi_ppdb' ? 'active' : '' ?>">Cek
                Pendaftaran</a></li>
          </ul>
        </li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <a href="admin/" class="get-started-btn">Login Admin</a>

  </div>
</header><!-- End Header -->