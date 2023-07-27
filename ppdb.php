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
    <h3 class="mt-4 text-center">Formulir Pendaftaran Peserta Didik Baru<br><span
        class="fw-bold"><?= $WEB_NAME ?></span></h3>

    <div class="row mt-5 justify-content-center">

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="./control/aksi_insert.php" method="post" class="php-email-form" role="form"
          enctype="multipart/form-data">
          <div class="alert alert-secondary pointer" data-bs-toggle="collapse" data-bs-target="#dataSiswa"
            aria-expanded="false" aria-controls="collapseExample">Data Siswa
          </div>
          <div class="collapse show" id="dataSiswa">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                    placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="panggilan" class="form-label">Nama Panggilan</label>
                  <input type="text" class="form-control" name="panggilan" id="panggilan" placeholder="Nama Panggilan"
                    required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                    placeholder="Tempat Lahir" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="<?= date('Y-m-d') ?>" placeholder="Tanggal Lahir" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <select name="gender" id="gender" class="form-select">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="agama" class="form-label">Agama</label>
                  <select name="agama" id="agama" class="form-select">
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
                  <input type="number" name="anak_ke" class="form-control form-control-sm" id="anak_ke" min="1"
                    value="1" placeholder="Anak ke" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="status_anak" class="form-label">Status Anak dalam Keluarga</label>
                  <select name="status_anak" id="status_anak" class="form-select" style="height: 2.75rem;">
                    <option value="anak_kandung">Anak Kandung</option>
                    <option value="anak_angkat">Anak Angkat</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
                  <input type="text" name="alamat_siswa" class="form-control" id="alamat_siswa"
                    placeholder="Alamat Siswa" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="nohp_siswa" class="form-label">No. HP Siswa</label>
                  <input type="number" class="form-control" name="nohp_siswa" id="nohp_siswa"
                    placeholder="No. HP Siswa">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="tk_asal" class="form-label">Asal TK</label>
                  <input type="text" name="tk_asal" class="form-control" id="tk_asal" placeholder="Asal TK">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="alamat_tk_asal" class="form-label">Alamat TK Asal</label>
                  <input type="text" class="form-control" name="alamat_tk_asal" id="alamat_tk_asal"
                    placeholder="Alamat TK Asal">
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-secondary pointer mt-3" data-bs-toggle="collapse" data-bs-target="#dataParent"
            aria-expanded="false" aria-controls="collapseExample">Data Orang Tua
          </div>
          <div class="collapse" id="dataParent">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="ayah" class="form-label">Nama Ayah</label>
                  <input type="text" name="ayah" class="form-control" id="ayah" placeholder="Nama Ayah" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="ibu" class="form-label">Nama Ibu</label>
                  <input type="text" class="form-control" name="ibu" id="ibu" placeholder="Nama Ibu" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="alamat_ortu" class="form-label">Alamat Orang Tua</label>
                  <input type="text" name="alamat_ortu" class="form-control" id="alamat_ortu"
                    placeholder="Alamat Orang Tua" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="nohp_ortu" class="form-label">No. HP Orang Tua</label>
                  <input type="text" class="form-control" name="nohp_ortu" id="nohp_ortu" placeholder="No. HP Orang Tua"
                    required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                  <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah"
                    placeholder="Pekerjaan Ayah" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                  <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu"
                    placeholder="Pekerjaan Ibu" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="sekolah_ayah" class="form-label">Pendidikan Terakhir Ayah</label>
                  <select name="sekolah_ayah" id="sekolah_ayah" class="form-select" required>
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
                  <select name="sekolah_ibu" id="sekolah_ibu" class="form-select" required>
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
                  <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="penghasilan_ayah" class="form-control form-control-sm"
                      id="penghasilan_ayah" min="0" value="0" placeholder="Penghasilan Perbulan Ayah" required>
                  </div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="penghasilan_ibu" class="form-label">Penghasilan Perbulan Ibu</label>
                  <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="penghasilan_ibu" class="form-control form-control-sm"
                      id="penghasilan_ibu" min="0" value="0" placeholder="Penghasilan Perbulan Ibu" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-secondary pointer mt-3" data-bs-toggle="collapse" data-bs-target="#dataWali"
            aria-expanded="false" aria-controls="collapseExample">Data Wali
          </div>
          <div class="collapse" id="dataWali">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="wali" class="form-label">Nama Wali</label>
                  <input type="text" name="wali" class="form-control" id="wali" placeholder="Nama Wali">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="alamat_wali" class="form-label">Alamat Wali</label>
                  <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" placeholder="Alamat Wali">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="nohp_wali" class="form-label">No. HP Wali</label>
                  <input type="number" min="1" name="nohp_wali" class="form-control" id="nohp_wali"
                    placeholder="No. HP Wali">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                  <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali"
                    placeholder="Pekerjaan Wali">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="sekolah_wali" class="form-label">Pendidikan Terakhir Wali</label>
                  <select name="sekolah_wali" id="sekolah_wali" class="form-select" style="height: 2.75rem;">
                    <option value="">-- Pilih data --</option>
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
                  <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="penghasilan_wali" class="form-control form-control-sm"
                      id="penghasilan_wali" min="0" value="0" placeholder="Penghasilan Perbulan Wali">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-secondary pointer mt-3" data-bs-toggle="collapse" data-bs-target="#dataFoto"
            aria-expanded="false" aria-controls="collapseExample">Upload Foto
          </div>
          <div class="collapse" id="dataFoto">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="foto_siswa_ppdb">Upload Foto 3x4</label>
                  <input type="file" name="foto_siswa_ppdb" id="foto_siswa_ppdb" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                  <label for="foto_kk">Upload KK</label>
                  <input type="file" name="foto_kk" id="foto_kk" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 form-group">
                  <label for="ktp_ayah" class="form-label">KTP Ayah</label>
                  <input type="file" name="ktp_ayah" class="form-control" id="ktp_ayah" required>
                </div>
                <div class="col-lg-4 form-group mt-3 mt-md-0">
                  <label for="ktp_ibu" class="form-label">KTP Ibu</label>
                  <input type="file" class="form-control" name="ktp_ibu" id="ktp_ibu" required>
                </div>
                <div class="col-lg-4 form-group mt-3 mt-md-0">
                  <label for="ktp_wali" class="form-label">KTP Wali</label>
                  <input type="file" class="form-control" name="ktp_wali" id="ktp_wali">
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-success" name="ppdb">Daftar</button>
          </div>
        </form>

      </div>

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