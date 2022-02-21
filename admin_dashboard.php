<?php
session_start();
if ($_SESSION['username'] == null) {
	echo "<script>alert('Please Login First');</script>";
	echo "<script>window.location.assign('admin_account.php');</script>";
}
include("connect.php");;
$sql = "SELECT * FROM enrollment_system";
$fetch = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Portal Page</title>
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
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a href="teacher_admin.php" class="navbar-brand">
            <img src="images/logo_navigation-removebg-preview.png" alt="logo" class="rounded-pill" style="width: 60px;"><span style="font-size: 35px;">|</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
         <span class="navbar-toggler-icon"></span></button>
            <ul class="navbar-nav me-auto navbar-header">
                <li class="navbar-brand">
                    <a class="nav-link text-white" href="admin_dashboard.php">Admin Page</a>
                </li>
            </ul>
         
            <div class="d-flex">
              <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                      <a href="" class="nav-link"><i class="fas fa-user"></i> Student Data</a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link"><i class="fas fa-chalkboard-teacher"></i> Teachers Data</a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
              </div>
           </div>
        </div>
      </nav>
<div class="container">
    <div class="container">
      <div class="content"><br>
       <form action="search_teacher_admin.php" method="POST" target="_blank">
      <table class="search_content_parent">
        <tr>
          <td><input type="search" name="search_data" class="form-control" oninput="uppercaseEvent(event)"></td>
          <td><button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
        </tr>
      </table>
      </form>
    </div>
    <table class="table table-hover table-striped table-responsive table-bordered table-design box-shadow-design">
      <thead>
        <tr class="table-background">
          <th>LRN Number</th>
          <th>Grade Level</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Contact Number</th>
          <th>Add Section</th>
        </tr>
      </thead>
      <tbody>
      	<?php
      		while ($row = $fetch->fetch_array()) {
      		echo "<tr class='table-background-content'>";
      		echo "<td><form action=''><input type='button' class='link-design btn' data-bs-toggle='modal' data-bs-target='#add_grade' onclick='value_field(this.value)' value='".$row['lrn']."'></button></td>";
          echo "<td>".$row['grade_level']."<input type='hidden' id='grade_level' value='".$row['grade_level']."'></form></td>";
      		echo "<td>".$row['last_name']." <input type='hidden' id='' value='".$row['last_name']."'></td>";
      		echo "<td>".$row['first_name']."<input type='hidden' id='' value='".$row['first_name']."'></td>";
      		echo "<td>".$row['middle_name']."</td>";
      		echo "<td>".$row['gender']."</td>";
          echo "<td>".$row['age']."</td>";
      		echo "<td>".$row['contact_number']."</td>";
      		echo "</tr>";
      		}
      	?>
      </tbody>
    </table>
</div>
</div>
</body>
</html>