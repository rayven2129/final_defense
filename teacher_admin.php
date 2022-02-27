<?php
session_start();
if ($_SESSION['username'] == '') {
	echo "<script>alert('Please Login First');</script>";
	echo "<script>window.location.assign('index.php');</script>";
}
$grade_level = $_SESSION['grade_level'];
include("connect.php");;
$sql = "SELECT * FROM enrollment_system WHERE grade_level = '$grade_level'";
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
<div class="container">
  <div class="modal fade" id="add_grade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Grade</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="add_grade.php" method="POST">
      <table class="table-design">
        <tr>
          <th colspan="2"><h4 style="margin-left: 150px;">Add Grades for Mr./Ms. <span id="span_modal_header"></span></h4></th>
        </tr>
        <tr><span>Type 0 if data is currently not available</span></tr>
        <tr>
          <td class="table-spacing">Grading Period</td>
          <td>
            <select id="grading_period" class="form-control btn btn-primary" onchange="grading_period_value()">
              <option>Select Option</option>
              <option value="FIRST">First Quarter</option>
              <option value="SECOND">Second Quarter</option>
              <option value="THIRD">Third Quarter</option>
              <option value="FOURTH">Fourth Quarter</option>
              <option value="FINAL">Final Grading</option>
            </select>
            <input type="hidden" name="grading_period_result" id="grading_period_result">
          </td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Last Name: </p><input type="hidden" name="lrn" id="lrn_name"><input type="hidden" name="grade_level" id="grade_level_result"></td>
          <td><input type="text" class="form-control" id="last_name_value" oninput="uppercaseEvent(event)" readonly><input type="hidden" name="last_name" id="last_name_value_hidden"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>First Name: </p></td>
          <td><input type="text" name="first_name_value" class="form-control" id="first_name_value" oninput="uppercaseEvent(event)" readonly><input type="hidden" name="first_name" id="first_name_value_hidden"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Math Grade: </p></td>
          <td><input type="text" name="math" id="math" class="form-control" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Science Grade: </p></td>
          <td><input type="text" name="science" id="science" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Araling Panlipunan Grade: </p></td>
          <td><input type="text" name="ap" id="ap" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Filipino Grade: </p></td>
          <td><input type="text" name="filipino" id="filipino" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>English Final Grade: </p></td>
          <td><input type="text" name="english" id="english" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
          <tr>
          <td class="table-spacing"><p>Technology Livelihood and Education Grade: </p></td>
          <td><input type="text" name="tle" id="tle" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
         <tr>
          <td class="table-spacing"><p>Edukasyon sa Pagpapakatao Grade: </p></td>
          <td><input type="text" name="esp" id="esp" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Music Final Grade: </p></td>
          <td><input type="text" name="music" id="music" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Arts Final Grade: </p></td>
          <td><input type="text" name="arts" id="arts" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Physical Education Grade: </p></td>
          <td><input type="text" name="pe" id="pe" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Health Final Grade: </p></td>
          <td><input type="text" name="health" id="health" class="form-control" data-toggle="modal" data-target="#subject" required></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" name="submit" class="btn btn-success form-control">Save Data</button></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="reset" class="btn btn-warning form-control">Clear Data</button></td>
        </tr>
      </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  function value_field(lrn_var){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        var res = JSON.parse(this.response);
        var header_content = res["last_name"];
        var first_name = res["first_name"];
        var grade_level = res["grade_level"];
        document.getElementById("lrn_name").value = lrn_var;
        document.getElementById('span_modal_header').innerHTML= propercase(header_content) +" "+ propercase(first_name);
        document.getElementById('last_name_value').value = header_content;
        document.getElementById('first_name_value').value=first_name;
        document.getElementById('last_name_value_hidden').value = header_content;
        document.getElementById('first_name_value_hidden').value = first_name;
        document.getElementById('grade_level_result').value = grade_level;
      }
    };
   xhttp.open("GET", "request.php?request="+lrn_var, true);
   xhttp.send();
  }
  function propercase(str){
    str = str.toLowerCase().split(' ');
    for (var i = 0; i < str.length; i++) {
      str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
    }
    return str.join(' ');
  }
</script>
</html>

