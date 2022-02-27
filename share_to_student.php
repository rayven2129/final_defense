<?php
include("connect.php");
session_start();
if ($_SESSION['username'] == null && $_SESSION['grade_level'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
$username = $_SESSION['username'];
$teachers_source_data = "SELECT * FROM teachers_account WHERE t_username = '$username'";
$teacher_query = $conn->query($teachers_source_data);
$teachers_fetch_data = $teacher_query->fetch_array();
$sql_data_sources = "SELECT * FROM grade_subject WHERE id_subject = '$_GET[id]'";
$fetch_query_sources = $conn->query($sql_data_sources);
$fetch_data = $fetch_query_sources->fetch_array();
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
    <div class="container  content-navigation-grades" style="width:500px; box-shadow: 0 0 20px 1px #000000; height: 350px;">
      <form action="" method="POST">
    	<table style="margin: 60px;">
      	<tr>
       <td style="padding: 6px 12px;"><h5>Grade period: </h5></td>
       <td>
       	<select id="grading_period" class="form-control btn btn-design" onchange="grading_period_value()" required>
              <option>Select Option</option>
              <option value="FIRST">First Quarter</option>
              <option value="SECOND">Second Quarter</option>
              <option value="THIRD">Third Quarter</option>
              <option value="FOURTH">Fourth Quarter</option>
              <option value="FINAL">Final Grading</option>
            </select>
            <input type="hidden" name="grading_period_result" id="grading_period_result">
          </td>
       </td>
      <tr>
        <td style="padding: 6px 12px;"><h5>School Year</h5></td>
        <td><input list="sy" name="school_year" class="form-control" required></td>
        <datalist id="sy">
          <option value="2020-2021">
          <option value="2021-2022">
          <option value="2022-2023">
          <option value="2024-2025">
          <option value="2025-2026">
          <option value="2026-2027">
          <option value="2027-2028">
          <option value="2028-2029">
          <option value="2029-2030">
          <option value="2031-2032">
        </datalist>
      </tr>
     </tr>
     <tr>
       <td></td>
       <td><button type="submit" name="submit" class="btn btn-success form-control">Share To Student</button></td>
     </tr>
     <tr>
       <td></td>
       <td><button type="button" class="btn btn-warning form-control" onclick="window.location.assign('student_grade_viewing.php')">Cancel</button></td>
     </tr>
    </table>
    </form>

</div>
</div>
</body>
</script>
</html>
<?php
if (isset($_POST['submit'])) {
	$grading_period_result = $_POST['grading_period_result'];
  if ($grading_period_result == "") {
    echo "<script>alert('Please Insert Grade Quarter!');</script>";
  }else{
    $last_name = $fetch_data['last_name'];
    $grade_level =$fetch_data['grade_level'];
    $first_name = $fetch_data['first_name'];
    $math = $fetch_data['math'];
    $science = $fetch_data['science'];
    $ap = $fetch_data['ap'];
    $filipino = $fetch_data['filipino'];
    $english = $fetch_data['english'];
    $pe = $fetch_data['pe'];
    $health = $fetch_data['health'];
    $music = $fetch_data['music'];
    $arts = $fetch_data['arts'];
    $tle = $fetch_data['tle'];
    $esp = $fetch_data['esp'];
    $teachers_name = $teachers_fetch_data['t_last_name'].", ".$teachers_fetch_data['t_first_name']." ".$teachers_fetch_data['t_middle_name'];
    $teachers_grade_and_section = $teachers_fetch_data['t_section'];
    $school_year = $_POST['school_year'];
    $statement = "INSERT INTO grade_subject_export(id_grades,grade_level,grading,last_name,first_name,math,science,ap,filipino,english,pe,health,music,arts,tle,esp,teachers_name,section,school_year) VALUES ((SELECT student_id from enrollment_system WHERE last_name = '$last_name' AND first_name = '$first_name'),'$grade_level', '$grading_period_result','$last_name','$first_name','$math','$science', '$ap', '$filipino','$english','$pe','$health','$music','$arts', '$tle','$esp','$teachers_name','$teachers_grade_and_section','$school_year')";
        if ($conn->query($statement) == TRUE) {
          echo "<script>alert('Share Data sucessfully!');</script>";
          echo "<script>window.location.assign('grading_system.php');</script>";
        }else{
          echo "<script>alert('Share data failed!');</script>";
          echo "<script>window.location.assign('grading_system.php');</script>";
        }
  }
	
}










?>