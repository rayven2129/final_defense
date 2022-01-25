<?php
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
          <li><a href="grading_system.php"><i class="fas fa-database"></i> Grading System</a></li>
          <li><a href="#"><i class="fas fa-file-export"></i> Export Grade</a></li>
          <li><a href="edit_accounts.php"><i class="fas fa-edit"></i> Edit Accounts</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="content background-content content-navigation-grades">

      <form>
      <table table-design>
        <tr>
          <th></th>
          <th><h3>Add Grades</h3></th>
        </tr>
        <tr>
          <td><p>Last Name: </p></td>
          <td><input type="text" name="last_name" class="form-control"></td>
        </tr>
        <tr>
          <td><p>First Name: </p></td>
          <td><input type="text" name="first_name" class="form-control"></td>
        </tr>
        <tr>
          <td><p>Math Final Grade: </p></td>
          <td><input type="text" name="math" class="form-control" data-toggle="modal" data-target="#subject" onclick="mathfunction()"></td>
        </tr>
        <tr>
          <td><p>Science Final Grade: </p></td>
          <td><input type="text" name="science" class="form-control" data-toggle="modal" data-target="#subject" onclick="sciencefunction()"></td>
        </tr>
        <tr>
          <td><p>AP Final Grade: </p></td>
          <td><input type="text" name="ap" class="form-control" data-toggle="modal" data-target="#subject" onclick="apfunction()"></td>
        </tr>
        <tr>
          <td><p>Filipino Final Grade: </p></td>
          <td><input type="text" name="filipino" class="form-control" data-toggle="modal" data-target="#subject" onclick="filipinofunction()"></td>
        </tr>
        <tr>
          <td><p>English Final Grade: </p></td>
          <td><input type="text" name="english" class="form-control" data-toggle="modal" data-target="#subject" onclick="englishfunction()"></td>
        </tr>
        <tr>
          <td><p>PE Final Grade: </p></td>
          <td><input type="text" name="pe" class="form-control" data-toggle="modal" data-target="#subject" onclick="pefunction()"></td>
        </tr>
        <tr>
          <td><p>Health Final Grade: </p></td>
          <td><input type="text" name="health" class="form-control" data-toggle="modal" data-target="#subject" onclick="healthfunction()"></td>
        </tr>
        <tr>
          <td><p>Music Final Grade: </p></td>
          <td><input type="text" name="music" class="form-control" data-toggle="modal" data-target="#subject" onclick="musicfunction()"></td>
        </tr>
        <tr>
          <td><p>Arts Final Grade: </p></td>
          <td><input type="text" name="arts" class="form-control" data-toggle="modal" data-target="#subject" onclick="artsfunction()"></td>
        </tr>
        <tr>
          <td><p>TLE Final Grade: </p></td>
          <td><input type="text" name="tle" class="form-control" data-toggle="modal" data-target="#subject" onclick="tlefunction()"></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" class="btn btn-success form-control">Submit Data</button></td>
        </tr>
      </table>
      </form>
    </div>
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
          echo "<td><a href='edit_grade.php=?".$row['id_subject ']."'>Edit Grades</td>";
      		echo "</tr>";
      		}
      	?>
      </tbody>
    </table>
</div>
</div>
<!--Form -->
<div class="container">
  <div class="modal fade" id="subject" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Subject Computation</h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><h5>Subject: </h5></td>
              <td>
              <select class="btn btn-primary" id="select_subject_modal" disabled>
                <option value="math" id="math" selected>Math</option>
                <option value="science" id="science" selected>Science</option>
                <option value="ap" id="ap" selected>Ap</option>
                <option value="filipino" id="filipino" selected>Filipino</option>
                <option value="english" id="english" selected>English</option>
                <option value="pe" id="pe" selected>Pe</option>
                <option value="health" id="health" selected>Health</option>
                <option value="music" id="music" selected>Music</option>
                <option value="arts" id="arts" selected>Arts</option>
                <option value="tle" id="tle" selected>TLE</option>
              </select>
              </td>
            </tr>
             <tr>
              <td><h5>First Grading Period: </h5></td>
              <td><input type="text" name="first_grading" class="form-control"data-toggle="modal" data-target="#computation_initial"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <script type="text/javascript">
        function mathfunction(){
          document.getElementById("math").selected = true;
        }
        function sciencefunction(){
          document.getElementById("science").selected = true;
        }
        function apfunction(){
          document.getElementById("ap").selected = true;
        }
        function filipinofunction(){
          document.getElementById("filipino").selected = true;
        }
        function englishfunction(){
          document.getElementById("english").selected = true;
        }
        function pefunction(){
          document.getElementById("pe").selected = true;
        }
        function healthfunction(){
          document.getElementById("health").selected = true;
        }
        function musicfunction(){
          document.getElementById("music").selected = true;
        }
        function artsfunction(){
          document.getElementById("arts").selected = true;
        }
        function tlefunction(){
          document.getElementById("tle").selected = true;
        }
      </script>
    </div>
  </div>
  <div class="container">
    <div class="modal fade" id="computation_initial" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compute Initial Grade</h4>
        </div>
        <div class="modal-body">
          
        </div>
         <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
</body>
</html>

