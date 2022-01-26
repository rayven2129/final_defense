<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$sql = "SELECT * FROM grade_subject";
$fetch = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/global_function.js"></script>
</head>
<body onload="window.print()">

<div class="container">
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="teacher_admin.php">Teachers Admin Page</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="teacher_admin.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="grading_system.php"><i class="fas fa-database"></i> Grading System</a></li>
          <li><a href="export_grade.php"><i class="fas fa-file-export"></i> Export Grade</a></li>
          <li><a href="edit_accounts.php"><i class="fas fa-edit"></i> Edit Accounts</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
  <div class="container">
    <table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr class="danger">
          <th>ID GRADES</th>
          <th>LAST NAME</th>
          <th>FIRST NAME</th>
          <th>MATH</th>
          <th>SCIENCE</th>
          <th>AP</th>
          <th>FILIPINO</th>
          <th>ENGLISH</th>
          <th>PE</th>
          <th>HEALTH</th>
          <th>MUSIC</th>
          <th>ARTS</th>
          <th>TLE</th>
          <th>ESP</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while ($row = $fetch->fetch_array()) {
          echo "<tr class='info'>";
          echo "<td>".$row['id_grades']."</td>";
          echo "<td>".$row['last_name']."</td>";
          echo "<td>".$row['first_name']."</td>";
          echo "<td>".$row['math']."</td>";
          echo "<td>".$row['science']."</td>";
          echo "<td>".$row['ap']."</td>";
          echo "<td>".$row['filipino']."</td>";
          echo "<td>".$row['english']."</td>";
          echo "<td>".$row['pe']."</td>";
          echo "<td>".$row['health']."</td>";
          echo "<td>".$row['music']."</td>";
          echo "<td>".$row['arts']."</td>";
          echo "<td>".$row['tle']."</td>";
          echo "<td>".$row['esp']."</td>";
          echo "</tr>";
          }
        ?>
      </tbody>
    </table>
</div>
</div>
</body>
</html>