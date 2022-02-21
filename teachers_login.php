<?php
session_start();
include("connect.php");
$username = $conn->real_escape_string($_REQUEST['username']);
$password = $conn->real_escape_string($_REQUEST['password']);

$sql = "SELECT * FROM teachers_account WHERE t_username = '$username' AND t_password = '$password'";
$result = $conn->query($sql);
$fetch = $result->fetch_array();
if (($username == '' && $password == '')) {
		echo 201;
}else{
	if ($username == isset($fetch['t_username']) && $password == isset($fetch['t_password'])){
		$grade_level = $fetch['t_grade_level'];
		$_SESSION['username'] = $username;
		$_SESSION['grade_level'] = $grade_level;
		echo 200;
	}else{
		echo 201;
	}
} 
?>