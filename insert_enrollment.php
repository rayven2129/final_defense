<?php
$conn = new mysqli("localhost", "root","","enrollment_grading_system");
$grade_level = $_POST['grade_level'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$gender_type_result = $_POST['gender_type_result'];
$age = $_POST['age'];
$date_of_birth = $_POST['date_of_birth'];
$place_of_birth = $_POST['place_of_birth'];
$house_street = $_POST['house_street'];
$barangay = $_POST['barangay'];
$municipal = $_POST['municipal'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];
$complete_address = $house_street.", ".$barangay .", ".$municipal .", ". $province;
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$guardian_name = $_POST['guardian_name'];
$guardian_contact_number = $_POST['guardian_contact_number'];
$guardian_relation_to_student = $_POST['guardian_relation_to_student'];
$username = $_POST['username'];
$password = $_POST['password'];
$student_type = $_POST['student_type'];

$search_duplicate = "SELECT username FROM enrollment_system WHERE username = '$username'";
$query = $conn->query($search_duplicate);
$fetch = $query->fetch_array();
	if ($username == isset($fetch['username'])) {
		echo "<script>alert('Username exists');</script>";
		echo "<script>window.location.assign('enrollment_system.php');</script>";
	}else{
		$sql = "INSERT INTO enrollment_system(grade_level,last_name,first_name,middle_name,gender,age,date_of_birth,place_of_birth,address,zip_code,contact_number,email_address,guardian_name,guardian_contact_number,guardian_relation_to_student,username,password_user,student_status) VALUES ('$grade_level','$last_name','$first_name','$middle_name','$gender_type_result','$age','$date_of_birth','$place_of_birth','$complete_address','$zip_code','$contact_number','$email_address','$guardian_name','$guardian_contact_number','$guardian_relation_to_student','$username','$password','$student_type')";

			if ($conn->query($sql) == TRUE) {
				$insert_second_table = "INSERT into grading_system(student_id) VALUES ((SELECT student_id from enrollment_system WHERE username = '$username'))";
					if ($conn->query($insert_second_table) == TRUE) {
						echo "<script>alert('Created Account Success!');</script>";
						echo "<script>window.location.assign('index.php');</script>";
					}else{
						echo "<script>alert('".$complete_address."');</script>";
						echo "<script>window.location.assign('index.php');</script>";
					}
				
			}else{
				echo "<script>alert('".$complete_address."'');</script>";
				echo "<script>window.location.assign('index.php');</script>";>";
			}

	}



?>