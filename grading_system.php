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
    <div class="content background-content content-navigation-grades">

      <form action="" method="POST">
      <table table-design>
        <tr>
          <th></th>
          <th><h3>Add Grades</h3></th>
        </tr>
        <tr>
          <td>Grading Period</td>
          <td>
            <select id="grading_period" class="form-control btn btn-primary" onchange="grading_period_value()">
              <option>Select Option</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
              <option value="fourth">Fourth</option>
            </select>
            <input type="hidden" name="grading_period_result" id="grading_period_result">
          </td>
        </tr>
        <tr>
          <td><p>Last Name: </p></td>
          <td><input type="text" name="last_name" class="form-control" oninput="uppercaseEvent(event)"></td>
        </tr>
        <tr>
          <td><p>First Name: </p></td>
          <td><input type="text" name="first_name" class="form-control" oninput="uppercaseEvent(event)"></td>
        </tr>
        <tr>
          <td><p>Math Grade: </p></td>
          <td><input type="text" name="math" id="math" class="form-control" data-toggle="modal" data-target="#subject" onclick="mathfunction()"></td>
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
          <td><p>Physical Education Grade: </p></td>
          <td><input type="text" name="pe" id="pe" class="form-control" data-toggle="modal" data-target="#subject" onclick="pefunction()"></td>
        </tr>
        <tr>
          <td><p>Health Final Grade: </p></td>
          <td><input type="text" name="health" id="health" class="form-control" data-toggle="modal" data-target="#subject" onclick="healthfunction()"></td>
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
          <td><p>Technology Livelihood and Education Grade: </p></td>
          <td><input type="text" name="tle" id="tle" class="form-control" data-toggle="modal" data-target="#subject" onclick="tlefunction()"></td>
        </tr>
         <tr>
          <td><p>Edukasyon sa Pagpapakatao Grade: </p></td>
          <td><input type="text" name="esp" id="esp" class="form-control" data-toggle="modal" data-target="#subject" onclick="espfunction()"></td>
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
      </form>
    </div>
    <div class="container">
    <table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr class="danger">
          <th>STUDENT ID</th>
          <th>GRADE QUARTER</th>
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
          <th>EDIT</th>
        </tr>
      </thead>
      <tbody>
      	<?php
      		while ($row = $fetch->fetch_array()) {
      		echo "<tr class='info'>";
      		echo "<td>".$row['id_grades']."</td>";
          echo "<td>".$row['grading']."</td>";
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
          echo "<td><a href='edit_grade.php?id=".$row['id_subject']."' target='_blank'>Edit Grades</td>";
      		echo "</tr>";
      		}
      	?>
      </tbody>
    </table>
