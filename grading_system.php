<?php
session_start();
if ($_SESSION['username'] == null && $_SESSION['grade_level'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
$grade_level = $_SESSION['grade_level'];
#$conn = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$sql = "SELECT * FROM grade_subject WHERE grade_level = '$grade_level'";
$fetch = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grading Inquiry-Teacher Admin Page</title>
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
<body>
<div class="container">
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="teacher_admin.php">Teachers Admin Page</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="teacher_admin.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="grading_system.php"><i class="fas fa-database"></i>Grading Inquiry</a></li>
          <li><a href="export_grade.php"><i class="fas fa-file-export"></i> Export Grade</a></li>
          <li><a href="edit_accounts.php"><i class="fas fa-edit"></i> Edit Basic Information</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
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
        <tr class="danger">
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
        </tr>
      </thead>
      <tbody>
      	<?php
      		while ($row = $fetch->fetch_array()) {
          $mapeh = intval(($row['music']+$row['arts']+$row['pe']+$row['health'])/4);
      		echo "<tr class='info'>";
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
