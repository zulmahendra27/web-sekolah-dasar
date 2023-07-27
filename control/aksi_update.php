<?php
include_once '../admin/control/connection.php';
include_once '../admin/control/helper.php';
session_start();

if (isset($_POST['berita'])) {
  $old_photo = mysqli_escape_string($c, htmlspecialchars($_POST['old_photo']));

  $judul_berita = mysqli_escape_string($c, htmlspecialchars($_POST['judul_berita']));
  $slug_berita = str_replace(' ', '-', $judul_berita);
  $slug_berita = strtolower($slug_berita);
  $slug_berita = substr($slug_berita, 0, 100) . '-' . strtotime(date('Y-m-d H:i:s'));
  $isi_berita = $_POST['isi_berita'];

  $id_berita = mysqli_escape_string($c, htmlspecialchars($_POST['id_berita']));

  $dataBerita = array(
    'judul_berita' => $judul_berita,
    'slug_berita' => $slug_berita,
    'isi_berita' => $isi_berita
  );

  if (!empty($_FILES['foto_berita']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_berita']['name'];
    $ukuran = $_FILES['foto_berita']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=berita");
      return;
    } else {
      if ($ukuran < 1044070) {
        $new_name = $rand . '_' . uniqid() . '.' . $ext;
        if (move_uploaded_file($_FILES['foto_berita']['tmp_name'], '../images/berita/' . $new_name)) {
          if (file_exists('../images/berita/' . $old_photo)) {
            unlink('../images/berita/' . $old_photo);
          }

          $dataBerita += ['foto_berita' => $new_name];
        } else {
          $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
          header("Location: ../main.php?p=berita");
          return;
        }
      } else {
        $_SESSION['alert'] = alert('Foto tidak boleh melebihi 1Mb', '', 'error');
        header("Location: ../main.php?p=berita");
        return;
      }
    }
  }

  $queryBerita = update($c, $dataBerita, 'berita', "id_berita=$id_berita");

  if ($queryBerita) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'Sukses');
    header("Location: ../main.php?p=berita");
  }
} elseif (isset($_POST['guru'])) {
  $id_guru = mysqli_escape_string($c, htmlspecialchars($_POST['id_guru']));
  $data_guru = array(
    'nip' => mysqli_escape_string($c, htmlspecialchars($_POST['nip'])),
    'nama_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['nama'])),
    'gender_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['gender'])),
    'tanggal_lahir_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['tanggal_lahir'])),
    'tempat_lahir_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['tempat_lahir'])),
    'agama_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['agama'])),
    'alamat_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['alamat'])),
    'email' => mysqli_escape_string($c, htmlspecialchars($_POST['email'])),
    'nohp' => mysqli_escape_string($c, htmlspecialchars($_POST['nohp']))
  );

  if (!empty($_FILES['foto_guru']['name'])) {
    $old_photo = mysqli_escape_string($c, htmlspecialchars($_POST['old_photo']));

    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_guru']['name'];
    $ukuran = $_FILES['foto_guru']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=guru");
      return;
    } else {
      if ($ukuran < 1044070) {
        $new_name = $rand . '_' . uniqid() . '.' . $ext;
        if (move_uploaded_file($_FILES['foto_guru']['tmp_name'], '../images/guru/' . $new_name)) {
          if (file_exists('../images/guru/' . $old_photo)) {
            unlink('../images/guru/' . $old_photo);
          }

          $data_guru += ['foto_guru' => $new_name];
        } else {
          $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
          header("Location: ../main.php?p=guru");
          return;
        }
      } else {
        $_SESSION['alert'] = alert('Foto tidak boleh melebihi 1Mb', '', 'error');
        header("Location: ../main.php?p=guru");
        return;
      }
    }
  }

  $query_guru = update($c, $data_guru, 'guru', "id_guru=$id_guru");

  if ($query_guru) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    header("Location: ../main.php?p=guru");
  }
} elseif (isset($_POST['ekstrakurikuler'])) {
  $id_ekstrakurikuler = mysqli_escape_string($c, htmlspecialchars($_POST['id_ekstrakurikuler']));

  $nama_ekstrakurikuler = mysqli_escape_string($c, htmlspecialchars($_POST['nama_ekstrakurikuler']));
  $pembina = mysqli_escape_string($c, htmlspecialchars($_POST['pembina']));
  $siswa_mengikuti = mysqli_escape_string($c, htmlspecialchars($_POST['siswa_mengikuti']));

  $dataEkstrakurikuler = [
    'nama_ekstrakurikuler' => $nama_ekstrakurikuler,
    'pembina' => $pembina,
    'siswa_mengikuti' => $siswa_mengikuti
  ];

  $updateEkstrakurikuler = update($c, $dataEkstrakurikuler, 'ekstrakurikuler', "id_ekstrakurikuler=$id_ekstrakurikuler");

  if ($updateEkstrakurikuler) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'Sukses');
    header("Location: ../main.php?p=ekstrakurikuler");
  }
}