</div>
</div>
<!--Form 
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
                <option value="math" id="math_option" selected>Math</option>
                <option value="science" id="science_option" selected>Science</option>
                <option value="ap" id="ap_option" selected>Ap</option>
                <option value="filipino" id="filipino_option" selected>Filipino</option>
                <option value="english" id="english_option" selected>English</option>
                <option value="pe" id="pe_option" selected>Pe</option>
                <option value="health" id="health_option" selected>Health</option>
                <option value="music" id="music_option" selected>Music</option>
                <option value="arts" id="arts_option" selected>Arts</option>
                <option value="tle" id="tle_option" selected>TLE</option>
                <option value="esp" id="esp_option" selected>Esp</option>
              </select>
              </td>
            </tr>
             <tr>
              <td><h5>First Grading Period: </h5></td>  
              <td><input type="text" name="first_grading" id="first_grading" class="form-control"data-toggle="modal" data-target="#computation_initial" readonly></td>
            </tr>
            <tr>
              <td><h5>Second Grading Period: </h5></td>
              <td><input type="text" name="second_grading" id="second_grading" class="form-control"data-toggle="modal" data-target="#computation_second" readonly></td>
            </tr>
            <tr>
              <td><h5>Third Grading Period: </h5></td>
              <td><input type="text" name="third_grading" id="third_grading" class="form-control"data-toggle="modal" data-target="#computation_third" readonly></td>
            </tr>
            <tr>
              <td><h5>Fourth Grading Period: </h5></td>
              <td><input type="text" name="fourth_grading" id="fourth_grading" class="form-control"data-toggle="modal" data-target="#computation_fourth" readonly></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="button" class="btn btn-success form-control" data-dismiss="modal" onclick="compute_per_grading()">Compute</button></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="modal fade" id="computation_initial" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compute First Grading</h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><input type="hidden" name="hidden" id="value_subject"></td>
              <td><input type="hidden" name="hidden" id="value_subject_math"></td>
              <td><input type="hidden" name="hidden" id="value_subject_science"></td>
              <td><input type="hidden" name="hidden" id="value_subject_ap"></td>
              <td><input type="hidden" name="hidden" id="value_subject_filipino"></td>
              <td><input type="hidden" name="hidden" id="value_subject_english"></td>
              <td><input type="hidden" name="hidden" id="value_subject_pe"></td>
              <td><input type="hidden" name="hidden" id="value_subject_health"></td>
              <td><input type="hidden" name="hidden" id="value_subject_music"></td>
              <td><input type="hidden" name="hidden" id="value_subject_arts"></td>
              <td><input type="hidden" name="hidden" id="value_subject_tle"></td>
              <td><input type="hidden" name="hidden" id="value_subject_esp"></td>
            </tr>
            <form>
            <tr>
              <td><h5>Total Items of Written Work: </h5></td>
              <td><input type="text" name="written_total_items" id="written_total_items_first" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Written Work: </h5></td>
              <td><input type="text" name="written_total_score" id="written_total_score_first" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Items of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_items" id="performance_total_items_first" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_score" id="performance_total_score_first" class="form-control"></td>
            </tr>
             <tr>
              <td><h5>Total Items of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_items" id="quarterly_total_items_first" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_score" id="quarterly_total_score_first" class="form-control"></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="button" class="btn btn-success form-control" onclick="compute_quarterlyfistgrade()" data-dismiss="modal">Compute</button></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="reset" class="btn btn-warning form-control">Clear</button></td>
            </tr>
          </table>
          </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="modal fade" id="computation_second" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compute Second Grading</h4>
        </div>
        <div class="modal-body">
          <table>
              <td><input type="hidden" name="hidden" id="value_subject"></td>
              <td><input type="hidden" name="hidden" id="value_subject_math"></td>
              <td><input type="hidden" name="hidden" id="value_subject_science"></td>
              <td><input type="hidden" name="hidden" id="value_subject_ap"></td>
              <td><input type="hidden" name="hidden" id="value_subject_filipino"></td>
              <td><input type="hidden" name="hidden" id="value_subject_english"></td>
              <td><input type="hidden" name="hidden" id="value_subject_pe"></td>
              <td><input type="hidden" name="hidden" id="value_subject_health"></td>
              <td><input type="hidden" name="hidden" id="value_subject_music"></td>
              <td><input type="hidden" name="hidden" id="value_subject_arts"></td>
              <td><input type="hidden" name="hidden" id="value_subject_tle"></td>
              <td><input type="hidden" name="hidden" id="value_subject_esp"></td>
              <td><input type="hidden" name="hidden" id="value_subject_esp"></td>
            </tr>
            <form>
            <tr>
            <tr>
              <td><h5>Total Items of Written Work: </h5></td>
              <td><input type="text" name="written_total_items" id="written_total_items_second" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Written Work: </h5></td>
              <td><input type="text" name="written_total_score" id="written_total_score_second" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Items of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_items" id="performance_total_items_second" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_score" id="performance_total_score_second" class="form-control"></td>
            </tr>
             <tr>
              <td><h5>Total Items of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_items" id="quarterly_total_items_second" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_score" id="quarterly_total_score_second" class="form-control"></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="button" class="btn btn-success form-control" onclick="compute_quarterlysecondgrade()" data-dismiss="modal">Compute</button></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="reset" class="btn btn-warning form-control">Clear</button></td>
            </tr>
          </table>
          </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="modal fade" id="computation_third" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compute Third Grading</h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><input type="hidden" name="hidden" id="value_subject"></td>
              <td><input type="hidden" name="hidden" id="value_subject_math"></td>
              <td><input type="hidden" name="hidden" id="value_subject_science"></td>
              <td><input type="hidden" name="hidden" id="value_subject_ap"></td>
              <td><input type="hidden" name="hidden" id="value_subject_filipino"></td>
              <td><input type="hidden" name="hidden" id="value_subject_english"></td>
              <td><input type="hidden" name="hidden" id="value_subject_pe"></td>
              <td><input type="hidden" name="hidden" id="value_subject_health"></td>
              <td><input type="hidden" name="hidden" id="value_subject_music"></td>
              <td><input type="hidden" name="hidden" id="value_subject_arts"></td>
              <td><input type="hidden" name="hidden" id="value_subject_tle"></td>
              <td><input type="hidden" name="hidden" id="value_subject_esp"></td>
            </tr>
            <form>
            <tr>
              <td><h5>Total Items of Written Work: </h5></td>
              <td><input type="text" name="written_total_items" id="written_total_items_third" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Written Work: </h5></td>
              <td><input type="text" name="written_total_score" id="written_total_score_third" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Items of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_items" id="performance_total_items_third" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_score" id="performance_total_score_third" class="form-control"></td>
            </tr>
             <tr>
              <td><h5>Total Items of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_items" id="quarterly_total_items_third" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_score" id="quarterly_total_score_third" class="form-control"></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="button" class="btn btn-success form-control" onclick="compute_quarterlythirdgrade()" data-dismiss="modal">Compute</button></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="reset" class="btn btn-warning form-control">Clear</button></td>
            </tr>
          </table>
          </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>
