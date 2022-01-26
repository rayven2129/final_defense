<!DOCTYPE html>
<html>
<head>
	<title>Enrollment_System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/enrollment_form.js"></script>
	<script type="text/javascript" src="js/global_function.js"></script>
</head>
<body>
	<div class="container-fluid div-header">
		<p class="text-center text-uppercase title-header">Online Enrollment Entry</p>
	</div>
	<div>
		<form action="insert_enrollment.php" method="POST">
			<div class="container-fluid div-enrollment-1" id="form_1">
				<span class="span_page">Page 1 of 5</span>
				<table class="table-design">
				<tr>
					<td>
						<p>Student Type: </p>
					</td>
					<td>
						<select class="btn btn-dark" id="student_type_value_source" onchange="student_type_function()">
						<option>Please Select Option</option>
						<option value="Old">Old</option>
						<option value="New">New</option>
						<option value="Transferee">Transferee</option>
					</select>
					<input type="hidden" name="student_type" id="student_type_value">

					</td>
				</tr>
				<tr>
					<td>
						<p>Grade Level to Be Enroll: </p>
					</td>
					<td>
						<input type="text" name="grade_level" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				</tr>
				<tr>
					<td>
						<p>Last name: </p>
					</td>
					<td>
						<input type="text" name="last_name" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td>
						<p>First name: </p>
					</td>
					<td>
						<input type="text" name="first_name" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td>
						<p>Middle name: </p>
					</td>
					<td>
						<input type="text" name="middle_name" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="button" class="btn btn-success form-control" onclick="button_div_1()">Next</button>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="button" class="btn btn-secondary form-control" onclick="window.location.assign('index.php')">Cancel</button>
					</td>
				</tr>
			</table>

			</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_2">
			<span class="span_page">Page 2 of 5</span>
			<table class="table-design">
				<tr>
					<td>
						<p>Gender: </p>
					</td>
					<td>
						<select class="btn btn-dark" id="gender_type_source" onchange="gender_type_function()">
							<option>Please Select Option</option>
							<option value="MALE">Male</option>
							<option value="FEMALE">Female</option>
						</select>
						<input type="hidden" name="gender_type_result" id="gender_type_result">
					</td>
				</tr>
				<tr>
					<td>
						<p>Age </p>
					</td>
					<td>
						<input type="text" name="age" class="form-control">
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
						<input type="text" name="place_of_birth" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-success form-control" onclick="button_div_2()">Next</button></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="button" class="btn btn-secondary form-control" onclick="button_div_1_previous()">Previous</button>
					</td>
				</tr>
			</table>
		</div>
		<!---->
		<div  class="container-fluid div-enrollment-3" id="form_3">
			<span class="span_page">Page 3 of 5</span>
			<table class="table-design">
				<tr>
					<td>
						<p>House Number/Street. : </p>
					</td>
					<td>
						<input type="text" name="house_street" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td>
						<p>Barangay: </p>
					</td>
					<td>
						<input type="text" name="barangay" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td>
						<p>Municpality: </p>
					</td>
					<td>
						<input type="text" name="municipal" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td>
						<p>Province: </p>
					</td>
					<td>
						<input type="text" name="province" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td>
						<p>Zip Code: </p>
					</td>
					<td>
						<input type="text" name="zip_code" class="form-control" oninput="uppercaseEvent(event)">
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
					<td><button type="button" class="btn btn-success form-control" onclick="button_div_3()">Next</button></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="button" class="btn btn-secondary form-control" onclick="button_div_2_previous()">Previous</button>
					</td>
				</tr>
			</table>
		</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_4">
			<span class="span_page">Page 4 of 5</span>
			<table class="table-design">
				<tr>
					<td>
						<p>Guardian's Name: </p>
					</td>
					<td>
						<input type="text" name="guardian_name" class="form-control" oninput="uppercaseEvent(event)">
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
						<input type="text" name="guardian_relation_to_student" class="form-control" oninput="uppercaseEvent(event)">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-success form-control" onclick="button_div_4()">Next</button></td>
					
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-secondary form-control" onclick="button_div_3_previous()">Previous</button></td>
				</tr>
			</table>
		</div>
		<!---->
		<div  class="container-fluid div-enrollment" id="form_5">
			<span class="span_page">Page 5 of 5</span>
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
					<td><button type="submit" class="btn btn-success form-control">Register</button></td>
					
				</tr>
				<tr>
					<td></td>
					<td><button type="button" class="btn btn-secondary form-control" onclick="button_div_4_previous()">Previous</button></td>
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