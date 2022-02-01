<?php
session_start();
if ($_SESSION['username'] == '') {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
#$conn = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$search_data = $_POST['search_data'];
$sql = "SELECT * FROM enrollment_system WHERE lrn = '$search_data' OR last_name = '$search_data' OR first_name = '$search_data' OR username = '$search_data'";
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
    <div class="container">
      <div class="content">
       <form action="search_teacher_admin.php" method="POST" target="_blank">
      <table class="search_content_parent">
        <tr>
          <td><input type="search" name="search_data" class="form-control" oninput="uppercaseEvent(event)"></td>
          <td><button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
        </tr>
      </table>
      </form>
    </div>
    <table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr class="active">
          <th>LRN Number</th>
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
          echo "<td><span class='link-design' data-toggle='modal' data-target='#add_grade' onclick='value_field()'>".$row['lrn']."</span><input type='hidden' id='lrn_value' value='".$row['lrn']."'></td>";
          echo "<td>".$row['grade_level']."</td>";
          echo "<td>".$row['last_name']." <input type='hidden' id='last_name' value='".$row['last_name']."'</td>";
          echo "<td>".$row['first_name']."<input type='hidden' id='first_name' value='".$row['first_name']."'</td>";
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
<div class="container">
  <div class="modal fade" id="add_grade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Grade</h4>
        </div>
        <div class="modal-body">
          <form action="add_grade.php" method="POST">
      <table class="table-design">
        <tr>
          <th></th>
          <th><h4>Add Grades for Mr./Ms. <span id="span_modal_header"></span></h4></th>
        </tr>
        <tr>
          <td>Grading Period</td>
          <td>
            <select id="grading_period" class="form-control btn btn-primary" onchange="grading_period_value()">
              <option>Select Option</option>
              <option value="FIRST">First</option>
              <option value="SECOND">Second</option>
              <option value="THIRD">Third</option>
              <option value="FOURTH">Fourth</option>
              <option value="FINAL">Final</option>
            </select>
            <input type="hidden" name="grading_period_result" id="grading_period_result">
          </td>
        </tr>
        <tr>
          <td><p>Last Name: </p><input type="hidden" name="lrn" id="lrn_name"></td>
          <td><input type="text" class="form-control" id="last_name_value" oninput="uppercaseEvent(event)" readonly><input type="hidden" name="last_name" id="last_name_value_hidden"></td>
        </tr>
        <tr>
          <td><p>First Name: </p></td>
          <td><input type="text" name="first_name_value" class="form-control" id="first_name_value" oninput="uppercaseEvent(event)" readonly><input type="hidden" name="first_name" id="first_name_value_hidden"></td>
        </tr>
        <tr>
          <td><p>Math Grade: </p></td>
          <td><input type="text" name="math" id="math" class="form-control"onclick="mathfunction()"></td>
        </tr>
        <tr>
          <td><p>Science Grade: </p></td>
          <td><input type="text" name="science" id="science" class="form-control" data-toggle="modal" data-target="#subject" onclick="sciencefunction()"></td>
        </tr>
        <tr>
          <td><p>Araling Panlipunan Grade: </p></td>
          <td><input type="text" name="ap" id="ap" class="form-control" data-toggle="modal" data-target="#subject" onclick="apfunction()"></td>
        </tr>
        <tr>
          <td><p>Filipino Grade: </p></td>
          <td><input type="text" name="filipino" id="filipino" class="form-control" data-toggle="modal" data-target="#subject" onclick="filipinofunction()"></td>
        </tr>
        <tr>
          <td><p>English Final Grade: </p></td>
          <td><input type="text" name="english" id="english" class="form-control" data-toggle="modal" data-target="#subject" onclick="englishfunction()"></td>
        </tr>
          <tr>
          <td><p>Technology Livelihood and Education Grade: </p></td>
          <td><input type="text" name="tle" id="tle" class="form-control" data-toggle="modal" data-target="#subject" onclick="tlefunction()"></td>
        </tr>
         <tr>
          <td><p>Edukasyon sa Pagpapakatao Grade: </p></td>
          <td><input type="text" name="esp" id="esp" class="form-control" data-toggle="modal" data-target="#subject" onclick="espfunction()"></td>
        </tr>
        <tr>
          <td><p>Music Final Grade: </p></td>
          <td><input type="text" name="music" id="music" class="form-control" data-toggle="modal" data-target="#subject" onclick="musicfunction()"></td>
        </tr>
        <tr>
          <td><p>Arts Final Grade: </p></td>
          <td><input type="text" name="arts" id="arts" class="form-control" data-toggle="modal" data-target="#subject" onclick="artsfunction()"></td>
        </tr>
        <tr>
          <td><p>Physical Education Grade: </p></td>
          <td><input type="text" name="pe" id="pe" class="form-control" data-toggle="modal" data-target="#subject" onclick="pefunction()"></td>
        </tr>
        <tr>
          <td><p>Health Final Grade: </p></td>
          <td><input type="text" name="health" id="health" class="form-control" data-toggle="modal" data-target="#subject" onclick="healthfunction()"></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" name="submit" class="btn btn-success form-control">Submit Data</button></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="reset" class="btn btn-warning form-control">Clear Data</button></td>
        </tr>
      </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  function value_field(){
    var x = document.getElementById('last_name').value;
    var y = document.getElementById('first_name').value;
    var lrn_var = document.getElementById('lrn_value').value;
    document.getElementById('last_name_value').value = x;
    document.getElementById('first_name_value').value = y;
    document.getElementById('last_name_value_hidden').value = x;
    document.getElementById('first_name_value_hidden').value = y;
    document.getElementById('lrn_name').value = lrn_var;
    document.getElementById('span_modal_header').innerHTML = propercase(x);
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

