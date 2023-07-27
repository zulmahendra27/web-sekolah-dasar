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
    <button class="btn btn-sm btn-success" id="addButton" data-toggle="modal" data-target="#ekstrakurikulerModal">
      <i class="fas fa-plus mr-2"></i>Tambah Data
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Ekstrakurikuler</th>
            <th>Guru Pembina</th>
            <th>Jumlah Siswa Mengikuti</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $join = "INNER JOIN guru b ON a.pembina=b.id_guru";
          $queryEkstrakurikuler = select($c, 'ekstrakurikuler a', ['join' => $join]);
          if ($queryEkstrakurikuler->num_rows > 0) :
            foreach ($queryEkstrakurikuler as $dataEkstrakurikuler) :
          ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $dataEkstrakurikuler['nama_ekstrakurikuler'] ?></td>
                <td><?= $dataEkstrakurikuler['nama_guru'] ?></td>
                <td><?= $dataEkstrakurikuler['siswa_mengikuti'] ?></td>
                <td style="white-space: nowrap;">
                  <div class="table-actions text-center">
                    <button type="button" class="btn btn-icon btn-sm btn-info" id="editButton" data-toggle="modal" data-target="#ekstrakurikulerModal" onclick="editData('<?= $dataEkstrakurikuler['id_ekstrakurikuler'] ?>')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-icon btn-sm btn-danger" onclick="deleteData('<?= $dataEkstrakurikuler['id_ekstrakurikuler'] ?>')">
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

<div class="modal fade" id="ekstrakurikulerModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ekstrakurikulerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content p-2">
      <form id="formData" action="./control/aksi_insert.php" method="post" data-type="add">
        <input type="hidden" name="id_ekstrakurikuler" id="id_ekstrakurikuler">
        <div class="modal-header">
          <h5 class="modal-title" id="ekstrakurikulerModalLabel">Data <?= $title ?? '' ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label for="nama_ekstrakurikuler" class="col-sm-3">Nama Ekstrakurikuler</label>
            <div class="col-sm-9">
              <input type="text" name="nama_ekstrakurikuler" class="form-control input-sm" id="nama_ekstrakurikuler" placeholder="Nama Ekstrakurikuler" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="pembina" class="col-sm-3">Pembina</label>
            <div class="col-sm-9">
              <select name="pembina" id="pembina" class="form-control input-sm">
                <?php
                $queryPembina = select($c, 'guru');
                if ($queryPembina->num_rows > 0) :
                  foreach ($queryPembina as $pembina) :
                ?>
                    <option value="<?= $pembina['id_guru'] ?>"><?= $pembina['nama_guru'] ?></option>
                <?php endforeach;
                endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="siswa_mengikuti" class="col-sm-3">Jumlah Siswa Mengikuti</label>
            <div class="col-sm-9">
              <input type="number" value="1" min="1" name="siswa_mengikuti" class="form-control input-sm" id="siswa_mengikuti" placeholder="Jumlah Siswa Mengikuti" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="buttonForm" name="ekstrakurikuler" class="btn btn-primary">Simpan</button>
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
    });
  });

  function editData(id) {
    document.getElementById('formData').setAttribute('action', './control/aksi_update.php');

    fetch('./control/aksi_select.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
          'detail': 'ekstrakurikuler',
          'id_ekstrakurikuler': id
        })
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById('id_ekstrakurikuler').value = data.id_ekstrakurikuler;
        document.getElementById('nama_ekstrakurikuler').value = data.nama_ekstrakurikuler;
        document.getElementById('siswa_mengikuti').value = data.siswa_mengikuti;

        let pembina = document.getElementById("pembina");

        for (let i = 0; i < pembina.options.length; i++) {
          if (pembina.options[i].value == data.pembina) {
            pembina.options[i].selected = true;
            break;
          }
        }
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
      window.location = './control/aksi_delete.php?del=ekstrakurikuler&id=' + id;
    });
  }
</script>