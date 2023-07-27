<style>
td img,
#foto_siswa_ppdb {
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
    <button class="btn btn-sm btn-success" id="addButton" data-toggle="modal" data-target="#ppdbModal">
      <i class="fas fa-plus mr-2"></i>Tambah Data
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>No Pendaftaran</th>
            <th>Nama Siswa</th>
            <th>Tempat<br>Tanggal Lahir</th>
            <th>Gender</th>
            <th>Agama</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $queryPPDB = select($c, 'ppdb');
          if ($queryPPDB->num_rows > 0) :
            foreach ($queryPPDB as $dataPPDB) :
          ?>
          <tr>
            <td><?= $i ?></td>
            <td>
              <img src="../images/ppdb/siswa/<?= $dataPPDB['foto_siswa_ppdb'] ?>"
                alt="<?= $dataPPDB['nama_lengkap'] ?>">
            </td>
            <td><?= $dataPPDB['uid_ppdb'] ?></td>
            <td><?= $dataPPDB['nama_lengkap'] ?></td>
            <td><?= $dataPPDB['tempat_lahir'] . '<br>' . date('d-m-Y', strtotime($dataPPDB['tanggal_lahir'])) ?></td>
            <td><?= $dataPPDB['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
            <td><?= ucwords($dataPPDB['agama']) ?></td>
            <td>
              <div class="badge badge-<?= $dataPPDB['status'] == 'approved' ? 'success' : 'warning' ?>">
                <?= $dataPPDB['status'] ?></div>
            </td>
            <td style="white-space: nowrap;">
              <div class="table-actions text-center">
                <button type="button" class="btn btn-icon btn-sm btn-info" id="editButton" data-toggle="modal"
                  data-target="#ppdbModal" onclick="editData('<?= $dataPPDB['uid_ppdb'] ?>')" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button"
                  class="btn btn-icon btn-sm btn-<?= $dataPPDB['status'] == 'waiting' ? 'success' : 'warning' ?>"
                  onclick="approvePPDB('<?= $dataPPDB['uid_ppdb'] ?>')">
                  <i class="fas fa-<?= $dataPPDB['status'] == 'waiting' ? 'check' : 'times' ?>"></i>
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

<div class="modal fade" id="ppdbModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
  aria-labelledby="ppdbModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content p-2">
      <!-- <form id="formData" action="./control/aksi_insert.php" method="post" data-type="add"> -->
      <input type="hidden" name="id_ppdb" id="id_ppdb">
      <div class="modal-header">
        <h5 class="modal-title" id="ppdbModalLabel">Data <?= $title ?? '' ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <div class="card card-body">
          <div class="row">
            <div class="col-lg-12 text-center">
              <img id="foto_siswa_ppdb" class="rounded">
            </div>
          </div>
        </div>

        <div class="card card-body">
          <h4>Data Siswa</h4>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="panggilan" class="form-label">Nama Panggilan</label>
              <input type="text" class="form-control" name="panggilan" id="panggilan" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="gender" class="form-label">Jenis Kelamin</label>
              <select name="gender" id="gender" class="form-control" disabled>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="agama" class="form-label">Agama</label>
              <select name="agama" id="agama" class="form-control" disabled>
                <option value="islam">Islam</option>
                <option value="protestan">Protestan</option>
                <option value="katolik">Katolik</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="anak_ke" class="form-label">Anak ke</label>
              <input type="number" name="anak_ke" class="form-control form-control-sm" id="anak_ke" min="1" disabled
                style="height: 2.75rem;">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="status_anak" class="form-label">Status Anak dalam Keluarga</label>
              <select name="status_anak" id="status_anak" class="form-control" style="height: 2.75rem;" disabled>
                <option value="anak_kandung">Anak Kandung</option>
                <option value="anak_angkat">Anak Angkat</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
              <input type="text" name="alamat_siswa" class="form-control" id="alamat_siswa" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="nohp_siswa" class="form-label">No. HP Siswa</label>
              <input type="number" class="form-control" name="nohp_siswa" id="nohp_siswa" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="tk_asal" class="form-label">Asal TK</label>
              <input type="text" name="tk_asal" class="form-control" id="tk_asal" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="alamat_tk_asal" class="form-label">Alamat TK Asal</label>
              <input type="text" class="form-control" name="alamat_tk_asal" id="alamat_tk_asal" disabled>
            </div>
          </div>
        </div>

        <div class="card card-body">
          <h4>Data Orang Tua</h4>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="ayah" class="form-label">Nama Ayah</label>
              <input type="text" name="ayah" class="form-control" id="ayah" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="ibu" class="form-label">Nama Ibu</label>
              <input type="text" class="form-control" name="ibu" id="ibu" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="alamat_ortu" class="form-label">Alamat Orang Tua</label>
              <input type="text" name="alamat_ortu" class="form-control" id="alamat_ortu" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="nohp_ortu" class="form-label">No. HP Orang Tua</label>
              <input type="text" class="form-control" name="nohp_ortu" id="nohp_ortu" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
              <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
              <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="sekolah_ayah" class="form-label">Pendidikan Terakhir Ayah</label>
              <select name="sekolah_ayah" id="sekolah_ayah" class="form-control" disabled>
                <option value="S3">S3</option>
                <option value="S2">S2</option>
                <option value="S1">S1</option>
                <option value="SMA">SMA</option>
                <option value="SMP">SMP</option>
                <option value="SD">SD</option>
                <option value="TS">Tidak Sekolah</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="sekolah_ibu" class="form-label">Pendidikan Terakhir Ibu</label>
              <select name="sekolah_ibu" id="sekolah_ibu" class="form-control" disabled>
                <option value="S3">S3</option>
                <option value="S2">S2</option>
                <option value="S1">S1</option>
                <option value="SMA">SMA</option>
                <option value="SMP">SMP</option>
                <option value="SD">SD</option>
                <option value="TS">Tidak Sekolah</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="penghasilan_ayah" class="form-label">Penghasilan Perbulan Ayah</label>
              <input type="number" name="penghasilan_ayah" class="form-control form-control-sm" id="penghasilan_ayah"
                min="0" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="penghasilan_ibu" class="form-label">Penghasilan Perbulan Ibu</label>
              <input type="number" name="penghasilan_ibu" class="form-control form-control-sm" id="penghasilan_ibu"
                min="0" disabled>
            </div>
          </div>
        </div>

        <div class="card card-body">
          <h4>Data Wali</h4>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="wali" class="form-label">Nama Wali</label>
              <input type="text" name="wali" class="form-control" id="wali" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="alamat_wali" class="form-label">Alamat Wali</label>
              <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="nohp_wali" class="form-label">No. HP Wali</label>
              <input type="number" min="1" name="nohp_wali" class="form-control" id="nohp_wali" disabled>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
              <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="sekolah_wali" class="form-label">Pendidikan Terakhir Wali</label>
              <select name="sekolah_wali" id="sekolah_wali" class="form-control" style="height: 2.75rem;" disabled>
                <option value="">-- Tidak ada data --</option>
                <option value="S3">S3</option>
                <option value="S2">S2</option>
                <option value="S1">S1</option>
                <option value="SMA">SMA</option>
                <option value="SMP">SMP</option>
                <option value="SD">SD</option>
                <option value="TS">Tidak Sekolah</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="penghasilan_wali" class="form-label">Penghasilan Perbulan Wali</label>
              <input type="number" name="penghasilan_wali" class="form-control form-control-sm" id="penghasilan_wali"
                min="0" disabled style="height: 2.75rem;">
            </div>
          </div>
        </div>

        <div class="card card-body">
          <h4>Foto</h4>
          <div class="row" id="dataFoto">
            <div class="col-lg-12 form-group">
              <label for="foto_kk" class="form-label">Foto KK</label>
              <img alt="Foto KK" id="foto_kk" class="mw-100 rounded">
              <!-- <input type="file" name="foto_kk" class="form-control" id="foto_kk" disabled> -->
            </div>
            <div class="col-lg-12 form-group">
              <label for="ktp_ayah" class="form-label">KTP Ayah</label>
              <img alt="KTP Ayah" id="ktp_ayah" class="mw-100 rounded">
              <!-- <input type="file" name="ktp_ayah" class="form-control" id="ktp_ayah" disabled> -->
            </div>
            <div class="col-lg-12 form-group mt-3 mt-md-0">
              <label for="ktp_ibu" class="form-label">KTP Ibu</label>
              <img alt="KTP Ibu" id="ktp_ibu" class="mw-100 rounded">
              <!-- <input type="file" class="form-control" name="ktp_ibu" id="ktp_ibu" disabled> -->
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" id="buttonForm" name="ppdb" class="btn btn-primary">Simpan</button> -->
      </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<script>
function editData(id) {
  fetch('./control/aksi_select.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({
        'detail': 'ppdb',
        'uid_ppdb': id
      })
    })
    .then(response => response.json())
    .then(data => {
      document.getElementById('foto_siswa_ppdb').src = '../images/ppdb/siswa/' + data.foto_siswa_ppdb;
      document.getElementById('nama_lengkap').value = data.nama_lengkap;
      document.getElementById('panggilan').value = data.panggilan;
      document.getElementById('tempat_lahir').value = data.tempat_lahir;
      document.getElementById('tanggal_lahir').value = data.tanggal_lahir;
      document.getElementById('anak_ke').value = data.anak_ke;
      document.getElementById('alamat_siswa').value = data.alamat_siswa;
      document.getElementById('nohp_siswa').value = data.nohp_siswa;
      document.getElementById('tk_asal').value = data.tk_asal;
      document.getElementById('alamat_tk_asal').value = data.alamat_tk_asal;

      let gender = document.getElementById("gender");

      for (let i = 0; i < gender.options.length; i++) {
        if (gender.options[i].value == data.gender) {
          gender.options[i].selected = true;
          break;
        }
      }

      let agama = document.getElementById("agama");

      for (let i = 0; i < agama.options.length; i++) {
        if (agama.options[i].value == data.agama) {
          agama.options[i].selected = true;
          break;
        }
      }

      let status_anak = document.getElementById("status_anak");

      for (let i = 0; i < status_anak.options.length; i++) {
        if (status_anak.options[i].value == data.status_anak) {
          status_anak.options[i].selected = true;
          break;
        }
      }

      // Data Orang Tua
      document.getElementById('ayah').value = data.ayah;
      document.getElementById('ibu').value = data.ibu;
      document.getElementById('alamat_ortu').value = data.alamat_ortu;
      document.getElementById('nohp_ortu').value = data.nohp_ortu;
      document.getElementById('pekerjaan_ayah').value = data.pekerjaan_ayah;
      document.getElementById('pekerjaan_ibu').value = data.pekerjaan_ibu;
      document.getElementById('penghasilan_ayah').value = data.penghasilan_ayah;
      document.getElementById('penghasilan_ibu').value = data.penghasilan_ibu;

      let sekolah_ayah = document.getElementById("sekolah_ayah");

      for (let i = 0; i < sekolah_ayah.options.length; i++) {
        if (sekolah_ayah.options[i].value == data.sekolah_ayah) {
          sekolah_ayah.options[i].selected = true;
          break;
        }
      }

      let sekolah_ibu = document.getElementById("sekolah_ibu");

      for (let i = 0; i < sekolah_ibu.options.length; i++) {
        if (sekolah_ibu.options[i].value == data.sekolah_ibu) {
          sekolah_ibu.options[i].selected = true;
          break;
        }
      }

      // Data Wali
      document.getElementById('wali').value = data.wali;
      document.getElementById('alamat_wali').value = data.alamat_wali;
      document.getElementById('nohp_wali').value = data.nohp_wali;
      document.getElementById('pekerjaan_wali').value = data.pekerjaan_wali;
      document.getElementById('penghasilan_wali').value = data.penghasilan_wali;

      let sekolah_wali = document.getElementById("sekolah_wali");

      for (let i = 0; i < sekolah_wali.options.length; i++) {
        if (sekolah_wali.options[i].value == data.sekolah_wali) {
          sekolah_wali.options[i].selected = true;
          break;
        }
      }

      document.getElementById('foto_kk').src = '../images/ppdb/kk/' + data.foto_kk;
      document.getElementById('ktp_ayah').src = '../images/ppdb/ktp_ayah/' + data.ktp_ayah;
      document.getElementById('ktp_ibu').src = '../images/ppdb/ktp_ibu/' + data.ktp_ibu;

      if (data.ktp_wali != '') {
        let div = document.createElement('div');
        div.setAttribute('class', 'col-lg-12 form-group mt-3 mt-md-0');

        let label = document.createElement('label');
        label.setAttribute('for', 'ktp_wali');
        label.setAttribute('class', 'form-label');
        label.innerText = 'KTP Wali'

        let img = document.createElement('img');
        img.setAttribute('alt', 'KTP Wali');
        img.setAttribute('class', 'mw-100 rounded');
        img.setAttribute('src', '../images/ppdb/ktp_wali/' + data.ktp_wali);

        div.append(label, img);

        let dataFoto = document.getElementById('dataFoto');
        dataFoto.append(div);
      }
    })
    .catch(err => console.log(err));
}

function approvePPDB(id) {
  swal({
    title: "Apakah anda ingin menyetujui pendaftaran siswa?",
    text: "Data yang telah diapprove tidak bisa dibatalkan.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Approve",
    closeOnConfirm: false,
  }, function() {
    window.location = './control/aksi_update.php?update=ppdb&id=' + id;
  });
}
</script>