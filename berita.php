<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h1 class="mt-4">Berita Sekolah</h1>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="row mt-5 justify-content-center">

      <!-- <div class="col-lg-8 mt-5 mt-lg-0"> -->

      <?php
      $orderBerita = "id_berita DESC";
      $queryBerita = select($c, 'berita', ['order' => $orderBerita]);
      if ($queryBerita->num_rows > 0) :
        foreach ($queryBerita as $berita) :
      ?>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-4">
            <div class="card card-body">
              <img src="admin/images/berita/<?= $berita['foto_berita'] ?>" class="img-fluid rounded" alt="...">
              <div class="course-content">
                <h5 class="mt-2">
                  <a href="?p=detail_berita&id=<?= $berita['slug_berita'] ?>"><?= substr($berita['judul_berita'], 0, 50) . ' ...' ?></a>
                </h5>
                <p class="h6"><?= substr(strip_tags($berita['isi_berita']), 0, 100) . ' ...' ?></p>
                <a href="?p=detail_berita&id=<?= $berita['slug_berita'] ?>">Read more...</a>

              </div>
            </div>
          </div> <!-- End Course Item-->

      <?php endforeach;
      endif; ?>

      <!-- </div> -->

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->