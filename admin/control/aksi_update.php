<?php
include_once 'connection.php';
include_once 'helper.php';
session_start();

if (isset($_POST['berita'])) {
  $old_photo = mysqli_escape_string($c, htmlspecialchars($_POST['old_photo']));

  $judul_berita = mysqli_escape_string($c, htmlspecialchars($_POST['judul_berita']));
  $slug_berita = str_replace(' ', '-', $judul_berita);
  $slug_berita = strtolower($slug_berita);
  $slug_berita = substr($slug_berita, 0, 50) . '-' . strtotime(date('Y-m-d H:i:s'));
  $isi_berita = $_POST['isi_berita'];

  $id_berita = $_POST['id_berita'];

  $dataBerita = array(
    'judul_berita' => $judul_berita,
    'slug_berita' => $slug_berita,
    'isi_berita' => $isi_berita
  );

  if (!empty($_FILES['foto_berita']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'webp');
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
    'jabatan_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['jabatan'])),
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
} elseif (isset($_POST['siswa'])) {
  $id_siswa = mysqli_escape_string($c, htmlspecialchars($_POST['id_siswa']));
  $data_siswa = array(
    'nisn' => mysqli_escape_string($c, htmlspecialchars($_POST['nisn'])),
    'nama_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['nama'])),
    'gender_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['gender'])),
    'tanggal_lahir_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['tanggal_lahir'])),
    'tempat_lahir_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['tempat_lahir'])),
    'agama_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['agama'])),
    'alamat_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['alamat'])),
    'email_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['email'])),
    'nohp_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['nohp']))
  );

  if (!empty($_FILES['foto_siswa']['name'])) {
    $old_photo = mysqli_escape_string($c, htmlspecialchars($_POST['old_photo']));

    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_siswa']['name'];
    $ukuran = $_FILES['foto_siswa']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=siswa");
      return;
    } else {
      if ($ukuran < 1044070) {
        $new_name = $rand . '_' . uniqid() . '.' . $ext;
        if (move_uploaded_file($_FILES['foto_siswa']['tmp_name'], '../images/siswa/' . $new_name)) {
          if (file_exists('../images/siswa/' . $old_photo)) {
            unlink('../images/siswa/' . $old_photo);
          }

          $data_siswa += ['foto_siswa' => $new_name];
        } else {
          $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
          header("Location: ../main.php?p=siswa");
          return;
        }
      } else {
        $_SESSION['alert'] = alert('Foto tidak boleh melebihi 1Mb', '', 'error');
        header("Location: ../main.php?p=siswa");
        return;
      }
    }
  }

  $query_siswa = update($c, $data_siswa, 'siswa', "id_siswa=$id_siswa");

  if ($query_siswa) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    header("Location: ../main.php?p=siswa");
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
} elseif (isset($_POST['update_meta'])) {
  $queryMeta = select($c, 'meta');
  if ($queryMeta->num_rows > 0) {
    foreach ($queryMeta as $meta) {
      if (in_array($meta['kunci'], ['foto_kepsek', 'banner_depan'])) {
        if (!empty($_FILES[$meta['kunci']]['name'])) {
          $old_photo = mysqli_escape_string($c, htmlspecialchars($_POST['old_' . $meta['kunci']]));

          $rand = mt_rand(1000, 9999);
          $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
          $filename = $_FILES[$meta['kunci']]['name'];
          $ukuran = $_FILES[$meta['kunci']]['size'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);

          if (!in_array($ext, $ekstensi)) {
            $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
            header("Location: ../main.php?p=meta");
            return;
          } else {
            if ($ukuran < 1044070) {
              $new_name = $meta['kunci'] . '.' . $ext;
              if (file_exists('../images/' . $old_photo)) {
                unlink('../images/' . $old_photo);
              }

              if (move_uploaded_file($_FILES[$meta['kunci']]['tmp_name'], '../images/' . $new_name)) {
                // var_dump($_FILES[$meta['kunci']]);
                // die;
                $query = update($c, ['value' => $new_name], 'meta', "kunci='" . $meta['kunci'] . "'");
              } else {
                $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
                header("Location: ../main.php?p=meta");
                return;
              }
            } else {
              $_SESSION['alert'] = alert('Foto tidak boleh melebihi 1Mb', '', 'error');
              header("Location: ../main.php?p=meta");
              return;
            }
          }
        }
      } else {
        $value = mysqli_escape_string($c, $_POST[$meta['kunci']]);

        if ($meta['value'] != $value) {
          $query = update($c, ['value' => $value], 'meta', "kunci='" . $meta['kunci'] . "'");
        }
      }
    }

    // var_dump($_FILES);
    // die;

    if ($query) {
      $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    }
    header("Location: ../main.php?p=meta");
    return;
  }
}

if (isset($_GET['update'])) {
  if ($_GET['update'] == 'ppdb') {
    $uid = htmlspecialchars($_GET['id']);

    $queryCheck = select($c, 'ppdb', ['where' => "uid_ppdb='$uid'"]);
    if ($queryCheck->num_rows > 0) {
      $dataPPDB = mysqli_fetch_assoc($queryCheck);
      $status = $dataPPDB['status'];

      if ($status == 'waiting') {
        $newStatus = 'approved';
      } else {
        $newStatus = 'waiting';
      }

      $updatePPDB = update($c, ['status' => $newStatus], 'ppdb', "uid_ppdb='$uid'");

      if ($updatePPDB) {
        if ($newStatus == 'approved') {
          $_SESSION['alert'] = alert('Pendaftaran disetujui', 'Sukses');
        } else {
          $_SESSION['alert'] = alert('Pendaftaran ditangguhkan', 'Sukses');
        }
        header("Location: ../main.php?p=ppdb");
      }
    }
  }
}
