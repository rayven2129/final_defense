<?php
session_start();
unset($_SESSION['username']);
  echo "<script>window.location.assign('index.php');</script>";
?>