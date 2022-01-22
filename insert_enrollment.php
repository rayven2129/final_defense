<?php
$conn = new mysqli("localhost", "root","","enrollment_grading_system");
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$gender_type_result = $_POST['gender_type_result'];
$date_of_birth = $_POST['date_of_birth'];
$place_of_birth = $_POST['place_of_birth'];
$complete_address = $_POST['place_of_birth'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$guardian_name = $_POST['guardian_name'];
$guardian_contact_number = $_POST['guardian_name'];
$guardian_relation_to_student = $_POST['guardian_relation_to_student'];
$username = $_POST['username'];
$password = $_POST['password'];
$student_type = $_POST['student_type'];

$sql = "INSERT INTO enrollment_system(last_name,first_name,middle_name,gender,date_of_birth,place_of_birth,address,contact_number,email_address,guardian_name,guardian_contact_number,guardian_relation_to_student,username,password,student_status) VALUES ('$last_name','$first_name','$middle_name','$gender_type_result','$date_of_birth','$place_of_birth','$complete_address','$contact_number','$email_address','$guardian_name','$guardian_contact_number','$guardian_relation_to_student','$username','$password','$student_type')";

if ($conn->query($sql) == TRUE) {
	echo "OK";
}else{
	echo "Not ok";
}








?>