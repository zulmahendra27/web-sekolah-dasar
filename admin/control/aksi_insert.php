<?php
include_once 'connection.php';
include_once 'helper.php';
session_start();
date_default_timezone_set("Asia/Jakarta");

$username = $_SESSION['username'];
$queryUser = select($c, 'user', ['where' => "username='$username'"]);
$id_user = mysqli_fetch_assoc($queryUser)['id_user'];

if (isset($_POST['berita'])) {
  $judul_berita = mysqli_escape_string($c, htmlspecialchars($_POST['judul_berita']));
  $slug_berita = str_replace(' ', '-', $judul_berita);
  $slug_berita = strtolower($slug_berita);
  $slug_berita = substr($slug_berita, 0, 50) . '-' . strtotime(date('Y-m-d H:i:s'));

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
    'jabatan_guru' => mysqli_escape_string($c, htmlspecialchars($_POST['jabatan'])),
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
} elseif (isset($_POST['siswa'])) {
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

  $query_siswa = insert($c, $data_siswa, 'siswa');

  if ($query_siswa) {
    $_SESSION['alert'] = alert('Data berhasil disimpan', 'success');
    header("Location: ../main.php?p=siswa");
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
