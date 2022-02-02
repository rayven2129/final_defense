<?php
include("connect.php");
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$gender_type_result = $_POST['gender_type_result'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$grade_level = $_POST['grade_level'];
$section = $_POST['section'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO teachers_account(t_last_name, t_first_name, t_middle_name, t_gender, t_contact_number, t_email_adddress, t_grade_level, t_section, t_username, t_password) VALUES ('$last_name','$first_name ','$middle_name','$gender_type_result','$contact_number','$email_address','$grade_level','$section','$username','$password')"; 

if ($conn->query($sql) == TRUE) {
	echo "<script>alert('Created Account Success!');</script>";
	echo "<script>window.location.assign('teachers_index.php');</script>";	
}else{
	echo "<script>alert('Create Account Failed');</script>";
	echo "<script>window.location.assign('teachers_index.php');</script>";
}


?>