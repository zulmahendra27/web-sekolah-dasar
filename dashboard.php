<?php
$queryCount = $c->query("SELECT 'guru' AS tabel, COUNT(*) AS jumlah_row FROM guru UNION ALL SELECT 'siswa' AS tabel, COUNT(*) AS jumlah_row FROM siswa UNION ALL SELECT 'ekstrakurikuler' AS tabel, COUNT(*) AS jumlah_row FROM ekstrakurikuler UNION ALL SELECT 'berita' AS tabel, COUNT(*) AS jumlah_row FROM berita");

foreach ($queryCount as $value) {
  $meta[$value['tabel']] = $value['jumlah_row'];
}
?>
<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-3 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="./admin/images/<?= $meta['foto_kepsek'] ?>" class="img-fluid rounded" alt="">
          <div class="text-center">
            <h6 class="mt-2 mb-0"><?= $meta['kepsek'] ?></h6>
            <small>Kepala Sekolah</small>
          </div>
        </div>
        <div class="col-lg-9 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <div class="text-center">
            <h5 class="fw-bold">VISI</h5>
            <h3><?= $meta['visi'] ?></h3>
          </div>
          <hr>
          <h5 class="fw-bold text-center">MISI</h5>
          <p><?= $meta['misi'] ?></p>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="<?= $meta['guru'] ?>" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>Guru</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="<?= $meta['siswa'] ?>" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>Siswa</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="<?= $meta['ekstrakurikuler'] ?>"
            data-purecounter-duration="1" class="purecounter"></span>
          <p>Ekstrakurikuler</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="<?= $meta['berita'] ?>" data-purecounter-duration="1"
            class="purecounter"></span>
          <p>Postingan</p>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-md-6">
          <div class="section-title pb-0">
            <h2><?= $WEB_NAME ?></h2>
            <p>Berita Sekolah</p>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
          <a href="?p=berita">Lihat Semua Berita</a>
        </div>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php
        $orderBerita = "id_berita DESC";
        $queryBerita = select($c, 'berita', ['order' => $orderBerita, 'limit' => 6]);
        if ($queryBerita->num_rows > 0) :
          foreach ($queryBerita as $berita) :
        ?>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-4">
          <div class="course-item">
            <img src="admin/images/berita/<?= $berita['foto_berita'] ?>" class="img-fluid" alt="...">
            <div class="course-content">
              <h3><a
                  href="?p=detail_berita&id=<?= $berita['slug_berita'] ?>"><?= substr($berita['judul_berita'], 0, 50) . ' ...' ?></a>
              </h3>
              <p><?= substr(strip_tags($berita['isi_berita']), 0, 100) . ' ...' ?></p>
              <a href="?p=detail_berita&id=<?= $berita['slug_berita'] ?>">Read more...</a>

            </div>
          </div>
        </div> <!-- End Course Item-->

        <?php endforeach;
        endif; ?>

      </div>

    </div>
  </section><!-- End Popular Courses Section -->
  <!-- <hr> -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features pb-0">
    <div class="container" data-aos="fade-up">

      <div class="section-title mb-4 pt-1 pb-0">
        <h2><?= $WEB_NAME ?></h2>
        <p>Ekstrakurikuler</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php
        $joinEkskul = 'LEFT JOIN guru b ON a.pembina=b.id_guru';
        $queryEkskul = select($c, 'ekstrakurikuler a', ['join' => $joinEkskul]);
        if ($queryEkskul->num_rows > 0) :
          foreach ($queryEkskul as $ekskul) :
        ?>

        <div class="col-lg-3 col-md-4 mb-3">
          <div class="card card-body text-center">
            <!-- <i class="ri-store-line" style="color: #ffbb2c;"></i> -->
            <h5 class="fw-bold"><?= $ekskul['nama_ekstrakurikuler'] ?></h5>
            <small>Pembina: <?= $ekskul['nama_guru'] ?></small>
            <small>Jumlah Siswa Mengikuti: <?= $ekskul['siswa_mengikuti'] ?></small>
          </div>
        </div>

        <?php
          endforeach;
        endif;
        ?>

      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
      <!-- <h3 class="fw-bold mb-4 mt-0 text-center">Daftar Guru</h3> -->
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="section-title pb-0">
            <h2><?= $WEB_NAME ?></h2>
            <p>Daftar Guru</p>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
          <a href="?p=guru">Lihat Semua Guru</a>
        </div>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php
        $queryGuru = select($c, 'guru');
        $newGuru = array();
        if ($queryGuru->num_rows > 0) :
          foreach ($queryGuru as $guru) :
            $newGuru[] = $guru;
          endforeach;

          $countGuru = count($newGuru);
          // var_dump($newGuru);
          for ($i = 0; $i < 3; $i++) :
            $random = mt_rand(0, ($countGuru - 1));
        ?>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img
              src="<?= $newGuru[$random]['foto_guru'] != 'user.png' ? './admin/images/guru/' . $newGuru[$random]['foto_guru'] : './admin/images/user.png' ?>"
              class="img-fluid rounded" alt="<?= $guru['foto_guru'] ?>">
            <div class="member-content">
              <h4><?= $newGuru[$random]['nama_guru'] ?></h4>
              <!-- <span>Web Development</span> -->
              <!-- <p>
                    Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut
                    aut aut
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div> -->
            </div>
          </div>
        </div>

        <?php
          endfor;
        endif;
        ?>

      </div>

    </div>
  </section><!-- End Trainers Section -->

</main><!-- End #main -->