<?php
include("connect.php");
$lrn_request = $_REQUEST['request'];
$sql = "SELECT * FROM enrollment_system WHERE lrn = '$lrn_request'";
$query = $conn->query($sql);
$fetch = $query->fetch_array();
echo json_encode($fetch);
?>



