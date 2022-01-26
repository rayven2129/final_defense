<?php
session_start();
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$username = '';
$username = $_SESSION['username'];
	if ($username == '') {
		echo "<script>alert('Please Login First');</script>";
		echo "<script>window.location.assign('index.php');</script>";
	}
$sql = "SELECT * FROM enrollment_system WHERE username = '$username'";
$result = $conn->query($sql);
$fetch_id = $result->fetch_array();
$stud_id = isset($fetch_id['student_id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Viewing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="student_grade_viewing.php">Student Viewing Page</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="student_grade_viewing.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="download_grade.php"><i class="fas fa-file-export"></i> Download Grade</a></li>
          <li><a href="edit_password.php"><i class="fas fa-key"></i> Edit Password</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container background-content content-navigation-grades">
      <form action="" method="POST">
    <table>
     <tr>
       <td><h4>Old Password: </h4></td>
       <td><input type="text" name="old_password" class="form-control"></td>
     </tr>
     <tr>
       <td><h4>New Password: </h4></td>
       <td><input type="password" name="new_password" id="password_login" class="form-control"></td>
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
       <td><button type="submit" name="submit" class="btn btn-success form-control">Change Password</button></td>
     </tr>
     <tr>
       <td></td>
       <td><button type="button" class="btn btn-danger form-control" onclick="window.location.assign('student_grade_viewing.php')">Cancel</button></td>
     </tr>
    </table>
    </form>
</div>
</div>
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
</body>
</html>
<?php
  if (isset($_POST['submit'])) {
      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
        if ($old_password != $fetch_id['password_user']) {
          echo "<script>alert('Incorrect old password');</script>";
          echo $stud_id;
        }else{
          $change_password = "UPDATE enrollment_system SET password_user = '$new_password' WHERE student_id = '$stud_id'";
            if ($conn->query($change_password) == TRUE) {
                echo "<script>alert('Change password Successfully!!');</script>";
                echo "<script>window.location.assign('logout.php');</script>";
            }else{
                echo "<script>alert('Change password Failed!!');</script>";
                
            }
        }
  }

?>

