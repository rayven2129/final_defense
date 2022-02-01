<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['grade_level']);
  echo "<script>window.location.assign('index.php');</script>";
?>