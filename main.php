<?php
session_start();
include_once "./admin/control/connection.php";
include_once "./admin/control/helper.php";
if (isset($_GET['p'])) {
  $title = ucwords(str_replace('_', ' ', $_GET['p']));
} else {
  $title = 'Dashboard';
}
$WEB_NAME = "SDN 03 ALAI TIMUR";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title . ' - ' . $WEB_NAME ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="admin/images/twh.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/vendor/sweetalert/sweetalert.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .pointer:hover {
      cursor: pointer;
    }

    .course-item>img,
    div.card-body>img.img-fluid {
      height: 220px;
      object-fit: cover;
      object-position: center;
    }

    div.card-body>img.teacher {
      height: 400px;
      object-fit: cover;
    }
  </style>

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
  $queryMeta = select($c, 'meta');
  $meta = array();
  if ($queryMeta->num_rows > 0) {
    foreach ($queryMeta as $value) {
      $meta[$value['kunci']] = $value['value'];
    }
  }
  ?>

  <?php include_once "./templates/header.php" ?>

  <?php
  if (!isset($_GET['p']) || $_GET['p'] == 'dashboard') {
    include_once "./templates//hero.php";
  }
  ?>

  <?php if (!isset($_GET['p'])) {
    include_once('dashboard.php');
  } else {
    include_once($_GET['p'] . '.php');
  } ?>

  <?php include_once "./templates/footer.php" ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="./assets/vendor/sweetalert/sweetalert.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <?php if (isset($_SESSION['alert'])) {
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
  } ?>

</body>

</html>