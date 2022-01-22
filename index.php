<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
	
</head>
<body>
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
					<td>
						<button type="submit" class="btn btn-success">Login</button>
						<button type="reset" class="btn btn-secondary">Clear</button>
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