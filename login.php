<?php
$conn = new mysqli("localhost", "root","","enrollment_grading_system");
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM enrollment_system WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
$fetch = $result->fetch_array();


if ($username == isset($fetch['username']) && $password == isset($fetch['password'])){
	echo "<script>alert('Success_Database');</script>";
}elseif ($username == 'admin' && $password == 'admin') {
	echo "<script>alert('Success_Admin');</script>";
}else{
	echo "<script>alert('Wrong username and password');</script>";
	echo "<script>window.location.assign('index.php')</script>";
}
?>