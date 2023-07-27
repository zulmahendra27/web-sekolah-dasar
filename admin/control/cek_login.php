<?php
include_once "connection.php";
session_start();

$url = parse_url($_SERVER['REQUEST_URI']);
$path = explode('/', $url['path']);

if (!isset($_SESSION['login'])) {
  if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username = mysqli_escape_string($c, htmlspecialchars($_POST['username']));

    $data = mysqli_fetch_array($c->query("SELECT * FROM user WHERE username='$username'"));

    if ($data != NULL) {
      $hash = $data['password'];
      $password = mysqli_escape_string($c, $_POST['password']);
      if (password_verify($password, $hash)) {
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];
        $_SESSION['alert'] = "<script>showSuccessToast('Login Berhasil!')</script>";
        header("Location: ../main.php");
      } else {
        $_SESSION['alert'] = "<script>showDangerToast('Login Gagal! Mohon periksa kembali username atau password')</script>";
        header("Location: ../login.php");
      }
    } else {
      $_SESSION['alert'] = "<script>showDangerToast('Login Gagal! Mohon periksa kembali username atau password')</script>";
      header("Location: ../login.php");
    }
  } else {
    if ($path[3] == 'login.php') {
      return;
    }

    $_SESSION['alert'] = "<script>showDangerToast('Login Gagal! Mohon periksa kembali username atau password')</script>";
    header("Location: login.php");
  }
} else {
  if ($path[3] == 'main.php') {
    return;
  }
  header("Location: main.php?p=dashboard");
}
