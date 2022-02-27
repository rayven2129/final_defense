<?php
include("connect.php");
$select_grade_level = intval($_REQUEST['select']);
$sql = "SELECT * FROM enrollment_system WHERE grade_level = '$select_grade_level'";
$sql_add_teacher = "SELECT * FROM teachers_account WHERE t_grade_level = '$select_grade_level'";
$fetch_teachers_section = $conn->query($sql_add_teacher);
$fetch = $conn->query($sql);
$emarray = array();
while($res = $fetch_teachers_section->fetch_assoc()){
$emarray[] = $res['t_section'];  
}
$json = json_encode($emarray);
$json_d = json_decode($json,true);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.png">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="css/admin.css">
	  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
	  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
	  <script type="text/javascript" src="js/global_function.js"></script>
</head>
<body>
	<?php
      	while ($row = $fetch->fetch_array()) {
      			echo "<tr class='table-background-content'>";
      			echo "<td>".$row['lrn']."</td>";
          		echo "<td>".$row['grade_level']."</td>";
      			echo "<td>".$row['last_name']."</td>";
      			echo "<td>".$row['first_name']."</td>";
      			echo "<td>".$row['middle_name']."</td>";
      			echo "<td>".$row['gender']."</td>";
          		echo "<td>".$row['age']."</td>";
      			echo "<td>".$row['contact_number']."</td>";
      			echo "<td>";
          		echo "<select>";
          		echo "<option select>Please Select Option</option>";
          			foreach ($json_d as $key => $value) {
				           echo "<option>".$value."</option>";
          					}
          		echo "</select>";
          		echo "</td>";
      			echo "</tr>";
      			}
      	?>

</body>
</html>


     
      	
    