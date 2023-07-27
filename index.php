<?php
session_start();
if (isset($_GET["p"])) {
  $p = htmlspecialchars($_GET("p"));
  header("Location: main.php?p=" . $p);
} else {
  header("Location: main.php?p=dashboard");
}
