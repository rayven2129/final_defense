<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
include("connect.php");
$sql = "SELECT * FROM enrollment_system where student_id ='$_GET[id]'";
$fetch = $conn->query($sql);
$row = $fetch->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
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
          <li><a href="edit_accounts.php"><i class="fas fa-edit"></i> Edit Basic Information</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container background-content content-navigation-grades">
      <form action="" method="POST">
      <table>
        <tr>
          <td><h4>Last Name:</h4></td>
          <td><input type="text" name="last_name" class="form-control"<?php echo "value = '".$row['last_name']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>First Name:</h4></td>
          <td><input type="text" name="first_name" class="form-control"<?php echo "value = '".$row['first_name']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Middle Name:</h4></td>
          <td><input type="text" name="middle_name" class="form-control"<?php echo "value = '".$row['middle_name']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Gender Name:</h4></td>
          <td><input type="text" name="gender" class="form-control"<?php echo "value = '".$row['gender']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Date of Birth:</h4></td>
          <td><input type="text" name="date_of_birth" id="date_of_birth_value" onclick="text_to_date()" class="form-control"<?php echo "value = '".$row['date_of_birth']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Address:</h4></td>
          <td><input type="text" name="address" class="form-control"<?php echo "value = '".$row['address']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Contact Number:</h4></td>
          <td><input type="text" name="contact_number" class="form-control"<?php echo "value = '".$row['contact_number']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Guardian Name:</h4></td>
          <td><input type="text" name="guardian_name" class="form-control"<?php echo "value = '".$row['guardian_name']."'";      ?>></td>
        </tr>
        <tr>
          <td><h4>Guardian Contact Number:</h4></td>
          <td><input type="text" name="guardian_contact_number" class="form-control"<?php echo "value = '".$row['guardian_contact_number']."'";      ?>></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" name="submit" class="form-control btn btn-success">Edit Data</button></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="button" name="button" class="form-control btn btn-primary" onclick="window.close()">Cancel</button></td>
        </tr>
      </table>
      <br>
      <br>
      </form>
    </div>
</div>
</body>
<script type="text/javascript">
  function text_to_date(){
    document.getElementById("date_of_birth_value").type = "date";
  }
</script>
</html>
<?php
if (isset($_POST['submit'])) {
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$gender_type_result = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$complete_address = $_POST['address'];
$contact_number = $_POST['contact_number'];
$guardian_name = $_POST['guardian_name'];
$guardian_contact_number = $_POST['guardian_contact_number'];

  $sql_edit = "UPDATE enrollment_system set last_name = '$last_name', first_name = '$first_name ', middle_name = '$middle_name', gender = '$gender_type_result', date_of_birth = '$date_of_birth ', address = '$complete_address ', contact_number = '$contact_number', guardian_name = '$guardian_name', guardian_contact_number = '$guardian_contact_number ' where student_id ='$_GET[id]'";
  if ($conn->query($sql_edit)) {
    echo "<script>alert('Edit Account Success!');</script>";
    echo "<script>window.location.assign('edit_accounts.php');</script>";
  }else{
    echo "<script>alert('Edit Account Failed!');</script>";
    echo "<script>window.location.assign('edit.php');</script>";
  }

}







?>

