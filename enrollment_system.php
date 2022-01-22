<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enrollment_System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/enrollment_form.js"></script>
</head>
<body>
	<div class="container-fluid div-header">
		<p class="text-center text-uppercase title-header">Online Enrollment Entry</p>
	</div>
	<div>
		<form action="insert_enrollment.php" method="POST">
			<div class="container-fluid div-enrollment" id="form_1">
				<table class="table-design">
				<tr>
					<td>
						<p>Student Type: </p>
					</td>
					<td>
						<select class="btn btn-dark" id="student_type_value_source" onchange="student_type_function()">
						<option value="Old">Old</option>
						<option value="New">New</option>
						<option value="Transferee">Transferee</option>
					</select>
					<input type="hidden" name="student_type" id="student_type_value">
					</td>
				</tr>
				<tr>
					<td>
						<p>Last name: </p>
					</td>
					<td>
						<input type="text" name="last_name" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>First name: </p>
					</td>
					<td>
						<input type="text" name="first_name" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Middle name: </p>
					</td>
					<td>
						<input type="text" name="middle_name" class="form-control">
					</td>
				</tr>
				<tr>
					<td><button type="button" class="btn btn-success" onclick="button_div_1()">Next</button></td>
					<td><button type="button" class="btn btn-secondary" onclick="window.location.assign('index.php')">Cancel</button></td>
				</tr>
			</table>

			</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_2">

			<table class="table-design">
				<tr>
					<td>
						<p>Gender: </p>
					</td>
					<td>
						<select class="btn btn-dark" id="gender_type_source" onchange="gender_type_function()">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						<input type="hidden" name="gender_type_result" id="gender_type_result">
					</td>
				</tr>
				<tr>
					<td>
						<p>Date of Birth: </p>
					</td>
					<td>
						<input type="date" name="date_of_birth" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Place of Birth: </p>
					</td>
					<td>
						<input type="text" name="place_of_birth" class="form-control">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-success" onclick="button_div_2()">Next</button></td>
					<td><button type="button" class="btn btn-secondary" onclick="button_div_1_previous()">Previous</button></td>
				</tr>
			</table>
		</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_3">

			<table class="table-design">
				<tr>
					<td>
						<p>Address: </p>
					</td>
					<td>
						<input type="text" name="complete_address" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Contact  Number: </p>
					</td>
					<td>
						<input type="text" name="contact_number" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Email  Address: </p>
					</td>
					<td>
						<input type="text" name="email_address" class="form-control">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-success" onclick="button_div_3()">Next</button></td>
					<td><button type="button" class="btn btn-secondary" onclick="button_div_2_previous()">Previous</button></td>
				</tr>
			</table>
		</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_4">
			<table class="table-design">
				<tr>
					<td>
						<p>Guardian's Name: </p>
					</td>
					<td>
						<input type="text" name="guardian_name" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Guardian's Contact  Number: </p>
					</td>
					<td>
						<input type="text" name="guardian_contact_number" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p>Guardian's Relation to Student: </p>
					</td>
					<td>
						<input type="text" name="guardian_relation_to_student" class="form-control">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-success" onclick="button_div_4()">Next</button></td>
					<td><button type="button" class="btn btn-secondary" onclick="button_div_3_previous()">Previous</button></td>
				</tr>
			</table>
		</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_5">
			<table class="table-design">
				<tr>
					<td>
						<p>Username : </p>
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
						<input type="password" name="password" class="form-control">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" class="btn btn-success">Register</button></td>
					<td><button type="button" class="btn btn-secondary" onclick="button_div_4_previous()">Previous</button></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	function student_type_function(){
		var x = document.getElementById("student_type_value_source").value;
		document.getElementById("student_type_value").value = x;
	}
	function gender_type_function(){
		var x = document.getElementById("gender_type_source").value;
		document.getElementById("gender_type_result").value = x;
	}
</script>