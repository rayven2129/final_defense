<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
include("connect.php");
$sql = "SELECT * FROM grade_subject WHERE grading = '$_GET[id]'";
$grading_period = $_GET['id'];
$fetch = $conn->query($sql);
$data = $fetch->fetch_array();
$last_name = $data['last_name'];
$first_name = $data['first_name'];
$getlrn = "SELECT * FROM enrollment_system WHERE last_name = '$last_name'  AND first_name = '$first_name'";
$query_data = $conn->query($getlrn);
$data_student = $query_data->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export Grade-Teacher Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" type="text/css" href="css/export_design.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/global_function.js"></script>
</head>
<body onload="window.print()">
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
  <div class="centered-div">
<table class="tg" style="width: 50%;">
<thead>
  <tr>
    <th class="tg-j5n6" colspan="3"><span style="font-weight:bold">Copy of Grades                                                                            </span><br><br><br><br><br><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/logo_navigation-removebg-preview.png" alt="logo" class="rounded-pill" style="width: 100px;"><span style="font-weight: bold; font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Republic of the Philippines</span><br><span style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Department Of Education  </span><br><span style="font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Recto Memorial National High School<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Barangay Quipot Tiaong, Quezon 4325<br> <span style="font-weight:bold"> </span><br><br>    Name: <?php echo $data['last_name'].", ".$data['first_name'];?><br>LRN: <?php echo $data_student['lrn']; ?><br>Grade Level: <?php echo $data['grade_level'];?><br>Grade Quarter: <?php  echo $data['grading'];    ?><br></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-baqh" colspan="2">Subject</td>
    <td class="tg-baqh">Grade</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Filipino</td>
    <td class="tg-0pky">
      <?php
      if ($grading_period == "FIRST") {
        echo $data['filipino'];
      }else if($grading_period == "SECOND"){
        echo $data['filipino'];
      }else if($grading_period == "THIRD"){
        echo $data['filipino'];
      }else if($grading_period == "FOURTH"){
        echo $data['filipino'];
      }else{

      }
      ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Mathematics</td>
    <td class="tg-0pky">
      <?php
      if ($grading_period == "FIRST") {
        echo $data['math'];
      }else if($grading_period == "SECOND"){
        echo $data['math'];
      }else if($grading_period == "THIRD"){
        echo $data['math'];
      }else if($grading_period == "FOURTH"){
        echo $data['math'];
      }else{

      }
      ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Science</td>
    <td class="tg-0pky">
      <?php
      if ($grading_period == "FIRST") {
        echo $data['science'];
      }else if($grading_period == "SECOND"){
        echo $data['science'];
      }else if($grading_period == "THIRD"){
        echo $data['science'];
      }else if($grading_period == "FOURTH"){
        echo $data['science'];
      }else{

      }
      ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Aralin Panlipunan</td>
    <td class="tg-0pky">
      <?php
      if ($grading_period == "FIRST") {
        echo $data['ap'];
      }else if($grading_period == "SECOND"){
        echo $data['ap'];
      }else if($grading_period == "THIRD"){
        echo $data['ap'];
      }else if($grading_period == "FOURTH"){
        echo $data['ap'];
      }else{

      }
      ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Edukasyon sa Pagpapakatao</td>
    <td class="tg-0pky"><?php
      if ($grading_period == "FIRST") {
        echo $data['esp'];
      }else if($grading_period == "SECOND"){
        echo $data['esp'];
      }else if($grading_period == "THIRD"){
        echo $data['esp'];
      }else if($grading_period == "FOURTH"){
        echo $data['esp'];
      }else{

      }
      ?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Technology and Livelihood Education</td>
    <td class="tg-0pky"><?php
      if ($grading_period == "FIRST") {
        echo $data['tle'];
      }else if($grading_period == "SECOND"){
        echo $data['tle'];
      }else if($grading_period == "THIRD"){
        echo $data['tle'];
      }else if($grading_period == "FOURTH"){
        echo $data['tle'];
      }else{

      }
      ?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">MAPEH</td>
    <td class="tg-0pky">
      <?php
      if ($grading_period == "FIRST") {
        echo $mapeh = intval(($data['music']+$data['arts']+$data['pe']+$data['health'])/4);
      }else if($grading_period == "SECOND"){
        echo $mapeh = intval(($data['music']+$data['arts']+$data['pe']+$data['health'])/4);
      }else if($grading_period == "THIRD"){
        echo $mapeh = intval(($data['music']+$data['arts']+$data['pe']+$data['health'])/4);
      }else if($grading_period == "FOURTH"){
        echo $mapeh = intval(($data['music']+$data['arts']+$data['pe']+$data['health'])/4);
      }else{

      }
      ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Music</td>
    <td class="tg-0pky"><?php
      if ($grading_period == "FIRST") {
        echo $data['music'];
      }else if($grading_period == "SECOND"){
        echo $data['music'];
      }else if($grading_period == "THIRD"){
        echo $data['music'];
      }else if($grading_period == "FOURTH"){
        echo $data['music'];
      }else{

      }
      ?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Arts</td>
    <td class="tg-0pky"><?php
      if ($grading_period == "FIRST") {
        echo $data['arts'];
      }else if($grading_period == "SECOND"){
        echo $data['arts'];
      }else if($grading_period == "THIRD"){
        echo $data['arts'];
      }else if($grading_period == "FOURTH"){
        echo $data['arts'];
      }else{

      }
      ?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Physical Education</td>
    <td class="tg-0pky"><?php
      if ($grading_period == "FIRST") {
        echo $data['pe'];
      }else if($grading_period == "SECOND"){
        echo $data['pe'];
      }else if($grading_period == "THIRD"){
        echo $data['pe'];
      }else if($grading_period == "FOURTH"){
        echo $data['pe'];
      }else{

      }
      ?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Health</td>
    <td class="tg-0pky"><?php
      if ($grading_period == "FIRST") {
        echo $data['health'];
      }else if($grading_period == "SECOND"){
        echo $data['health'];
      }else if($grading_period == "THIRD"){
        echo $data['health'];
      }else if($grading_period == "FOURTH"){
        echo $data['health'];
      }else{

      }
      ?></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="3" rowspan="3"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                             _______________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser name and Signature<br></td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
</tbody>
</table>
  </div>
</div>
</body>
</html>