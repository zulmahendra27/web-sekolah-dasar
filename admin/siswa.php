<style>
td img {
  max-width: 100px;
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
    <button class="btn btn-sm btn-success" id="addButton" data-toggle="modal" data-target="#siswaModal">
      <i class="fas fa-plus mr-2"></i>Tambah Data
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="dataTable" class="table table-bordered small" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Tempat /<br>Tanggal Lahir</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          $query = select($c, 'siswa');
          while ($data = mysqli_fetch_assoc($query)) : ?>
          <tr>
            <td><?= $i ?></td>
            <td>
              <img
                src="<?= $data['foto_siswa'] != '' ? './images/siswa/' . $data['foto_siswa'] : './images/user.png' ?>"
                alt="<?= $data['nama_siswa'] ?>">
            </td>
            <td><?= $data['nisn'] == '' ? '-' : $data['nisn'] ?></td>
            <td><?= $data['nama_siswa'] ?></td>
            <td><?= $data['tempat_lahir_siswa'] . ' /<br>' . date('d-m-Y', strtotime($data['tanggal_lahir_siswa'])) ?>
            </td>
            <td><?= $data['email_siswa'] != '' ? $data['email_siswa'] : '-' ?></td>
            <td><?= $data['nohp_siswa'] != '' ? $data['nohp_siswa'] : '-' ?></td>
            <td style="white-space: nowrap;">
              <div class="table-actions text-center">
                <button type="button" class="btn btn-icon btn-sm btn-info" id="editButton" data-toggle="modal"
                  data-target="#siswaModal" onclick="editData(<?= $data['id_siswa'] ?>)"><i
                    class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-icon btn-sm btn-danger"
                  onclick="deleteData('<?= $data['id_siswa'] ?>')">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <?php $i++;
          endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="formData" action="./control/aksi_insert.php" method="post" data-type="add"
        enctype="multipart/form-data">
        <input type="hidden" name="id_siswa" id="id_siswa">
        <input type="hidden" name="old_photo" id="old_photo">
        <div class="modal-header">
          <h5 class="modal-title" id="siswaModalLabel">Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nisn" id="nisnLabel" class="col-sm-3 col-form-label">NISN</label>
            <div class="col-sm-9">
              <input type="text" name="nisn" class="form-control" id="nisn" placeholder="NISN">
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" id="genderLabel" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <select name="gender" id="gender" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="tempat_lahir" id="tempat_lahirLabel" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir"
                required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal_lahir" id="tanggal_lahirLabel" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" value="<?= date('Y-m-d') ?>" name="tanggal_lahir" class="form-control"
                id="tanggal_lahir" placeholder="Tanggal Lahir" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="agama" id="agamaLabel" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-9">
              <select name="agama" id="agama" class="form-control">
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" id="alamatLabel" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group row">
            <label for="nohp" class="col-sm-3 col-form-label">No. HP</label>
            <div class="col-sm-9">
              <input type="text" name="nohp" class="form-control" id="nohp" placeholder="No. HP">
            </div>
          </div>
          <div class="form-group row">
            <label for="foto_siswa" class="col-sm-3 col-form-label">Foto Siswa</label>
            <div class="col-sm-9">
              <input type="file" name="foto_siswa" class="form-control-file" id="foto_siswa" placeholder="Foto Siswa">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="buttonForm" name="siswa" class="btn btn-primary">Simpan</button>
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

  fetch('./control/aksi_select.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({
        'detail': 'siswa',
        'id_siswa': id
      })
    })
    .then(response => response.json())
    .then(data => {
      document.getElementById('id_siswa').value = data.id_siswa;
      document.getElementById('old_photo').value = data.foto_siswa;
      document.getElementById('nama').value = data.nama_siswa;
      document.getElementById('nisn').value = data.nisn;
      document.getElementById('tempat_lahir').value = data.tempat_lahir_siswa;
      document.getElementById('tanggal_lahir').value = data.tanggal_lahir_siswa;
      document.getElementById('alamat').value = data.alamat_siswa;
      document.getElementById('email').value = data.email_siswa;
      document.getElementById('nohp').value = data.nohp_siswa;

      let gender = document.getElementById("gender");

      for (let i = 0; i < gender.options.length; i++) {
        if (gender.options[i].value == data.gender_siswa) {
          gender.options[i].selected = true;
          break;
        }
      }

      let agama = document.getElementById("agama");

      for (let i = 0; i < agama.options.length; i++) {
        if (agama.options[i].value == data.agama_siswa) {
          agama.options[i].selected = true;
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
    },
    function() {
      window.location = './control/aksi_delete.php?del=siswa&id=' + id;
    });
}
</script>