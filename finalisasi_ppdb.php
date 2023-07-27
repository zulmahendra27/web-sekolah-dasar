<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h1 class="mt-4">Penerimaan Peserta Didik Baru</h1>
    <h6>Daftarkan anak anda ke <?= $WEB_NAME ?> segera dengan mengisi formulir pendaftaran di bawah ini.</h6>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <?php if ($meta['status_ppdb'] == 'Buka') : ?>

    <h3 class="mt-4 text-center">Data Penerimaan Peserta Didik Baru<br><span class="fw-bold"><?= $WEB_NAME ?></span>
    </h3>

    <div class="row mt-5 justify-content-center">

      <?php
      if (isset($_GET['id'])) :
        $uid = $_GET['id'];
        $queryCheck = select($c, 'ppdb', ['where' => "uid_ppdb='$uid'"]);
        if ($queryCheck->num_rows == 0) {
          echo "<script>alert('Nomor pendaftaran tidak ditemukan!');</script>";
          echo "<script>window.location='?p=ppdb';</script>";
          return;
        }

        $data = mysqli_fetch_assoc($queryCheck);
      ?>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <div class="php-email-form">
          <div class="alert alert-secondary pointer" data-bs-toggle="collapse" data-bs-target="#dataSiswa"
            aria-expanded="false" aria-controls="collapseExample">Data Siswa
          </div>
          <div class="collapse show" id="dataSiswa">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" disabled
                    value="<?= $data['nama_lengkap'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="panggilan" class="form-label">Nama Panggilan</label>
                  <input type="text" class="form-control" name="panggilan" id="panggilan" disabled
                    value="<?= $data['panggilan'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" disabled
                    value="<?= $data['tempat_lahir'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="<?= $data['tanggal_lahir'] ?>" disabled>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <select name="gender" id="gender" class="form-select" disabled>
                    <option value="L" <?= $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="agama" class="form-label">Agama</label>
                  <select name="agama" id="agama" class="form-select" disabled>
                    <option value="islam" <?= $data['agama'] == 'islam' ? 'selected' : '' ?>>Islam</option>
                    <option value="protestan" <?= $data['agama'] == 'protestan' ? 'selected' : '' ?>>Protestan</option>
                    <option value="katolik" <?= $data['agama'] == 'katolik' ? 'selected' : '' ?>>Katolik</option>
                    <option value="hindu" <?= $data['agama'] == 'hindu' ? 'selected' : '' ?>>Hindu</option>
                    <option value="budha" <?= $data['agama'] == 'budha' ? 'selected' : '' ?>>Budha</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="anak_ke" class="form-label">Anak ke</label>
                  <input type="number" name="anak_ke" class="form-control form-control-sm" id="anak_ke" min="1" disabled
                    value="<?= $data['anak_ke'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="status_anak" class="form-label">Status Anak dalam Keluarga</label>
                  <select name="status_anak" id="status_anak" class="form-select" style="height: 2.75rem;" disabled>
                    <option value="anak_kandung" <?= $data['status_anak'] == 'anak_kandung' ? 'selected' : '' ?>>Anak
                      Kandung</option>
                    <option value="anak_angkat" <?= $data['status_anak'] == 'anak_angkat' ? 'selected' : '' ?>>Anak
                      Angkat
                    </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
                  <input type="text" name="alamat_siswa" class="form-control" id="alamat_siswa" disabled
                    value="<?= $data['alamat_siswa'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="nohp_siswa" class="form-label">No. HP Siswa</label>
                  <input type="number" class="form-control" name="nohp_siswa" id="nohp_siswa" disabled
                    value="<?= $data['nohp_siswa'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="tk_asal" class="form-label">Asal TK</label>
                  <input type="text" name="tk_asal" class="form-control" id="tk_asal" disabled
                    value="<?= $data['tk_asal'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="alamat_tk_asal" class="form-label">Alamat TK Asal</label>
                  <input type="text" class="form-control" name="alamat_tk_asal" id="alamat_tk_asal" disabled
                    value="<?= $data['alamat_tk_asal'] ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-secondary pointer mt-3" data-bs-toggle="collapse" data-bs-target="#dataParent"
            aria-expanded="false" aria-controls="collapseExample">Data Orang Tua
          </div>
          <div class="collapse show" id="dataParent">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="ayah" class="form-label">Nama Ayah</label>
                  <input type="text" name="ayah" class="form-control" id="ayah" disabled value="<?= $data['ayah'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="ibu" class="form-label">Nama Ibu</label>
                  <input type="text" class="form-control" name="ibu" id="ibu" disabled value="<?= $data['ibu'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="alamat_ortu" class="form-label">Alamat Orang Tua</label>
                  <input type="text" name="alamat_ortu" class="form-control" id="alamat_ortu" disabled
                    value="<?= $data['alamat_ortu'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="nohp_ortu" class="form-label">No. HP Orang Tua</label>
                  <input type="text" class="form-control" name="nohp_ortu" id="nohp_ortu" disabled
                    value="<?= $data['nohp_ortu'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                  <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" disabled
                    value="<?= $data['pekerjaan_ayah'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                  <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" disabled
                    value="<?= $data['pekerjaan_ibu'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="sekolah_ayah" class="form-label">Pendidikan Terakhir Ayah</label>
                  <select name="sekolah_ayah" id="sekolah_ayah" class="form-select" disabled>
                    <option value="S3" <?= $data['sekolah_ayah'] == 'S3' ? 'selected' : '' ?>>S3</option>
                    <option value="S2" <?= $data['sekolah_ayah'] == 'S2' ? 'selected' : '' ?>>S2</option>
                    <option value="S1" <?= $data['sekolah_ayah'] == 'S1' ? 'selected' : '' ?>>S1</option>
                    <option value="SMA" <?= $data['sekolah_ayah'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
                    <option value="SMP" <?= $data['sekolah_ayah'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                    <option value="SD" <?= $data['sekolah_ayah'] == 'SD' ? 'selected' : '' ?>>SD</option>
                    <option value="TS" <?= $data['sekolah_ayah'] == 'TS' ? 'selected' : '' ?>>Tidak Sekolah</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="sekolah_ibu" class="form-label">Pendidikan Terakhir Ibu</label>
                  <select name="sekolah_ibu" id="sekolah_ibu" class="form-select" disabled>
                    <option value="S3" <?= $data['sekolah_ibu'] == 'S3' ? 'selected' : '' ?>>S3</option>
                    <option value="S2" <?= $data['sekolah_ibu'] == 'S2' ? 'selected' : '' ?>>S2</option>
                    <option value="S1" <?= $data['sekolah_ibu'] == 'S1' ? 'selected' : '' ?>>S1</option>
                    <option value="SMA" <?= $data['sekolah_ibu'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
                    <option value="SMP" <?= $data['sekolah_ibu'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                    <option value="SD" <?= $data['sekolah_ibu'] == 'SD' ? 'selected' : '' ?>>SD</option>
                    <option value="TS" <?= $data['sekolah_ibu'] == 'TS' ? 'selected' : '' ?>>Tidak Sekolah</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="penghasilan_ayah" class="form-label">Penghasilan Perbulan Ayah</label>
                  <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="penghasilan_ayah" class="form-control form-control-sm"
                      id="penghasilan_ayah" min="0" disabled value="<?= $data['penghasilan_ayah'] ?>">
                  </div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="penghasilan_ibu" class="form-label">Penghasilan Perbulan Ibu</label>
                  <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="penghasilan_ibu" class="form-control form-control-sm"
                      id="penghasilan_ibu" min="0" disabled value="<?= $data['penghasilan_ibu'] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-secondary pointer mt-3" data-bs-toggle="collapse" data-bs-target="#dataWali"
            aria-expanded="false" aria-controls="collapseExample">Data Wali
          </div>
          <div class="collapse show" id="dataWali">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="wali" class="form-label">Nama Wali</label>
                  <input type="text" name="wali" class="form-control" id="wali" disabled value="<?= $data['wali'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="alamat_wali" class="form-label">Alamat Wali</label>
                  <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" disabled
                    value="<?= $data['alamat_wali'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="nohp_wali" class="form-label">No. HP Wali</label>
                  <input type="number" min="1" name="nohp_wali" class="form-control" id="nohp_wali" disabled
                    value="<?= $data['nohp_wali'] ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                  <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" disabled
                    value="<?= $data['pekerjaan_wali'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="sekolah_wali" class="form-label">Pendidikan Terakhir Wali</label>
                  <select name="sekolah_wali" id="sekolah_wali" class="form-select" style="height: 2.75rem;" disabled>
                    <option value="" <?= $data['sekolah_wali'] == '' ? 'selected' : '' ?>>-- Tidak ada data --</option>
                    <option value="S3" <?= $data['sekolah_wali'] == 'S3' ? 'selected' : '' ?>>S3</option>
                    <option value="S2" <?= $data['sekolah_wali'] == 'S2' ? 'selected' : '' ?>>S2</option>
                    <option value="S1" <?= $data['sekolah_wali'] == 'S1' ? 'selected' : '' ?>>S1</option>
                    <option value="SMA" <?= $data['sekolah_wali'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
                    <option value="SMP" <?= $data['sekolah_wali'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                    <option value="SD" <?= $data['sekolah_wali'] == 'SD' ? 'selected' : '' ?>>SD</option>
                    <option value="TS" <?= $data['sekolah_wali'] == 'TS' ? 'selected' : '' ?>>Tidak Sekolah</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="penghasilan_wali" class="form-label">Penghasilan Perbulan Wali</label>
                  <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="penghasilan_wali" class="form-control form-control-sm"
                      id="penghasilan_wali" min="0" disabled value="<?= $data['penghasilan_wali'] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-secondary pointer mt-3" data-bs-toggle="collapse" data-bs-target="#dataFoto"
            aria-expanded="false" aria-controls="collapseExample">Foto
          </div>
          <div class="collapse show" id="dataFoto">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="foto_siswa_ppdb">Foto 3x4</label>
                  <img src="images/ppdb/siswa/<?= $data['foto_siswa_ppdb'] ?>" alt="Foto KK" class="mw-100 rounded">
                  <!-- <input type="file" name="foto_siswa_ppdb" id="foto_siswa_ppdb" class="form-control" disabled> -->
                </div>
                <div class="col-md-6 form-group">
                  <label for="foto_kk">KK</label>
                  <!-- <input type="file" name="foto_kk" id="foto_kk" class="form-control" disabled> -->
                  <img src="images/ppdb/kk/<?= $data['foto_kk'] ?>" alt="Foto KK" class="mw-100 rounded">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 form-group">
                  <label for="ktp_ayah" class="form-label">KTP Ayah</label>
                  <img src="images/ppdb/ktp_ayah/<?= $data['ktp_ayah'] ?>" alt="Foto KK" class="mw-100 rounded">
                  <!-- <input type="file" name="ktp_ayah" class="form-control" id="ktp_ayah" disabled> -->
                </div>
                <div class="col-lg-4 form-group mt-3 mt-md-0">
                  <label for="ktp_ibu" class="form-label">KTP Ibu</label>
                  <img src="images/ppdb/ktp_ibu/<?= $data['ktp_ibu'] ?>" alt="Foto KK" class="mw-100 rounded">
                  <!-- <input type="file" class="form-control" name="ktp_ibu" id="ktp_ibu" disabled> -->
                </div>
                <div class="col-lg-4 form-group mt-3 mt-md-0">
                  <label for="ktp_wali" class="form-label">KTP Wali</label>
                  <img src="images/ppdb/ktp_ibu/<?= $data['ktp_ibu'] ?>" alt="Foto KK" class="mw-100 rounded">
                  <!-- <input type="file" class="form-control" name="ktp_wali" id="ktp_wali"> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center">
          <a href="cetak_ppdb.php?id=<?= $_GET['id'] ?>" target="_blank" class="btn btn-info text-white mt-3">
            <i class="ri ri-printer-fill" style="margin-right: .5rem;"></i>Cetak Data
          </a>
        </div>

      </div>

      <?php else : ?>

      <div class="col-lg-6 mt-5 mt-lg-0 text-center">
        <h5>Masukkan Data Pencarian</h5>
        <form class="php-email-form mt-3" action="./control/aksi_select.php" method="post">
          <div class="form-group">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control border-warning" id="nama_lengkap"
              placeholder="Nama Siswa" required>
          </div>
          <div class="form-group">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control border-warning" id="tanggal_lahir"
              placeholder="Tanggal Lahir" required>
          </div>
          <div class="form-group mt-3">
            <button type="submit" class="btn btn-success" name="search_ppdb">
              <i class="ri ri-search-2-line" style="margin-right: .5rem;"></i>Cari Data
            </button>
          </div>
        </form>
      </div>

      <?php endif; ?>

    </div>

    <?php else : ?>
    <div class="text-center">
      <i class="ri ri-error-warning-line text-warning" style="font-size: 200px; margin: 0; padding: 0;"></i>
      <h2 class="mt-4 text-center">Pendaftaran Peserta Didik Baru Belum Dibuka</h2>
    </div>
    <?php endif; ?>



  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->