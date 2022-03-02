<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
	<script type="text/javascript">
		alertify.set('notifier','position','top-center');
	</script>
</head>
<body>

</body>
</html>
<?php
include("connect.php");
$lrn = $_POST['lrn'];
$grade_level = $_POST['grade_level'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$gender_type_result = $_POST['gender_type_result'];
$age = $_POST['age'];
$date_of_birth = $_POST['date_of_birth'];
$place_of_birth = $_POST['place_of_birth'];
$house_number = $_POST['house_number'];
$street_number = $_POST['street_number'];
$villages = $_POST['villages'];
$barangay = $_POST['barangay'];
$municipal = $_POST['municipal'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];
$complete_address = $house_number." ".$street_number." ".$villages." ".$barangay .", ".$municipal .", ". $province;
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
		echo "<script>alertify.alert('Alert','Username exists',function(){
			window.location.assign('enrollment_system.php');
		});</script>";
	}else{
		$sql = "INSERT INTO enrollment_system(lrn,grade_level,last_name,first_name,middle_name,gender,age,date_of_birth,place_of_birth,address,zip_code,contact_number,email_address,guardian_name,guardian_contact_number,guardian_relation_to_student,username,password_user,student_status, section) VALUES ('$lrn','$grade_level','$last_name','$first_name','$middle_name','$gender_type_result','$age','$date_of_birth','$place_of_birth','$complete_address','$zip_code','$contact_number','$email_address','$guardian_name','$guardian_contact_number','$guardian_relation_to_student','$username','$password','$student_type','')";

			if ($conn->query($sql) == TRUE) {
				$insert_second_table = "INSERT into grading_system(student_id) VALUES ((SELECT student_id from enrollment_system WHERE username = '$username'))";
					if ($conn->query($insert_second_table) == TRUE) {
						echo "<script>alertify.alert('Congratulations!','Good day Mr/Ms: ".$last_name.". You created a account successfully in our system. If you have any problems, please contact our administrator. Thank you and have a nice day!',function(){
							alertify.success('Account Created Successfully!!');
							setTimeout(function(){
								window.location.assign('index.php');
								},3000)
						});</script>";
					}else{
						echo "<script>alertify.alert('Account Failed','Create Accound Failed, maybe you create an existing account or your data that you input is incorrect. Please try again. Thank you!',function(){
							window.location.assign('index.php');
						});</script>";
					}
				
			}else{
				echo "<script>alertify.alert('Crate Account Failed','Create Account Failed',function(){
					window.location.assign('index.php');
				});</script>";
			}

	}


?>