<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container-fluid div-header">
		<p class="text-center text-uppercase title-header">Login Center</p>
	</div>
	<div class="container-fluid login-content">
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
						<span>Show password</span>
					</td>
					<td>
						<input type="checkbox" id="password_check" onclick="check_function()" class="checkbox-inline">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-success form-control">Login</button>
						
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="reset" class="btn btn-secondary form-control">Clear</button>
					</td>
				</tr>
				<tr>
					<td>
						<p>No account?<span>Enroll <a href="enrollment_system.php">here</a></span>!</p>
					</td>
				</tr>
			</table>	
		</form>

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
	if ($conn->connect_error) {
		die();
	}else{
		$createDatabase = "CREATE DATABASE IF NOT EXISTS enrollment_grading_system";
		if($conn -> query($createDatabase) == TRUE){
			$conn->close();
			$connectDatabase = new mysqli("localhost","root", "", "enrollment_grading_system");

			$sql = "CREATE TABLE enrollment_system(student_id int(255) AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL,date_of_birth VARCHAR(255) NOT NULL, place_of_birth TEXT NOT NULL,address TEXT NOT NULL,contact_number VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL, guardian_name VARCHAR(255) NOT NULL, guardian_contact_number VARCHAR(255) NOT NULL, guardian_relation_to_student VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, student_status VARCHAR(255) NOT NULL, PRIMARY KEY(student_id), UNIQUE(username))";
			if ($connectDatabase->query($sql) == TRUE) {
				$second_table = "CREATE TABLE grading_system(id_grades int(255) auto_increment not null, student_id int(255) not null, primary key(id_grades), foreign key(student_id) references enrollment_system(student_id))";
				$connectDatabase->query($second_table);
				$third_table = "CREATE TABLE grade_subject(id_subject int(255) auto_increment not null, id_grades int(255) not null, last_name varchar(255) not null, first_name varchar(255) not null ,math int(255) not null,science int(255) not null,ap int(255) not null,filipino int(255) not null,english int(255) not null,pe int(255) not null,health int(255) not null,music int(255) not null,arts int(255) not null,tle int(255) not null, primary key(id_subject), foreign key(id_grades) references grading_system(id_grades))";
				$connectDatabase->query($third_table);
			}else{
				
			}
			$connectDatabase->close();
		}else{
		}

	}





























?>