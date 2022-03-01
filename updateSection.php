<?php
include("connect.php");
$section_value = $_REQUEST['section_value'];
$lrn = $_REQUEST['lrn'];
$sql = "UPDATE enrollment_system SET section = '$section_value' WHERE lrn = '$lrn'";
if ($conn->query($sql) == true) {
	echo 200;
}else{
	echo 201;
}
$conn->close();
?>