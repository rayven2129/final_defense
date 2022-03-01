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
$fetch_password_user = $fetch_id['password_user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Viewing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <!-- JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<?php
echo "<script>var stud_id = '".$stud_id."'</script>";
echo "<script>var password_user = '".$fetch_password_user."'</script>";

?>
<script type="text/javascript">
  function edit_submit_password_check_field(){
    var usr = document.querySelector('#new_username').value;
    var oldpwd = document.querySelector('#old_password').value;
    var newpwd = document.querySelector('#password_login').value;
    if (usr == "" || oldpwd == "" || newpwd == "") {
      alertify.alert('Invalid','Fields Must be not Empty!!');
    }else{
      edit_submit_password(usr,oldpwd,newpwd,stud_id,password_user);
    }
  }
</script>
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
       <td><input type="text" name="new_username" id="new_username" class="form-control" required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Old Password: </h4></td>
       <td><input type="password" name="old_password" id="old_password" class="form-control" required></td>
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
       <td class="table-spacing"><button type="button" class="btn btn-success form-control" onclick="edit_submit_password_check_field()">Change Password</button></td>
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
    var y = document.querySelector("#old_password");
    var x = document.querySelector("#password_login");
    if (x.type == "password" && y.type == "password") {
      x.type = "text";
      y.type = "text";
    }else{
      x.type = "password";
      y.type = "password";
    }
  }

  function edit_submit_password(username,old_password,new_password,stud_id,password_user){
    var ajax = new XMLHttpRequest();
    ajax.open("POST","edit_password_data.php?new_username="+username+"&old_password="+old_password+"&new_password="+new_password+"&stud_id="+stud_id+"&password_user="+password_user);
    ajax.send();
    ajax.onreadystatechange = function(){
      if (ajax.readyState == 4 && ajax.status == 200) {
          if (this.response == 200) {
            alertify.alert('Success','Thank You! Your Credentials has been changed!. You will log out in the system!',function (){
              alertify.set('notifier','position','top-center');
              alertify.success("Successfully change credentials");
              setTimeout(function(){
                window.location.assign("index.php");
              },3000);
              
            });
          }else if(this.response == 201){
            alertify.alert('Failed',"Sorry you input wrong credentials, please try again!");
          }else if (this.response == 202){
            alertify.alert('Incorrect Old Password','Uhm it seems that you input wrong crendentials in old password huh?, Please input valid old password!');
          }
      }
    }
  }
</script>
</body>
</html>

