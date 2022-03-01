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
$images = $_FILES['valid_id']['name'];
$target = "server_files/".basename($images);

$sql = "INSERT INTO teachers_account(t_last_name, t_first_name, t_middle_name, t_gender, t_contact_number, t_email_adddress, t_grade_level, t_section, t_username, t_password, images_files) VALUES ('$last_name','$first_name ','$middle_name','$gender_type_result','$contact_number','$email_address','$grade_level','$section','$username','$password','$images')"; 

if ($conn->query($sql) == TRUE) {
		if (move_uploaded_file($_FILES['valid_id']['tmp_name'], $target)) {
			echo "<script>alertify.alert('Congratulations!!','Thank you for creating account in our system, please enjoy browsing!',function(){
				alertify.success('Create Account Success!!');
				setTimeout(function(){
					window.location.assign('teachers_index.php');
					},3000);
			});</script>";		
		}else{
			echo "<script>alertify.alert('Create Account Failed!!','Create Account Failed',function(){
				setTimeout(function(){
					window.location.assign('teachers_index.php');
					});
			});</script>";
		}	
}else{
	echo "<script>alertify.error('Create Account Failed!!','Create Account Failed',function(){
				setTimeout(function(){
					window.location.assign('teachers_index.php');
					});
			});</script>";
}


?>