<?php
session_start();
include("connect.php");
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM teachers_account WHERE t_username = '$username' AND t_password = '$password'";
$result = $conn->query($sql);
$fetch = $result->fetch_array();
if (($username == '' && $password == '')) {
		echo "<script>alert('Wrong username and password');</script>";
		echo "<script>window.location.assign('teachers_index.php');</script>";
}else{
	if ($username == isset($fetch['t_username']) && $password == isset($fetch['t_password'])){
		$grade_level = $fetch['t_grade_level'];
		$_SESSION['username'] = $username;
		$_SESSION['grade_level'] = $grade_level;
		echo "<script>window.location.assign('teacher_admin.php');</script>";
	}else{
		echo "<script>alert('Wrong username and password');</script>";
		echo "<script>window.location.assign('teachers_index.php');</script>";
	}
} 
?>