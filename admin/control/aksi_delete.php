<?php
include_once 'connection.php';
include_once 'helper.php';
session_start();

if (isset($_GET['del'])) {
  if ($_GET['del'] == 'berita') {
    $id = mysqli_escape_string($c, htmlspecialchars($_GET['id']));

    $queryGuru = select($c, 'berita', ['where' => "id_berita=$id"]);
    if ($queryGuru->num_rows > 0) {
      $dataGuru = mysqli_fetch_assoc($queryGuru);
      $foto_berita = $dataGuru['foto_berita'];

      if (file_exists('../images/berita/' . $foto_berita)) {
        unlink('../images/berita/' . $foto_berita);
      }
    }

    $delGuru = delete($c, 'berita', "id_berita=$id");

    if ($delGuru) {
      $_SESSION['alert'] = alert('Data berhasil dihapus', 'success');
      header("Location: ../main.php?p=berita");
    }
  } elseif ($_GET['del'] == 'guru') {
    $id = mysqli_escape_string($c, htmlspecialchars($_GET['id']));

    $queryGuru = select($c, 'guru', ['where' => "id_guru=$id"]);
    if ($queryGuru->num_rows > 0) {
      $dataGuru = mysqli_fetch_assoc($queryGuru);
      $foto_guru = $dataGuru['foto_guru'];

      if (file_exists('../images/guru/' . $foto_guru)) {
        unlink('../images/guru/' . $foto_guru);
      }
    }

    $delGuru = delete($c, 'guru', "id_guru=$id");

    if ($delGuru) {
      $_SESSION['alert'] = alert('Data berhasil dihapus', 'success');
      header("Location: ../main.php?p=guru");
    }
  } elseif ($_GET['del'] == 'siswa') {
    $id = mysqli_escape_string($c, htmlspecialchars($_GET['id']));

    $queryGuru = select($c, 'siswa', ['where' => "id_siswa=$id"]);
    if ($queryGuru->num_rows > 0) {
      $dataGuru = mysqli_fetch_assoc($queryGuru);
      $foto_siswa = $dataGuru['foto_siswa'];

      if (file_exists('../images/siswa/' . $foto_siswa)) {
        unlink('../images/siswa/' . $foto_siswa);
      }
    }

    $delGuru = delete($c, 'siswa', "id_siswa=$id");

    if ($delGuru) {
      $_SESSION['alert'] = alert('Data berhasil dihapus', 'success');
      header("Location: ../main.php?p=siswa");
    }
  } elseif ($_GET['del'] == 'ekstrakurikuler') {
    $id = mysqli_escape_string($c, htmlspecialchars($_GET['id']));

    $delEkstrakurikuler = delete($c, 'ekstrakurikuler', "id_ekstrakurikuler=$id");

    if ($delEkstrakurikuler) {
      $_SESSION['alert'] = alert('Data berhasil dihapus', 'success');
      header("Location: ../main.php?p=ekstrakurikuler");
    }
  }
} else {
  var_dump('Test');
}
