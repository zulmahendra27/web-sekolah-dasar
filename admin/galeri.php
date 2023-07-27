<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 font-weight-bold"><?= $title ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
  </div>
  <div class="card-body">
    <form action="./control/aksi_insert.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-4 form-group">
          <label for="foto">Upload Foto</label>
          <input type="file" name="foto[]" id="foto" multiple class="form-control-file form-control-sm">
        </div>
      </div>

      <button type="submit" name="upload_galeri" class="btn btn-success btn-sm">Upload</button>
    </form>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Foto Galeri</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <?php
      $query = select($c, 'galeri', ['order' => "ORDER BY id_galeri DESC"]);
      foreach ($query as $galeri) :
      ?>
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body p-0" style="height: 250px;">
            <img class="img-fluid img-thumbnail rounded mh-100 w-100" src="<?= "../images/" . $galeri['foto'] ?>"
              alt="<?= $galeri['foto'] ?>" style="height: 100%; object-fit: cover; object-position: center;">
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>