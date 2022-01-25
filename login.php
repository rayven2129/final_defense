<?php
$conn = new mysqli("localhost", "root","","enrollment_grading_system");
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM enrollment_system WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
$fetch = $result->fetch_array();
if (($username == '' && $password == '')) {
		echo "<script>alert('Wrong username and password');</script>";
		echo "<script>window.location.assign('index.php')</script>";
}else{
	if ($username == isset($fetch['username']) && $password == isset($fetch['password'])){
		echo "<script>window.location.assign('student_grade_viewing.php');</script>";
	}elseif ($username == 'admin' && $password == 'admin') {
		echo "<script>window.location.assign('teacher_admin.php');</script>";
	}else{
		echo "<script>alert('Wrong username and password');</script>";
		echo "<script>window.location.assign('index.php');</script>";
	}
}
?>