<?php
$conn = new mysqli("localhost","root","", "enrollment_grading_system");
  #$conn = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");
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
 

	  $statement = "INSERT INTO grade_subject(id_grades,grade_level,grading,last_name,first_name,math,science,ap,filipino,english,pe,health,music,arts,tle,esp) VALUES ((SELECT student_id from enrollment_system WHERE lrn = '$lrn'),'$grade_level', '$grading_period_result','$last_name','$first_name','$math','$science', '$ap', '$filipino','$english','$pe','$health','$music','$arts', '$tle','$esp')";
	  if ($conn->query($statement) == TRUE) {
	    echo "<script>alert('Add data sucessfully!');</script>";
	    echo "<script>window.location.assign('teacher_admin.php');</script>";
	  }else{
	    echo "<script>alert('Add data failed!');</script>";
	    echo "<script>window.location.assign('teacher_admin.php');</script>";
	  }



  

?>