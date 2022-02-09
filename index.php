<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--<link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3/css/bootstrap.min.css">-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--<script type="text/javascript" src="../bootstrap-5.1.3/js/bootstrap.min.js"></script>-->
	<script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container div-design">
	<fieldset class="container div-header">
		<img src="images/logo_removebg.png" alt="logo" class="images-design">
	</fieldset>
	
	<fieldset class="container login-content">
		<form action="login.php" method="POST">
			<table class="table-design">
				<tr>	
					<td>
						<p>Username: </p>
					</td>
					<td>
						<input type="text" name="username" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Password: </p>
					</td>
					<td>
						<input type="password" name="password" id="password_login" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<span>Show password &nbsp;&nbsp;&nbsp;</span>
					</td>
					<td>
						<input type="checkbox" id="password_check" onclick="check_function()" class="checkbox-inline">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="form-control btn-success">Login</button>
						
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="reset" class="form-control btn btn-design">Clear</button>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<p>No account? <span><a href="enrollment_system.php">Enroll here</a></span>!</p>
					</td>
				</tr>
			</table>	
		</form>
	</fieldset>
	</div>
</body>
<script type="text/javascript">
	function check_function(){
		var x = document.querySelector("#password_login");
		if (x.type == "password") {
			x.type = "text"
		}else{
			x.type = "password"
		}
	}
</script>
</html>
<?php

$conn = new mysqli("localhost", "root", "");
#$conn = new mysqli("localhost", "id12720654_root", "DOS-sfP1Acyym#4(");

	if ($conn->connect_error) {
		die();
	}else{
		$createDatabase = "CREATE DATABASE IF NOT EXISTS enrollment_grading_system";
		if($conn -> query($createDatabase) == TRUE){
			$conn->close();
			$connectDatabase = new mysqli("localhost","root", "", "enrollment_grading_system");
			#$connectDatabase = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");

			$sql = "CREATE TABLE enrollment_system(student_id int(255) AUTO_INCREMENT NOT NULL,lrn VARCHAR(255) NOT NULL,grade_level int(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL,age int(255) NOT NULL,date_of_birth VARCHAR(255) NOT NULL, place_of_birth TEXT NOT NULL,address TEXT NOT NULL, zip_code INT(255) NOT NULL,contact_number VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL, guardian_name VARCHAR(255) NOT NULL, guardian_contact_number VARCHAR(255) NOT NULL, guardian_relation_to_student VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password_user VARCHAR(255) NOT NULL, student_status VARCHAR(255) NOT NULL, PRIMARY KEY(student_id), UNIQUE(lrn), UNIQUE(username))";
			if ($connectDatabase->query($sql) == TRUE) {
				$second_table = "CREATE TABLE grading_system(id_grades int(255) auto_increment not null, student_id int(255) not null, primary key(id_grades), foreign key(student_id) references enrollment_system(student_id))";
				$connectDatabase->query($second_table);
				$grades_sql = "CREATE TABLE grade_subject(id_subject int(255) auto_increment not null, id_grades int(255) not null,grade_level int(255) NOT NULL,grading varchar(255) not null, last_name varchar(255) not null, first_name varchar(255) not null ,math int(255) not null,science int(255) not null,ap int(255) not null,filipino int(255) not null,english int(255) not null,pe int(255) not null,health int(255) not null,music int(255) not null,arts int(255) not null,tle int(255) not null, esp int(255) not null,primary key(id_subject), foreign key(id_grades) references grading_system(id_grades))";
				$grades_sql_export = "CREATE TABLE grade_subject_export(id_subject int(255) auto_increment not null, id_grades int(255) not null,grade_level int(255) NOT NULL,grading varchar(255) not null, last_name varchar(255) not null, first_name varchar(255) not null ,math int(255) not null,science int(255) not null,ap int(255) not null,filipino int(255) not null,english int(255) not null,pe int(255) not null,health int(255) not null,music int(255) not null,arts int(255) not null,tle int(255) not null, esp int(255) not null,teachers_name varchar(255) not null, section varchar(255) not null, school_year varchar(255) not null,primary key(id_subject), foreign key(id_grades) references grading_system(id_grades))";
				$connectDatabase->query($grades_sql_export);
				$connectDatabase->query($grades_sql);
				$teachers_database = "CREATE TABLE teachers_account(userid INT(255) AUTO_INCREMENT NOT NULL,t_last_name VARCHAR(255) NOT NULL, t_first_name VARCHAR(255) NOT NULL, t_middle_name VARCHAR(255) NOT NULL, t_gender VARCHAR(255) NOT NULL, t_contact_number VARCHAR(255) NOT NULL, t_email_adddress VARCHAR(255) NOT NULL, t_grade_level VARCHAR(255) NOT NULL, t_section VARCHAR(255) NOT NULL, t_username VARCHAR(255) NOT NULL, t_password VARCHAR(255) NOT NULL,images_files varchar(255) NOT NULL, PRIMARY KEY(userid))";
				$connectDatabase->query($teachers_database);
			}else{
				
			}
			$connectDatabase->close();
		}else{
		}

	}





























?>