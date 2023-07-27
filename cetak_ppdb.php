<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Data PPDB</title>
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
  <style>
    body {
      font-size: larger;
    }

    img.siswa {
      width: 200px;
    }
  </style>
</head>

<body>
  <?php
  include_once "./admin/control/connection.php";
  include_once "./admin/control/helper.php";

  $WEB_NAME = "SDN 03 ALAI TIMUR";
  if (!isset($_GET['id'])) :
    echo "<script>alert('Data tidak ditemukan')</script>";
    echo "<script>window.location='./main.php'</script>";
    return;
  else :
    $id = mysqli_escape_string($c, htmlspecialchars($_GET['id']));
    $queryPPDB = select($c, 'ppdb', ['where' => "uid_ppdb='$id'"]);

    if ($queryPPDB->num_rows == 0) :
      echo "<script>alert('Data tidak ditemukan')</script>";
      echo "<script>window.location='./main.php'</script>";
      return;

    else :
      $data = mysqli_fetch_assoc($queryPPDB);
  ?>
      <div class="container my-3">
        <div class="text-center">
          <h3>Data Penerimaan Peserta Didik Baru</h3>
          <h4><?= $WEB_NAME ?></h4>
        </div>
        <div class="mt-4">
          <table style="margin: 0 2rem; width: 100%;">
            <tr>
              <th colspan="3">Siswa</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>Nama Lengkap</td>
              <td>: <?= $data['nama_lengkap'] ?></td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Panggilan</td>
              <td>: <?= $data['panggilan'] ?></td>
            </tr>
            <tr>
              <td>3.</td>
              <td>Tempat/Tanggal Lahir</td>
              <td>: <?= $data['tempat_lahir'] . '/' . date('d-m-Y', strtotime($data['tanggal_lahir'])); ?></td>
            </tr>
            <tr>
              <td>4.</td>
              <td>Jenis Kelamin</td>
              <td>: <?= $data['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
            </tr>
            <tr>
              <td>5.</td>
              <td>Agama</td>
              <td>: <?= ucwords($data['agama']) ?></td>
            </tr>
            <tr>
              <td>6.</td>
              <td>Anak ke</td>
              <td>: <?= $data['anak_ke'] ?></td>
            </tr>
            <tr>
              <td>7.</td>
              <td>Status Anak</td>
              <td>: <?= ucwords(str_replace('_', ' ', $data['nama_lengkap'])) ?></td>
            </tr>
            <tr>
              <td>8.</td>
              <td>Alamat</td>
              <td>: <?= $data['alamat_siswa'] ?></td>
            </tr>
            <tr>
              <td>9.</td>
              <td>No. HP Anak</td>
              <td>: <?= $data['nohp_siswa'] ?></td>
            </tr>
            <tr>
              <td>10.</td>
              <td>TK Asal</td>
              <td>: <?= $data['tk_asal'] ?></td>
            </tr>
            <tr>
              <td>11.</td>
              <td>Alamat TK Asal</td>
              <td>: <?= $data['alamat_tk_asal'] ?></td>
            </tr>
            <tr>
              <th colspan="3" style="padding-top: 1rem;">Orang Tua</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>Nama Ayah</td>
              <td>: <?= $data['ayah'] ?></td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Nama Ibu</td>
              <td>: <?= $data['ibu'] ?></td>
            </tr>
            <tr>
              <td>3.</td>
              <td>Alamat Orang Tua</td>
              <td>: <?= $data['alamat_ortu'] ?></td>
            </tr>
            <tr>
              <td>4.</td>
              <td>No. HP Orang Tua</td>
              <td>: <?= $data['nohp_ortu'] ?></td>
            </tr>
            <tr>
              <td>5.</td>
              <td>Pekerjaan Ayah</td>
              <td>: <?= $data['pekerjaan_ayah'] ?></td>
            </tr>
            <tr>
              <td>6.</td>
              <td>Pekerjaan Ibu</td>
              <td>: <?= $data['pekerjaan_ibu'] ?></td>
            </tr>
            <tr>
              <td>7.</td>
              <td>Pendidikan Ayah</td>
              <td>: <?= $data['sekolah_ayah'] == 'TS' ? 'Tidak Sekolah' : $data['sekolah_ayah'] ?></td>
            </tr>
            <tr>
              <td>8.</td>
              <td>Pendidikan Ibu</td>
              <td>: <?= $data['sekolah_ibu'] == 'TS' ? 'Tidak Sekolah' : $data['sekolah_ibu'] ?></td>
            </tr>
            <tr>
              <td>9.</td>
              <td>Penghasilan Ayah</td>
              <td>: <?= number_format($data['penghasilan_ayah'], 0, ',', '.') ?></td>
            </tr>
            <tr>
              <td>10.</td>
              <td>Penghasilan Ibu</td>
              <td>: <?= number_format($data['penghasilan_ibu'], 0, ',', '.') ?></td>
            </tr>
            <tr>
              <th colspan="3" style="padding-top: 1rem;">Wali</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>Nama Wali</td>
              <td>: <?= $data['wali'] ?></td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Alamat Wali</td>
              <td>: <?= $data['alamat_wali'] ?></td>
            </tr>
            <tr>
              <td>3.</td>
              <td>No. HP Wali</td>
              <td>: <?= $data['nohp_wali'] ?></td>
            </tr>
            <tr>
              <td>4.</td>
              <td>Pekerjaan Wali</td>
              <td><?= $data['pekerjaan_wali'] ?></td>
            </tr>
            <tr>
              <td>5.</td>
              <td>Pendidikan Wali</td>
              <td>: <?= $data['sekolah_wali'] == 'TS' ? 'Tidak Sekolah' : $data['sekolah_wali'] ?></td>
            </tr>
            <tr>
              <td>6.</td>
              <td>Penghasilan Wali</td>
              <td>: <?= number_format($data['penghasilan_wali'], 0, ',', '.') ?></td>
            </tr>
          </table>
        </div>

        <table style="width: 100%; margin-top: 3rem;">
          <tr>
            <th style="padding-left: 2rem;">
              <img class="siswa" src="./images/ppdb/siswa/<?= $data['foto_siswa_ppdb'] ?>" alt="<?= $data['nama_lengkap'] ?>">
            </th>
            <th style="width: 50px;"></th>
            <td>
              <div style="max-width: 300px;" class="text-center">
                Padang, <?= date('d-m-Y') ?><br>Calon Siswa
                <div style="margin-top: 5rem;" class="text-center">
                  <?= $data['nama_lengkap'] ?>
                </div>
              </div>
            </td>
          </tr>
        </table>
        <div style="width: 100%; margin-top: 3rem;" class="d-flex justify-content-between">
        </div>
      </div>
  <?php
    endif;
  endif;
  ?>

  <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script>
    window.print();
  </script>
</body>

</html>