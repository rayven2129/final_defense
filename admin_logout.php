<?php
session_start();
unset($_SESSION['username']);
echo "<script>window.location.assign('admin_account.php');</script>";
?>