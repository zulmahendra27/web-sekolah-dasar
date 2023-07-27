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
    <button class="btn btn-sm btn-success" id="addButton" data-toggle="modal" data-target="#guruModal">
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
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat /<br>Tanggal Lahir</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          $query = select($c, 'guru');
          while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
              <td><?= $i ?></td>
              <td>
                <img src="<?= $data['foto_guru'] != 'user.png' ? './images/guru/' . $data['foto_guru'] : './images/user.png' ?>" alt="<?= $data['nama_guru'] ?>">
              </td>
              <td><?= $data['nip'] == '' ? '-' : $data['nip'] ?></td>
              <td><?= $data['nama_guru'] ?></td>
              <td><?= $data['tempat_lahir_guru'] . ' /<br>' . date('d-m-Y', strtotime($data['tanggal_lahir_guru'])) ?>
              </td>
              <td><?= $data['jabatan_guru'] ?></td>
              <td><?= $data['email'] != '' ? $data['email'] : '-' ?></td>
              <td><?= $data['nohp'] != '' ? $data['nohp'] : '-' ?></td>
              <td style="white-space: nowrap;">
                <div class="table-actions text-center">
                  <button type="button" class="btn btn-icon btn-sm btn-info" id="editButton" data-toggle="modal" data-target="#guruModal" onclick="editData(<?= $data['id_guru'] ?>)"><i class="fas fa-edit"></i></button>
                  <button type="button" class="btn btn-icon btn-sm btn-danger" onclick="deleteData('<?= $data['id_guru'] ?>')">
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

<div class="modal fade" id="guruModal" tabindex="-1" role="dialog" aria-labelledby="guruModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="formData" action="./control/aksi_insert.php" method="post" data-type="add" enctype="multipart/form-data">
        <input type="hidden" name="id_guru" id="id_guru">
        <input type="hidden" name="old_photo" id="old_photo">
        <div class="modal-header">
          <h5 class="modal-title" id="guruModalLabel">Data Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nip" id="nipLabel" class="col-sm-3 col-form-label">NIP</label>
            <div class="col-sm-9">
              <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP">
              <small class="text-danger">Kosongkan bila tidak ada nip</small>
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
            <label for="jabatan" id="jabatanLabel" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-9">
              <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tempat_lahir" id="tempat_lahirLabel" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal_lahir" id="tanggal_lahirLabel" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" value="<?= date('Y-m-d') ?>" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" required>
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
            <label for="foto_guru" class="col-sm-3 col-form-label">Foto Guru</label>
            <div class="col-sm-9">
              <input type="file" name="foto_guru" class="form-control-file" id="foto_guru" placeholder="Foto Guru">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="buttonForm" name="guru" class="btn btn-primary">Simpan</button>
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
          'detail': 'guru',
          'id_guru': id
        })
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById('id_guru').value = data.id_guru;
        document.getElementById('old_photo').value = data.foto_guru;
        document.getElementById('nama').value = data.nama_guru;
        document.getElementById('nip').value = data.nip;
        document.getElementById('jabatan').value = data.jabatan_guru;
        document.getElementById('tempat_lahir').value = data.tempat_lahir_guru;
        document.getElementById('tanggal_lahir').value = data.tanggal_lahir_guru;
        document.getElementById('alamat').value = data.alamat_guru;
        document.getElementById('email').value = data.email;
        document.getElementById('nohp').value = data.nohp;

        let gender = document.getElementById("gender");

        for (let i = 0; i < gender.options.length; i++) {
          if (gender.options[i].value == data.gender_guru) {
            gender.options[i].selected = true;
            break;
          }
        }

        let agama = document.getElementById("agama");

        for (let i = 0; i < agama.options.length; i++) {
          if (agama.options[i].value == data.agama_guru) {
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
        window.location = './control/aksi_delete.php?del=guru&id=' + id;
      });
  }
</script>