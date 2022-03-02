<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
include("connect.php");
$sql = "SELECT * FROM grade_subject WHERE id_subject = '$_GET[id]'";
$fetch = $conn->query($sql);
$data = $fetch->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
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
    <div class="content background-content content-navigation-grades">
      
      <table table-design>
        <form action="" method="POST">
        <tr>
          <th></th>
          <th><h3>Add Grades</h3></th>
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
            </select>
            <input type="hidden" name="grading_period_result" id="grading_period_result">
          </td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Last Name: </p></td>
          <td><input type="text" name="last_name" id="last_name" class="form-control" <?php echo "value='".$data['last_name']."'";?> oninput="uppercaseEvent(event)"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>First Name: </p></td>
          <td><input type="text" name="first_name" id="first_name" class="form-control" <?php echo "value='".$data['first_name']."'";?> oninput="uppercaseEvent(event)"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Math Grade: </p></td>
          <td><input type="text" name="math" id="math" class="form-control" <?php echo "value='".$data['math']."'";?> data-toggle="modal" data-target="#subject" onclick="mathfunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Science Grade: </p></td>
          <td><input type="text" name="science" id="science" class="form-control" <?php echo "value='".$data['science']."'";?> data-toggle="modal" data-target="#subject" onclick="sciencefunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Aralin Panlipunan Grade: </p></td>
          <td><input type="text" name="ap" id="ap" class="form-control" <?php echo "value='".$data['ap']."'";?> data-toggle="modal" data-target="#subject" onclick="apfunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Filipino Grade: </p></td>
          <td><input type="text" name="filipino" id="filipino" class="form-control" <?php echo "value='".$data['filipino']."'";?> data-toggle="modal" data-target="#subject" onclick="filipinofunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>English  Grade: </p></td>
          <td><input type="text" name="english" id="english" class="form-control" <?php echo "value='".$data['english']."'";?> data-toggle="modal" data-target="#subject" onclick="englishfunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Physical Education Grade: </p></td>
          <td><input type="text" name="pe" id="pe" class="form-control" <?php echo "value='".$data['pe']."'";?> data-toggle="modal" data-target="#subject" onclick="pefunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Health Grade: </p></td>
          <td><input type="text" name="health" id="health" class="form-control" <?php echo "value='".$data['health']."'";?> data-toggle="modal" data-target="#subject" onclick="healthfunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Music  Grade: </p></td>
          <td><input type="text" name="music" id="music" class="form-control" <?php echo "value='".$data['music']."'";?> data-toggle="modal" data-target="#subject" onclick="musicfunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>Arts  Grade: </p></td>
          <td><input type="text" name="arts" id="arts" class="form-control" <?php echo "value='".$data['arts']."'";?> data-toggle="modal" data-target="#subject" onclick="artsfunction()"></td>
        </tr>
        <tr>
          <td class="table-spacing"><p>TLE Grade: </p></td>
          <td><input type="text" name="tle" id="tle" class="form-control" <?php echo "value='".$data['tle']."'";?> data-toggle="modal" data-target="#subject" onclick="tlefunction()"></td>
        </tr>
         <tr>
          <td class="table-spacing"><p>ESP Grade: </p></td>
          <td><input type="text" name="esp" id="esp" class="form-control" <?php echo "value='".$data['esp']."'";?> data-toggle="modal" data-target="#subject" onclick="espfunction()"></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" name="submit" class="btn btn-success form-control">Submit Data</button></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="button" class="btn btn-warning form-control" onclick="clear_data()">Clear</button></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="button" class="btn btn-danger form-control" onclick="window.close()">Cancel</button></td>
        </tr>
        </form>
      </table>
      
    </div>
</div>
</div>
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  #$conn = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");
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
  $statement = "UPDATE grade_subject SET grading = '$grading_period_result', last_name = '$last_name', first_name = '$first_name', math = '$math', science = '$science', ap = '$ap', filipino = '$filipino', english = '$english', pe = '$pe', health = '$health', music = '$music', arts = '$arts', tle = '$tle', esp = '$esp' WHERE id_subject = '$_GET[id]'";
  if ($conn->query($statement) == TRUE) {
    echo "<script>alertify.alert('Edit data Sucessfully','The Data that you edited is successfully executed!. Thank you!',function(){
      window.location.assign('grading_system.php');
    });</script>";
  }else{
    echo "<script>alertify.alert('Add Data Failed!','The Data that you edited is unsuccessfully executed, maybe you have misconfiguration in editing data?, Please try Again!');</script>"; 
  }

}
?>
