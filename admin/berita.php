<style>
td img {
  max-width: 200px;
  object-position: center;
  object-fit: cover;
}
</style>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 font-weight-bold"><?= $title ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
    <button class="btn btn-sm btn-success" id="addButton" data-toggle="modal" data-target="#beritaModal">
      <i class="fas fa-plus mr-2"></i>Tambah Data
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Berita</th>
            <th>Waktu Posting</th>
            <th>Foto Postingan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $queryBerita = select($c, 'berita', ['order' => "id_berita DESC"]);
          if ($queryBerita->num_rows > 0) :
            foreach ($queryBerita as $dataBerita) :
          ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $dataBerita['judul_berita'] ?></td>
            <td>
              <?= date('d-m-Y', strtotime($dataBerita['created_at'])) . '<br>' . date('H:i', strtotime($dataBerita['created_at'])) . ' WIB' ?>
            </td>
            <td>
              <img
                src="<?= $dataBerita['foto_berita'] != '' ? './images/berita/' . $dataBerita['foto_berita'] : './images/news.png' ?>"
                alt="<?= $dataBerita['judul_berita'] ?>">
            </td>
            <td style="white-space: nowrap;">
              <div class="table-actions text-center">
                <button type="button" class="btn btn-icon btn-sm btn-info" id="editButton" data-toggle="modal"
                  data-target="#beritaModal" onclick="editData('<?= $dataBerita['id_berita'] ?>')"><i
                    class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-icon btn-sm btn-danger"
                  onclick="deleteData('<?= $dataBerita['id_berita'] ?>')">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <?php $i++;
            endforeach;
          endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="beritaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
  aria-labelledby="beritaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content p-2">
      <form id="formData" action="./control/aksi_insert.php" method="post" data-type="add"
        enctype="multipart/form-data">
        <input type="hidden" name="id_berita" id="id_berita">
        <input type="hidden" name="old_photo" id="old_photo">
        <div class="modal-header">
          <h5 class="modal-title" id="beritaModalLabel">Data <?= $title ?? '' ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label for="judul_berita" class="col-sm-3">Judul Berita</label>
            <div class="col-sm-9">
              <input type="text" name="judul_berita" class="form-control input-sm" id="judul_berita" placeholder="Judul"
                required>
            </div>
          </div>
          <div class="form-group row">
            <label for="isi_berita" class="col-sm-3">Isi Berita</label>
            <div class="col-sm-9">
              <input id="isi_berita" type="hidden" name="isi_berita" required>
              <trix-editor input="isi_berita"></trix-editor>
            </div>
          </div>
          <div class="form-group row">
            <label for="foto_berita" class="col-sm-3">Gambar</label>
            <div class="col-sm-9">
              <input type="file" name="foto_berita" class="form-control-file input-sm" id="foto_berita">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="buttonForm" name="berita" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
window.addEventListener("DOMContentLoaded", () => {
  let addButton = document.getElementById('addButton');
  let formData = document.getElementById('formData');

  addButton.addEventListener('click', function() {
    formData.reset();
    formData.setAttribute('action', './control/aksi_insert.php');
    document.getElementById('old_photo').value = '';
  });
});

function editData(id) {
  document.getElementById('formData').setAttribute('action', './control/aksi_update.php');
  var element = document.querySelector("trix-editor");

  fetch('./control/aksi_select.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({
        'detail': 'berita',
        'id_berita': id
      })
    })
    .then(response => response.json())
    .then(data => {

      document.getElementById('id_berita').value = data.id_berita;
      document.getElementById('old_photo').value = data.foto_berita;
      document.getElementById('judul_berita').value = data.judul_berita;
      document.getElementById('isi_berita').value = data.isi_berita;
      element.editor.setSelectedRange([0, 99999])
      element.editor.insertHTML(data.isi_berita)
    })
    .catch(err => console.log(err));
}

function deleteData(id) {
  swal({
    title: "Apakah anda ingin menghapus barang?",
    text: "Data yang telah dihapus tidak dapat dikembalikan.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Delete",
    closeOnConfirm: false,
  }, function() {
    window.location = './control/aksi_delete.php?del=berita&id=' + id;
  });
}
</script>