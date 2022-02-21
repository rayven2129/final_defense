<?php
session_start();
if ($_SESSION['username'] == null && $_SESSION['grade_level'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
$grade_level = $_SESSION['grade_level'];
include("connect.php");
$sql = "SELECT * FROM grade_subject WHERE grade_level = '$grade_level'";
$fetch = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grading Inquiry-Teacher Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/global_function.js"></script>
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
    <div class="content">
      <form action="search_grading_system.php" method="POST" target="_blank">
      <table class="search_content">
        <tr>
          <td><input type="search" name="search_data" class="form-control" placeholder="Search...." oninput="uppercaseEvent(event)"></td>
          <td><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
        </tr>
      </table>
      </form>
    </div>
    <div class="container">
    <table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr class="table-background">
          <th>GRADE QUARTER</th>
          <th>LAST NAME</th>
          <th>FIRST NAME</th>
          <th>MATH</th>
          <th>SCIENCE</th>
          <th>AP</th>
          <th>FILIPINO</th>
          <th>ENGLISH</th>
          <th>TLE</th>
          <th>ESP</th>
          <th>MUSIC</th>
          <th>ARTS</th>
          <th>PE</th>
          <th>HEALTH</th>
          <th>MAPEH</th>
          <th>EDIT</th>
          <th>SEND TO STUDENT</th>
        </tr>
      </thead>
      <tbody>
      	<?php
      		while ($row = $fetch->fetch_array()) {
          $mapeh = intval(($row['music']+$row['arts']+$row['pe']+$row['health'])/4);
      		echo "<tr class='table-background-content'>";
          echo "<td>".$row['grading']."</td>";
      		echo "<td>".$row['last_name']."</td>";
      		echo "<td>".$row['first_name']."</td>";
      		echo "<td>".$row['math']."</td>";
      		echo "<td>".$row['science']."</td>";
      		echo "<td>".$row['ap' ]."</td>";
      		echo "<td>".$row['filipino']."</td>";
      		echo "<td>".$row['english']."</td>";
          echo "<td>".$row['tle']."</td>";
          echo "<td>".$row['esp']."</td>";
      		echo "<td>".$row['music']."</td>";
      		echo "<td>".$row['arts']."</td>";
      		echo "<td>".$row['pe']."</td>";
          echo "<td>".$row['health']."</td>";
          echo "<td>".$mapeh."</td>";
          echo "<td><a href='edit_grade.php?id=".$row['id_subject']."' target='_blank'>Edit Grades</td>";
          echo "<td><a href='share_to_student.php?id=".$row['id_subject']."' target='_blank' class='share-design'><i class='fas fa-share-alt'></i>Send</td>";
      		echo "</tr>";


      		}
      	?>
      </tbody>
    </table>
</div>
</div>
</div>
</body>
</html>
