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
    <div class="container background-content content-navigation-grades">
      <form action="" method="POST">
      <table>
        <tr>
          <td class="table-spacing"><h4>Last Name:</h4></td>
          <td><input type="text" name="last_name" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$row['last_name']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>First Name:</h4></td>
          <td><input type="text" name="first_name" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$row['first_name']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Middle Name:</h4></td>
          <td><input type="text" name="middle_name" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$row['middle_name']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Gender Name:</h4></td>
          <td><select id="gender_type_source" class="form-select" onchange="gender_type_function()" required>
              <option value="">Please Select Option</option>
              <option value="MALE">Male</option>
              <option value="FEMALE">Female</option>
             </select>
              <input type="hidden" name="gender" id="gender_type_result" oninput="uppercaseEvent(event)"></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Date of Birth:</h4></td>
          <td><input type="text" name="date_of_birth" id="date_of_birth_value" onclick="text_to_date()" class="form-control"<?php echo "value = '".$row['date_of_birth']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Address:</h4></td>
          <td><input type="text" name="address" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$row['address']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Contact Number:</h4></td>
          <td><input type="text" name="contact_number" class="form-control"<?php echo "value = '".$row['contact_number']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Guardian Name:</h4></td>
          <td><input type="text" name="guardian_name" class="form-control" oninput="uppercaseEvent(event)" <?php echo "value = '".$row['guardian_name']."'";      ?> required></td>
        </tr>
        <tr>
          <td class="table-spacing"><h4>Guardian Contact Number:</h4></td>
          <td><input type="text" name="guardian_contact_number" class="form-control"<?php echo "value = '".$row['guardian_contact_number']."'";      ?> required></td>
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
  function gender_type_function(){
    var x = document.getElementById("gender_type_source").value;
    document.getElementById("gender_type_result").value = x;
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
    echo "<script>alertify.alert('Edit Account Success','The data that you edited is successfully edited!! please click okay. Thank You!',function(){
      window.location.assign('edit_accounts.php');
    });</script>";
  }else{
    echo "<script>alertify.alert('Edit Account Failed!','Edit Account Failed!, maybe you have misconfiguration in editing data? Please Try Again!',function(){
      window.location.assign('edit.php');
    });</script>";
  }

}

?>

