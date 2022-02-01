<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
#$conn = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$sql_delete_user = "DELETE FROM enrollment_system WHERE student_id = '$_GET[id]'";
$sql_delete_grades = "DELETE FROM grade_subject WHERE id_grades = '$_GET[id]'";
$sql_delete_grades_id = "DELETE FROM grading_system WHERE student_id = '$_GET[id]'";
if ($conn->query($sql_delete_grades) == TRUE) {
	if ($conn->query($sql_delete_grades_id) == TRUE) {
		if ($conn->query($sql_delete_user) == TRUE) {
			 echo "<script>alert('Delete Account Success!');</script>";
    		 echo "<script>window.location.assign('edit_accounts.php');</script>";
		}
		echo "<script>alert('Delete Account Failed!');</script>";
    	echo "<script>window.location.assign('edit_accounts.php');</script>";
	}
	echo "<script>alert('Delete Account Failed!');</script>";
    echo "<script>window.location.assign('edit_accounts.php');</script>";
}




?>