<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <script type="text/javascript">
    alertify.set('notifier','position','top-center');
  </script>
</head>
<body>

</body>
</html>
<?php
include("connect.php");
  session_start();
  $section = $_SESSION['section'];
  $grading_period_result = $_POST['grading_period_result'];
  $last_name = $_POST['last_name'];
  $grade_level =$_POST['grade_level'];
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
  $lrn = $_POST['lrn'];
 

	  $statement = "INSERT INTO grade_subject(id_grades,grade_level,grading,last_name,first_name,math,science,ap,filipino,english,pe,health,music,arts,tle,esp,section) VALUES ((SELECT student_id from enrollment_system WHERE lrn = '$lrn'),'$grade_level', '$grading_period_result','$last_name','$first_name','$math','$science', '$ap', '$filipino','$english','$pe','$health','$music','$arts', '$tle','$esp','$section')";
	  if ($conn->query($statement) == TRUE) {
	    echo "<script>alertify.success('Add data sucessfully!');</script>";
	    echo "<script>setTimeout(function(){
          window.location.assign('teacher_admin.php');
      },2000)</script>";
	  }else{
	    echo "<script>alertify.alert('Add data failed!');</script>";
	    echo "<script>setTimeout(function(){
          window.location.assign('teacher_admin.php');
      },2000)</script>";
	  }



  

?>