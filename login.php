<?php
session_start();
include("connect.php");
$username = $conn->real_escape_string($_GET['username']);
$password = $conn->real_escape_string($_GET['password']);

$sql = "SELECT * FROM enrollment_system WHERE username = '$username' AND password_user = '$password'";
$result = $conn->query($sql);
$fetch = $result->fetch_array();
if (($username == '' && $password == '')) {
		echo 201;
}else{
	if ($username == isset($fetch['username']) && $password == isset($fetch['password_user'])){
		echo 200;
		$_SESSION['username'] = $username;
	}else{
		echo 201;
	}
}
?>