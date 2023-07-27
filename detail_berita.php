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

      <div class="col-lg-8 mt-5 mt-lg-0">

        <?php
        if (!isset($_GET['id'])) :
          echo "<script>window.location='./main.php?p=dashboard'</script>";
          return;
        else :
          $slug = $_GET['id'];

          $whereBerita = "slug_berita='$slug'";
          $queryBerita = select($c, 'berita', ['where' => $whereBerita]);

          if ($queryBerita->num_rows == 0) :
            echo "<script>alert('Berita tidak ditemukan')</script>";
            echo "<script>window.location='./main.php?p=dashboard'</script>";
            return;
          else :
            foreach ($queryBerita as $berita) :
        ?>
        <div class="text-center">
          <img class="img-fluid rounded" src="./admin/images/berita/<?= $berita['foto_berita'] ?>"
            alt="<?= $berita['judul_berita'] ?>">
        </div>
        <h3 class="text-center my-4"><?= $berita['judul_berita'] ?></h3>
        <div><?= $berita['isi_berita'] ?></div>
        <?php
            endforeach;
          endif;
        endif;
        ?>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->