<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 font-weight-bold"><?= $title ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
  </div>
  <div class="card-body">
    <form action="./control/aksi_update.php" method="post" enctype="multipart/form-data">
      <?php
      $queryMeta = select($c, 'meta');
      if ($queryMeta->num_rows > 0) :
        foreach ($queryMeta as $dataMeta) :
      ?>
          <div class="form-group row">
            <label for="<?= $dataMeta['kunci'] ?>" class="col-sm-2 col-form-label"><?= ucwords(implode(' ', explode('_', $dataMeta['kunci']))) ?></label>
            <div class="col-sm-10">
              <?php if ($dataMeta['kunci'] == 'misi') : ?>
                <input id="<?= $dataMeta['kunci'] ?>" type="hidden" name="<?= $dataMeta['kunci'] ?>" value="<?= htmlspecialchars($dataMeta['value']) ?>">
                <trix-editor input="<?= $dataMeta['kunci'] ?>"></trix-editor>
              <?php elseif (in_array($dataMeta['kunci'], ['foto_kepsek', 'banner_depan'])) : ?>
                <div class="row">
                  <div class="col-lg-3">
                    <img src="./images/<?= $dataMeta['value'] ?>" alt="Foto Kepsek" class="img-fluid rounded">
                  </div>
                  <div class="col-lg-9">
                    <label class="form-label" for="<?= $dataMeta['kunci'] ?>">Ganti Foto</label>
                    <div class="form-group mb-0">
                      <input type="hidden" name="old_<?= $dataMeta['kunci'] ?>" value="<?= $dataMeta['value'] ?>">
                      <input type="file" name="<?= $dataMeta['kunci'] ?>" id="<?= $dataMeta['kunci'] ?>">
                    </div>
                    <?php if ($dataMeta['kunci'] == 'foto_kepsek') : ?>
                      <small class="text-danger">Upload foto ukuran 3x4 agar tampilan proporsional</small>
                    <?php endif; ?>
                  </div>
                </div>
              <?php elseif (in_array($dataMeta['kunci'], ['status_ppdb'])) : ?>
                <select name="<?= $dataMeta['kunci'] ?>" id="<?= $dataMeta['kunci'] ?>" class="form-control">
                  <option value="Buka" <?= $dataMeta['value'] == 'Buka' ? 'selected' : '' ?>>Buka</option>
                  <option value="Tutup" <?= $dataMeta['value'] == 'Tutup' ? 'selected' : '' ?>>Tutup</option>
                </select>
              <?php else : ?>
                <input type="text" value="<?= $dataMeta['value'] ?>" name="<?= $dataMeta['kunci'] ?>" class="form-control" id="<?= $dataMeta['kunci'] ?>">
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" name="update_meta" class="btn btn-success">Update</button>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

</div>