<!DOCTYPE html>
<html>
<head>
	<title>Teacher's Admin Login Page</title>
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
	<fieldset class="container div-header"><p class="text-center text-uppercase title-header">Login Center</p></fieldset>
	
	<fieldset class="container login-content">
		<form action="teachers_login.php" method="POST">
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
						<button type="submit" class="form-control btn-success">Login</button>
						
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="reset" class="form-control btn-success">Clear</button>
					</td>
				</tr>
				<tr>
					<td>
						<p>No account?<span>Sign Up <a href="teachers_signupform.php">here</a></span>!</p>
					</td>
				</tr>
			</table>	
		</form>
	</fieldset>
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