<div class="container">
    <div class="modal fade" id="computation_fourth" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compute Fourth Grading</h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><input type="hidden" name="hidden" id="value_subject"></td>
              <td><input type="hidden" name="hidden" id="value_subject_math"></td>
              <td><input type="hidden" name="hidden" id="value_subject_science"></td>
              <td><input type="hidden" name="hidden" id="value_subject_ap"></td>
              <td><input type="hidden" name="hidden" id="value_subject_filipino"></td>
              <td><input type="hidden" name="hidden" id="value_subject_english"></td>
              <td><input type="hidden" name="hidden" id="value_subject_pe"></td>
              <td><input type="hidden" name="hidden" id="value_subject_health"></td>
              <td><input type="hidden" name="hidden" id="value_subject_music"></td>
              <td><input type="hidden" name="hidden" id="value_subject_arts"></td>
              <td><input type="hidden" name="hidden" id="value_subject_tle"></td>
              <td><input type="hidden" name="hidden" id="value_subject_esp"></td>
            </tr>
            <form>
            <tr>
              <td><h5>Total Items of Written Work: </h5></td>
              <td><input type="text" name="written_total_items" id="written_total_items_fourth" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Written Work: </h5></td>
              <td><input type="text" name="written_total_score" id="written_total_score_fourth" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Items of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_items" id="performance_total_items_fourth" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Performance Task: </h5></td>
              <td><input type="text" name="performance_total_score" id="performance_total_score_fourth" class="form-control"></td>
            </tr>
             <tr>
              <td><h5>Total Items of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_items" id="quarterly_total_items_fourth" class="form-control"></td>
            </tr>
            <tr>
              <td><h5>Total Score of Quarterly Assestment: </h5></td>
              <td><input type="text" name="quarterly_total_score" id="quarterly_total_score_fourth" class="form-control"></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="button" class="btn btn-success form-control" onclick="compute_quarterlyfourthgrade()" data-dismiss="modal">Compute</button></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="reset" class="btn btn-warning form-control">Clear</button></td>
            </tr>
          </table>
          </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div> 
  </div>
-->
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  $conn = new mysqli("localhost","root","", "enrollment_grading_system");
  $grading_period_result = $_POST['grading_period_result'];
  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $math = $_POST['math'];
  $science = $_POST['science'];
  $ap = $_POST['ap'];
  $filipino = $_POST['filipino'];
  $english = $_POST['english'];
  $pe = $_POST['pe'];
  $health = $_POST['health'];
  $music = $_POST['music'];
  $arts = $_POST['arts'];
  $tle = $_POST['tle'];
  $esp = $_POST['esp'];
  $statement = "INSERT INTO grade_subject(id_grades,grading,last_name,first_name,math,science,ap,filipino,english,pe,health,music,arts,tle,esp) VALUES ((SELECT student_id from enrollment_system WHERE last_name = '$last_name' and first_name = '$first_name'), '$grading_period_result','$last_name','$first_name','$math','$science', '$ap', '$filipino','$english','$pe','$health','$music','$arts', '$tle','$esp')";
  if ($conn->query($statement) == TRUE) {
    echo "<script>alert('Add data sucessfully!');</script>";
    echo "<script>window.location.assign('grading_system.php');</script>";
  }else{
    echo "<script>alert('Add data failed!');</script>";
    echo "<script>window.location.assign('grading_system.php');</script>";
  }

}
?>
