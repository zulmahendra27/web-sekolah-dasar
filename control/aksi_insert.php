<?php
include_once '../admin/control/connection.php';
include_once '../admin/control/helper.php';
session_start();
date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['ppdb'])) {
  $uid_ppdb = time() . uniqid();
  $dataPPDB = array(
    'uid_ppdb' => $uid_ppdb,
    'nama_lengkap' => mysqli_escape_string($c, htmlspecialchars($_POST['nama_lengkap'])),
    'panggilan' => mysqli_escape_string($c, htmlspecialchars($_POST['panggilan'])),
    'tempat_lahir' => mysqli_escape_string($c, htmlspecialchars($_POST['tempat_lahir'])),
    'tanggal_lahir' => mysqli_escape_string($c, htmlspecialchars($_POST['tanggal_lahir'])),
    'gender' => mysqli_escape_string($c, htmlspecialchars($_POST['gender'])),
    'agama' => mysqli_escape_string($c, htmlspecialchars($_POST['agama'])),
    'anak_ke' => mysqli_escape_string($c, htmlspecialchars($_POST['anak_ke'])),
    'status_anak' => mysqli_escape_string($c, htmlspecialchars($_POST['status_anak'])),
    'alamat_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['alamat_siswa'])),
    'nohp_siswa' => mysqli_escape_string($c, htmlspecialchars($_POST['nohp_siswa'])),
    'tk_asal' => mysqli_escape_string($c, htmlspecialchars($_POST['tk_asal'])),
    'alamat_tk_asal' => mysqli_escape_string($c, htmlspecialchars($_POST['alamat_tk_asal'])),
    'ayah' => mysqli_escape_string($c, htmlspecialchars($_POST['ayah'])),
    'ibu' => mysqli_escape_string($c, htmlspecialchars($_POST['ibu'])),
    'alamat_ortu' => mysqli_escape_string($c, htmlspecialchars($_POST['alamat_ortu'])),
    'nohp_ortu' => mysqli_escape_string($c, htmlspecialchars($_POST['nohp_ortu'])),
    'pekerjaan_ayah' => mysqli_escape_string($c, htmlspecialchars($_POST['pekerjaan_ayah'])),
    'pekerjaan_ibu' => mysqli_escape_string($c, htmlspecialchars($_POST['pekerjaan_ibu'])),
    'sekolah_ayah' => mysqli_escape_string($c, htmlspecialchars($_POST['sekolah_ayah'])),
    'sekolah_ibu' => mysqli_escape_string($c, htmlspecialchars($_POST['sekolah_ibu'])),
    'penghasilan_ayah' => mysqli_escape_string($c, htmlspecialchars($_POST['penghasilan_ayah'])),
    'penghasilan_ibu' => mysqli_escape_string($c, htmlspecialchars($_POST['penghasilan_ibu'])),
    'wali' => mysqli_escape_string($c, htmlspecialchars($_POST['wali'])),
    'alamat_wali' => mysqli_escape_string($c, htmlspecialchars($_POST['alamat_wali'])),
    'nohp_wali' => mysqli_escape_string($c, htmlspecialchars($_POST['nohp_wali'])),
    'pekerjaan_wali' => mysqli_escape_string($c, htmlspecialchars($_POST['pekerjaan_wali'])),
    'sekolah_wali' => mysqli_escape_string($c, htmlspecialchars($_POST['sekolah_wali'])),
    'penghasilan_wali' => mysqli_escape_string($c, htmlspecialchars($_POST['penghasilan_wali'])),
    'status' => 'waiting'
  );

  if (!empty($_FILES['foto_siswa_ppdb']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_siswa_ppdb']['name'];
    $ukuran = $_FILES['foto_siswa_ppdb']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=ppdb");
      return;
    } else {
      $new_name = 'siswa-' . $rand . '_' . uniqid() . '.' . $ext;
      if (move_uploaded_file($_FILES['foto_siswa_ppdb']['tmp_name'], '../images/ppdb/siswa/' . $new_name)) {
        $dataPPDB += ['foto_siswa_ppdb' => $new_name];
      } else {
        $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
        header("Location: ../main.php?p=ppdb");
        return;
      }
    }
  }

  if (!empty($_FILES['foto_kk']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_kk']['name'];
    $ukuran = $_FILES['foto_kk']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=ppdb");
      return;
    } else {
      $new_name = 'kk-' . $rand . '_' . uniqid() . '.' . $ext;
      if (move_uploaded_file($_FILES['foto_kk']['tmp_name'], '../images/ppdb/kk/' . $new_name)) {
        $dataPPDB += ['foto_kk' => $new_name];
      } else {
        $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
        header("Location: ../main.php?p=ppdb");
        return;
      }
    }
  }

  if (!empty($_FILES['ktp_ayah']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['ktp_ayah']['name'];
    $ukuran = $_FILES['ktp_ayah']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=ppdb");
      return;
    } else {
      $new_name = 'ayah-' . $rand . '_' . uniqid() . '.' . $ext;
      if (move_uploaded_file($_FILES['ktp_ayah']['tmp_name'], '../images/ppdb/ktp_ayah/' . $new_name)) {
        $dataPPDB += ['ktp_ayah' => $new_name];
      } else {
        $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
        header("Location: ../main.php?p=ppdb");
        return;
      }
    }
  }

  if (!empty($_FILES['ktp_ibu']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['ktp_ibu']['name'];
    $ukuran = $_FILES['ktp_ibu']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=ppdb");
      return;
    } else {
      $new_name = 'ibu-' . $rand . '_' . uniqid() . '.' . $ext;
      if (move_uploaded_file($_FILES['ktp_ibu']['tmp_name'], '../images/ppdb/ktp_ibu/' . $new_name)) {
        $dataPPDB += ['ktp_ibu' => $new_name];
      } else {
        $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
        header("Location: ../main.php?p=ppdb");
        return;
      }
    }
  }

  if (!empty($_FILES['ktp_wali']['name'])) {
    $rand = mt_rand(1000, 9999);
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['ktp_wali']['name'];
    $ukuran = $_FILES['ktp_wali']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      $_SESSION['alert'] = alert('File harus berformat jpg, png, atau gif', '', 'error');
      header("Location: ../main.php?p=ppdb");
      return;
    } else {
      $new_name = 'wali-' . $rand . '_' . uniqid() . '.' . $ext;
      if (move_uploaded_file($_FILES['ktp_wali']['tmp_name'], '../images/ppdb/ktp_wali/' . $new_name)) {
        $dataPPDB += ['ktp_wali' => $new_name];
      } else {
        $_SESSION['alert'] = alert('Upload foto gagal', '', 'error');
        header("Location: ../main.php?p=ppdb");
        return;
      }
    }
  }

  // echo json_encode($dataPPDB);

  $queryPPDB = insert($c, $dataPPDB, 'ppdb');

  if ($queryPPDB) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    header("Location: ../main.php?p=finalisasi_ppdb&id=$uid_ppdb");
  }
} elseif (isset($_POST['berita'])) {
  $judul_berita = mysqli_escape_string($c, htmlspecialchars($_POST['judul_berita']));
  $slug_berita = str_replace(' ', '-', $judul_berita);
  $slug_berita = strtolower($slug_berita);
  $slug_berita = substr($slug_berita, 0, 100) . '-' . strtotime(date('Y-m-d H:i:s'));

  $isi_berita = $_POST['isi_berita'];

  $user_posting = $id_user;

  $data_berita = array(
    'judul_berita' => $judul_berita,
    'slug_berita' => $slug_berita,
    'isi_berita' => $isi_berita,
    'user_posting' => $user_posting,
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
          $data_berita += ['foto_berita' => $new_name];
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

  $query_berita = insert($c, $data_berita, 'berita');

  if ($query_berita) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    header("Location: ../main.php?p=berita");
  }
} elseif (isset($_POST['guru'])) {
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

  $query_guru = insert($c, $data_guru, 'guru');

  if ($query_guru) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    header("Location: ../main.php?p=guru");
  }
} elseif (isset($_POST['ekstrakurikuler'])) {
  $nama_ekstrakurikuler = mysqli_escape_string($c, htmlspecialchars($_POST['nama_ekstrakurikuler']));
  $pembina = mysqli_escape_string($c, htmlspecialchars($_POST['pembina']));
  $siswa_mengikuti = mysqli_escape_string($c, htmlspecialchars($_POST['siswa_mengikuti']));

  $dataEkstrakurikuler = [
    'nama_ekstrakurikuler' => $nama_ekstrakurikuler,
    'pembina' => $pembina,
    'siswa_mengikuti' => $siswa_mengikuti
  ];

  $insertEkstrakurikuler = insert($c, $dataEkstrakurikuler, 'ekstrakurikuler');

  if ($insertEkstrakurikuler) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'Sukses');
    header("Location: ../main.php?p=ekstrakurikuler");
  }
}
