<?php
session_start();
$username = '';
$username = $_SESSION['username'];
	if ($username == '') {
		echo "<script>alert('Please Login First');</script>";
		echo "<script>window.location.assign('index.php');</script>";
	}
include("connect.php");
$sql = "SELECT * FROM enrollment_system WHERE username = '$username'";
$result = $conn->query($sql);
$fetch_id = $result->fetch_array();
$stud_id = $fetch_id['student_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Viewing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
       <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a href="student_grade_viewing.php" class="navbar-brand">
            <img src="images/logo_navigation-removebg-preview.png" alt="logo" class="rounded-pill" style="width: 60px;"><span style="font-size: 35px;">|</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
         <span class="navbar-toggler-icon"></span></button>
            <ul class="navbar-nav me-auto navbar-header">
                <li class="navbar-brand">
                    <a class="nav-link text-white" href="student_grade_viewing.php">Student Viewing Page</a>
                </li>
            </ul>
         
            <div class="d-flex">
              <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="navbar-nav me-auto">
                     <li class="nav-item">
                     <a href="student_grade_viewing.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                      <a href="download_grade.php" class="nav-link"><i class="fas fa-download"></i> Download Grade</a>
                    </li>
                    <li class="nav-item">
                      <a href="edit_password.php" class="nav-link"><i class="fas fa-key"></i> Edit Password</a>
                    </li>
                    <li class="nav-item">
                      <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
              </div>
           </div>
        </div>
      </nav>
    <div class="container background-content content-navigation-grades background-box-shadow div-header">
      <form action="" method="POST">
    <table class="table-margin">
      <tr>
       <td class="table-spacing"><h4>New Username: </h4></td>
       <td><input type="text" name="new_username" class="form-control" required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Old Password: </h4></td>
       <td><input type="password" name="old_password" class="form-control" required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>New Password: </h4></td>
       <td><input type="password" name="new_password" id="password_login" class="form-control" required></td>
     </tr>
     <tr>
          <td></td>
          <td>
            <span>Show password: </span><input type="checkbox" id="password_check" onclick="check_function()" class="form-check-input">
          </td>
        </tr>
     <tr>
       <td></td>
       <td class="table-spacing"><button type="submit" name="submit" class="btn btn-success form-control">Change Password</button></td>
     </tr>
     <tr>
       <td></td>
       <td class="table-spacing"><button type="button" class="btn btn-danger form-control" onclick="window.location.assign('student_grade_viewing.php')">Cancel</button></td>
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
      $new_username = $_POST['new_username'];
      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
        if ($old_password != $fetch_id['password_user']) {
          echo "<script>alert('Incorrect old password');</script>";
          echo $stud_id;
        }else{
          $change_password = "UPDATE enrollment_system SET username = '$new_username', password_user = '$new_password'  WHERE student_id = '$stud_id'";
            if ($conn->query($change_password) == TRUE) {
                echo "<script>alert('Change password Successfully!!');</script>";
                echo "<script>window.location.assign('logout.php');</script>";
            }else{
                echo "<script>alert('Change password Failed!!');</script>";
                
            }
        }
  }

?>

