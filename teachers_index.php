<!DOCTYPE html>
<html>
<head>
	<title>Teacher's Portal Login Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!--<link rel="stylesheet" type="text/css" href="../bootstrap-5.1.3/css/bootstrap.min.css">-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--<script type="text/javascript" src="../bootstrap-5.1.3/js/bootstrap.min.js"></script>-->
	<script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container div-design">
	<fieldset class="container div-header">
		<img src="images/logo_removebg.png" style="position: absolute; margin-left: -10em;" alt="logo" class="images-design"><br><br>
		<span style="margin-left: 2em; width: 500px; position: absolute;">RECTO MEMORIAL NATIONAL<br>HIGH SCHOOL</span>
		<br>
		<br>
		<br>
		<span style="margin-left: 50px;">TEACHERS PORTAL</span>
	</fieldset>
	<fieldset class="container login-content">
		<form action="" method="POST" onkeydown="eventFunction(event)">
			<table class="table-design">
				<tr>	
					<td>
						<p>Username: </p>
					</td>
					<td>
						<input type="text" name="username" class="form-control" id="username">
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
						<span style="background-color: red; display: none; font-weight: bolder;" class="form-control text-center" id="error_login">Wrong Username or Password</span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="button" class="form-control btn-success" onclick="teacher_login()" >Login</button>
						
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
						<p>No account? <span><a href="teachers_signupform.php">Sign Up here</a></span>!</p>
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
			x.type = "text";
		}else{
			x.type = "password";
		}
	}
	function eventFunction(event){
		if (event.key == 'Enter') {
			teacher_login();
			}
	}
	function teacher_login(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (xhttp.readyState == 4  && xhttp.status == 200) {
				if (this.response == 200) {
					window.location.assign("teacher_admin.php");
				}else if(this.response == 201){
					var err = document.querySelector("#error_login");
					err.style.display = "block";
					setTimeout(function(){
						err.style.display = "none";
					}, 1500)
				}
			}
		}
		var usr = document.querySelector("#username").value;
		var pwd = document.querySelector("#password_login").value;
		xhttp.open("GET","teachers_login.php?username="+usr+"&password="+pwd);
		xhttp.send();

	}
</script>
</html>