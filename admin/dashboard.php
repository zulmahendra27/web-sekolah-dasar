<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800"><?= $title ?></h1>


<div class="row">
  <?php
  $countGuru = mysqli_fetch_assoc(select($c, 'guru', ['select' => "COUNT(*) as totalGuru"]));
  $countSiswa = mysqli_fetch_assoc(select($c, 'siswa', ['select' => "COUNT(*) as totalSiswa"]));
  $countPostingan = mysqli_fetch_assoc(select($c, 'berita', ['select' => "COUNT(*) as totalPostingan"]));
  $countEkskul = mysqli_fetch_assoc(select($c, 'ekstrakurikuler', ['select' => "COUNT(*) as totalEkskul"]));
  ?>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Jumlah Guru</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countGuru['totalGuru'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Jumlah Siswa</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countSiswa['totalSiswa'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Jumlah Postingan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countPostingan['totalPostingan'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Jumlah Ekstrakurikuler</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countEkskul['totalEkskul'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-futbol fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>