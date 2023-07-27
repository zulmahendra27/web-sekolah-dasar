<?php
include_once 'connection.php';
include_once 'helper.php';

if (isset($_POST['detail'])) {
  if ($_POST['detail'] == 'berita') {
    $id_berita = mysqli_escape_string($c, htmlspecialchars($_POST['id_berita']));

    echo json_encode(mysqli_fetch_assoc(select($c, 'berita', ['where' => "id_berita=$id_berita"])));
  } elseif ($_POST['detail'] == 'guru') {
    $id_guru = mysqli_escape_string($c, htmlspecialchars($_POST['id_guru']));
    $where = array(
      'where' => "id_guru=$id_guru"
    );

    echo json_encode(mysqli_fetch_assoc(select($c, 'guru', $where)));
  } elseif ($_POST['detail'] == 'siswa') {
    $id_siswa = mysqli_escape_string($c, htmlspecialchars($_POST['id_siswa']));
    $where = array(
      'where' => "id_siswa=$id_siswa"
    );

    echo json_encode(mysqli_fetch_assoc(select($c, 'siswa', $where)));
  } elseif ($_POST['detail'] == 'ekstrakurikuler') {
    $id_ekstrakurikuler = mysqli_escape_string($c, htmlspecialchars($_POST['id_ekstrakurikuler']));

    echo json_encode(mysqli_fetch_assoc(select($c, 'ekstrakurikuler', ['where' => "id_ekstrakurikuler=$id_ekstrakurikuler"])));
  } elseif ($_POST['detail'] == 'ppdb') {
    $uid_ppdb = mysqli_escape_string($c, htmlspecialchars($_POST['uid_ppdb']));

    echo json_encode(mysqli_fetch_assoc(select($c, 'ppdb', ['where' => "uid_ppdb='$uid_ppdb'"])));
  }
} elseif (isset($_POST['laporan'])) {
  session_start();
  if ($_POST['laporan'] == 'penilaian_mapel') {
    $newData = array();
    $id_rombel = mysqli_escape_string($c, htmlspecialchars($_POST['id_rombel']));

    if ($_SESSION['level'] == 'guru') {
      $queryGuru = select($c, 'users a', ['join' => 'INNER JOIN guru b ON a.id_user=b.id_user', 'where' => "a.username='" . $_SESSION['username'] . "'"]);
      $dataGuru = mysqli_fetch_assoc($queryGuru);
      $where = "b.id_rombel=$id_rombel AND b.id_guru=" . $dataGuru['id_guru'];
    } else {
      $where = "b.id_rombel=$id_rombel";

      // $id_siswa = mysqli_escape_string($c, htmlspecialchars($_POST['id_siswa']));

      $querySiswa = select($c, 'siswa', ['where' => "id_rombel=$id_rombel"]);

      $arraySiswa = array();

      foreach ($querySiswa as $dataSiswa) {
        array_push($arraySiswa, $dataSiswa);
      }

      $newData['data_siswa'] = $arraySiswa;
    }

    $join = "INNER JOIN pengampu b ON a.id_mapel=b.id_mapel";
    $queryMapel = select($c, 'mapel a', ['where' => $where, 'join' => $join]);

    $array = array();

    foreach ($queryMapel as $data) {
      array_push($array, $data);
    }

    $newData['data_mapel'] = $array;

    echo json_encode($newData);
  } elseif ($_POST['laporan'] == 'penilaian_siswa') {
    $id_siswa = mysqli_escape_string($c, htmlspecialchars($_POST['id_siswa']));
    $opt = array(
      'where' => "a.id_siswa=$id_siswa"
    );

    echo json_encode(mysqli_fetch_assoc(select($c, 'penilaian a', $opt)));
  }
} elseif (isset($_POST['absensi'])) {
  session_start();
  if ($_POST['absensi'] == 'absensi') {
    $newData = array();
    $id_rombel = mysqli_escape_string($c, htmlspecialchars($_POST['id_rombel']));

    if ($_SESSION['level'] == 'guru') {
      $queryGuru = select($c, 'users a', ['join' => 'INNER JOIN guru b ON a.id_user=b.id_user', 'where' => "a.username='" . $_SESSION['username'] . "'"]);
      $dataGuru = mysqli_fetch_assoc($queryGuru);
      $where = "b.id_rombel=$id_rombel AND b.id_guru=" . $dataGuru['id_guru'];
    } else {
      $where = "b.id_rombel=$id_rombel";
    }

    $join = "INNER JOIN pengampu b ON a.id_mapel=b.id_mapel";
    $queryMapel = select($c, 'mapel a', ['where' => $where, 'join' => $join]);

    $array = array();

    foreach ($queryMapel as $data) {
      array_push($array, $data);
    }

    $newData['data_mapel'] = $array;

    echo json_encode($newData);
  }
}
