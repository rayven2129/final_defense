<?php
include("connect.php");
$search_data = $_REQUEST['search_data'];
$grade_level = $_REQUEST['grade_level'];
$section = $_REQUEST['section'];
$sql = "SELECT * FROM enrollment_system WHERE (lrn = '$search_data' OR last_name = '$search_data' OR first_name = '$search_data' OR middle_name = '$search_data') AND grade_level = '$grade_level' AND section = '$section '";
$fetch = $conn->query($sql);
  while ($row = $fetch->fetch_array()) {
          echo "<tr class='table-background-content'>";
          echo "<td><form action=''><input type='button' class='link-design btn' data-bs-toggle='modal' data-bs-target='#add_grade' onclick='value_field(this.value)' value='".$row['lrn']."'></button></td>";
          echo "<td>".$row['grade_level']."<input type='hidden' id='grade_level' value='".$row['grade_level']."'></form></td>";
          echo "<td>".$row['last_name']." <input type='hidden' id='' value='".$row['last_name']."'></td>";
          echo "<td>".$row['first_name']."<input type='hidden' id='' value='".$row['first_name']."'></td>";
          echo "<td>".$row['middle_name']."</td>";
          echo "<td>".$row['gender']."</td>";
          echo "<td>".$row['age']."</td>";
          echo "<td>".$row['contact_number']."</td>";
          echo "</tr>";
          }
?>