<?php
session_start();
if ($_SESSION['username'] == '') {
	echo "<script>alert('Please Login First');</script>";
	echo "<script>window.location.assign('index.php');</script>";
}
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$sql = "SELECT * FROM enrollment_system";
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
</head>
<body>
<div class="container">
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="teacher_admin.php">Teachers Admin Page</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="teacher_admin.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="grading_system.php"><i class="fas fa-database"></i>Grading Inquiry</a></li>
          <li><a href="export_grade.php"><i class="fas fa-file-export"></i> Export Grade</a></li>
          <li><a href="edit_accounts.php"><i class="fas fa-edit"></i> Edit Accounts</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
    <table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr class="active">
          <th>Student ID</th>
          <th>Grade Level</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Gender</th>
          <th>Date of Birth</th>
          <th>Age</th>
          <th>Address</th>
          <th>Contact Number</th>
          <th>Guardian Name</th>
          <th>Guardian Contact Number</th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>
      	<?php
      		while ($row = $fetch->fetch_array()) {
      		echo "<tr class='info'>";
      		echo "<td>".$row['student_id']."</td>";
          echo "<td>".$row['grade_level']."</td>";
      		echo "<td>".$row['last_name']."</td>";
      		echo "<td>".$row['first_name']."</td>";
      		echo "<td>".$row['middle_name']."</td>";
      		echo "<td>".$row['gender']."</td>";
      		echo "<td>".$row['date_of_birth']."</td>";
          echo "<td>".$row['age']."</td>";
      		echo "<td>".$row['address']."</td>";
      		echo "<td>".$row['contact_number']."</td>";
      		echo "<td>".$row['guardian_name']."</td>";
      		echo "<td class='text-center'>".$row['guardian_contact_number']."</td>";
      		echo "<td>".$row['username']."</td>";
      		echo "</tr>";
      		}
      	?>
      </tbody>
    </table>
</div>
</div>
</body>
</html>

