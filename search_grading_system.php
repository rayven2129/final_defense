<?php
session_start();
if ($_SESSION['username'] == null) {
  echo "<script>alert('Please Login First');</script>";
  echo "<script>window.location.assign('index.php');</script>";
}
include("connect.php");
$search = $_REQUEST['search_data'];
$grade_level = $_REQUEST['grade_level'];
$section = $_REQUEST['section'];
$sql = "SELECT * FROM grade_subject WHERE (grading = '$search' OR last_name = '$search' OR first_name = '$search') AND grade_level = '$grade_level' AND section = '$section '";
$fetch = $conn->query($sql);
while ($row = $fetch->fetch_array()) {
          $mapeh = intval(($row['music']+$row['arts']+$row['pe']+$row['health'])/4);
          echo "<tr class='table-background-content'>";
          echo "<td>".$row['grading']."</td>";
          echo "<td>".$row['last_name']."</td>";
          echo "<td>".$row['first_name']."</td>";
          echo "<td>".$row['math']."</td>";
          echo "<td>".$row['science']."</td>";
          echo "<td>".$row['ap' ]."</td>";
          echo "<td>".$row['filipino']."</td>";
          echo "<td>".$row['english']."</td>";
          echo "<td>".$row['tle']."</td>";
          echo "<td>".$row['esp']."</td>";
          echo "<td>".$row['music']."</td>";
          echo "<td>".$row['arts']."</td>";
          echo "<td>".$row['pe']."</td>";
          echo "<td>".$row['health']."</td>";
          echo "<td>".$mapeh."</td>";
          echo "<td><a href='edit_grade.php?id=".$row['id_subject']."' target='_blank'>Edit Grades</td>";
          echo "<td><a href='share_to_student.php?id=".$row['id_subject']."' target='_blank' class='share-design'><i class='fas fa-share-alt'></i>Send</td>";
          echo "</tr>";
          echo "</tr>";
          }
?>
