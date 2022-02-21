<?php
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username == "admin" && $password == "admin") {
	$_SESSION['username'] = $username;
	echo 200;
}else{
	echo 201;
}

?>