<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
$username = $_SESSION['username'];
$grade_level = $_SESSION['grade_level'];
include("connect.php");
$sql = "SELECT * FROM teachers_account WHERE t_username = '$username'";
$fetch = $conn->query($sql);
$result = $fetch->fetch_array();
$t_id = $result['userid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Basic Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script type="text/javascript" src="js/global_function.js"></script>
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a href="teacher_admin.php" class="navbar-brand">
            <img src="images/logo_navigation-removebg-preview.png" alt="logo" class="rounded-pill" style="width: 60px;"><span style="font-size: 35px;">|</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
         <span class="navbar-toggler-icon"></span></button>
            <ul class="navbar-nav me-auto navbar-header">
                <li class="navbar-brand">
                    <a class="nav-link text-white" href="teacher_admin.php">Teachers Admin Page</a>
                </li>
            </ul>
         
            <div class="d-flex">
              <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="navbar-nav me-auto">
                     <li class="nav-item">
                     <a href="teacher_admin.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                      <a href="grading_system.php" class="nav-link"><i class="fas fa-database"></i> Grading Inquiry</a>
                    </li>
                    <li class="nav-item">
                      <a href="export_grade.php" class="nav-link"><i class="fas fa-file-export"></i> Export Grade</a>
                    </li>
                    <li class="nav-item">
                      <a href="edit_accounts.php" class="nav-link"><i class="fas fa-edit"></i> Edit Basic Information</a>
                    </li>
                    <li class="nav-item">
                      <a href="edit_teacher_account.php" class="nav-link"><i class="fas fa-key"></i> Edit Teacher Account</a>
                    </li>
                    <li class="nav-item">
                      <a href="tlogout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
              </div>
           </div>
        </div>
      </nav>
      <br><br><br><br><br>
    <div class="container  content-navigation-grades background-box-shadow">
      <form action="" method="POST">
    <table class="background-content">
      <tr>
       <td class="table-spacing"><h4>Last Name: </h4></td>
       <td><input type="text" name="last_name" id="last_name_value" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$result['t_last_name']."'";?> required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>First Name: </h4></td>
       <td><input type="text" name="first_name" id="first_name_value" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$result['t_first_name']."'";?> required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Middle Name: </h4></td>
       <td><input type="text" name="middle_name" id="middle_name_value" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$result['t_middle_name']."'";?> required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Contact Number: </h4></td>
       <td><input type="text" name="contact_number" class="form-control" <?php echo "value = '".$result['t_contact_number']."'";?>  required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Email Address: </h4></td>
       <td><input type="text" name="email_address" class="form-control" <?php echo "value = '".$result['t_email_adddress']."'";?> required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Grade Level: </h4></td>
       <td><input type="text" name="grade_level_value" onkeyup="section_data_value()" id="grade_level_value" class="form-control" <?php echo "value = '".$result['t_grade_level']."'";?> required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>Section: </h4></td>
       <td><input type="text" name="section" id="section_value" class="form-control" <?php echo "value = '".$result['t_section']."'";?> required></td>
     </tr>
      <tr>
       <td class="table-spacing"><h4>New Username: </h4></td>
       <td><input type="text" name="new_username" class="form-control" required></td>
     </tr>
     <tr>
       <td class="table-spacing"><h4>New Password: </h4></td>
       <td><input type="password" name="new_password" id="password_login" class="form-control" required></td>
     </tr>
     <tr>
          <td class="table-spacing">
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
  function section_data_value(){
    var lname = document.querySelector("#last_name_value").value;
    var fname = document.querySelector("#first_name_value").value;
    var mname = document.querySelector("#middle_name_value").value;
    var grade_level = document.querySelector("#grade_level_value").value;
    document.querySelector("#section_value").value = "G"+grade_level+" - "+fname.charAt(0)+mname.charAt(0)+lname.charAt(0);
    
  }
</script>
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
if (isset($_POST['submit'])) {
  // code...
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$grade_level_var = $_POST['grade_level_value'];
$section = $_POST['section'];
$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];
$sql_statement = "UPDATE teachers_account SET t_last_name  = '$last_name', t_first_name = '$first_name',    t_middle_name = '$middle_name', t_contact_number  = '$contact_number', t_email_adddress = '$email_address', t_grade_level = '$grade_level_var', t_section = '$section ',t_username = '$new_username', t_password = '$new_password ' WHERE userId = '$t_id'";

if ($conn->query($sql_statement) == TRUE) {
  echo "<script>alert('Change password Successfully!!');</script>";
  echo "<script>window.location.assign('tlogout.php');</script>";
}else{
  echo "<script>alert('Change password Failed!!');</script>";
}

}

?>
