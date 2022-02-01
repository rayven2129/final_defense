<?php
session_start();
$conn = new mysqli("localhost", "root", "", "enrollment_grading_system");
$username = '';
$username = $_SESSION['username'];
	if ($username == '') {
		echo "<script>alert('Please Login First');</script>";
		echo "<script>window.location.assign('index.php');</script>";
	}
#$conn = new mysqli("localhost","id12720654_root", "DOS-sfP1Acyym#4(", "id12720654_enrollment_grading_system");
$sql = "SELECT student_id, grade_level FROM enrollment_system WHERE username = '$username'";
$result = $conn->query($sql);
$res = $result->fetch_array();
$id = $res['student_id'];
$grade_level = $res['grade_level'];
$sql_statement = "SELECT * FROM grade_subject WHERE id_grades = '$id'";
$fetch_res  = $conn->query($sql_statement);
$array_filipino = [];
$array_english = [];
$array_math = [];
$array_science = [];
$array_ap = [];
$array_esp = [];
$array_music = [];
$array_arts = [];
$array_pe = [];
$array_health = [];
$array_tle = [];
$array_mapeh = [];
while ($fetch = $fetch_res ->fetch_array()) {
  $array_filipino[] = $fetch['filipino'];
  $array_english[] = $fetch['english'];
  $array_math[] = $fetch['math'];
  $array_science[] = $fetch['science'];
  $array_ap[] = $fetch['ap'];
  $array_esp[] = $fetch['esp'];
  $array_music[] = $fetch['music'];
  $array_arts[] = $fetch['arts'];
  $array_pe[] = $fetch['pe'];
  $array_health[] = $fetch['health'];
  $array_tle[] = $fetch['tle'];
  $array_mapeh[] = intval(($fetch['music']+$fetch['arts']+$fetch['pe']+$fetch['health'])/4);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Viewing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <a class="navbar-brand" href="student_grade_viewing.php">Student Viewing Page</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="student_grade_viewing.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="download_grade.php"><i class="fas fa-file-export"></i> Download Grade</a></li>
          <li><a href="edit_password.php"><i class="fas fa-key"></i> Edit Password</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container  student-navigation-grades">
<table class="tg card-design background-content">
    <thead>
      <tr>
        <th class="tg-0lax" colspan="6" rowspan="2">Adviser: ___________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Year: <span style="text-decoration: underline;">G<?php  echo $grade_level;?>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>Year and Section:____________</th>
      </tr>
      <tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-uzvj">LEARNING AREA</td>
        <td class="tg-7btt" colspan="4">QUARTER</td>
        <td class="tg-g7sd">Final Grade</td>
      </tr>
      <tr>
        <td class="tg-fymr"></td>
        <td class="tg-fymr">1</td>
        <td class="tg-fymr">2</td>
        <td class="tg-fymr">3</td>
        <td class="tg-fymr">4</td>
        <td class="tg-fymr"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Filipino</td>
        <td class="tg-0pky"><?php if(isset($array_filipino[0])){echo $array_filipino[0];}?></td>
        <td class="tg-0pky"><?php if(isset($array_filipino[1])){echo $array_filipino[1];}?></td>
        <td class="tg-0pky"><?php if(isset($array_filipino[2])){echo $array_filipino[2];}?></td>
        <td class="tg-0pky"><?php if(isset($array_filipino[3])){echo $array_filipino[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">English</td>
        <td class="tg-0pky"><?php if (isset($array_english[0])){echo $array_english[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[1])){echo $array_english[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[2])){echo $array_english[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[3])){echo $array_english[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Mathematics</td>
        <td class="tg-0pky"><?php if (isset($array_math[0])){echo $array_math[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[1])){echo $array_math[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[2])){echo $array_math[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[3])){echo $array_math[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Science</td>
        <td class="tg-0pky"><?php if (isset($array_science[0])){echo $array_science[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[1])){echo $array_science[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[2])){echo $array_science[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[3])){echo $array_science[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Aralin Panlipunan</td>
        <td class="tg-0pky"><?php if (isset($array_ap[0])){echo $array_ap[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[1])){echo $array_ap[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[2])){echo $array_ap[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[3])){echo $array_ap[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Edukasyon sa Pagpapakatao</td>
       <td class="tg-0pky"><?php if (isset($array_esp[0])){echo $array_esp[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[1])){echo $array_esp[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[2])){echo $array_esp[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[3])){echo $array_esp[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Technology and Livelihood Education</td>
        <td class="tg-0pky"><?php if (isset($array_tle[0])){echo $array_tle[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[1])){echo $array_tle[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[2])){echo $array_tle[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[3])){echo $array_tle[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">MAPEH</td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[0])){echo $array_mapeh[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[1])){echo $array_mapeh[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[2])){echo $array_mapeh[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[3])){echo $array_mapeh[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Music</td>
        <td class="tg-0pky"><?php if (isset($array_music[0])){echo $array_music[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[1])){echo $array_music[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[2])){echo $array_music[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[3])){echo $array_music[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Arts</td>
        <td class="tg-0pky"><?php if (isset($array_arts[0])){echo $array_arts[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[1])){echo $array_arts[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[2])){echo $array_arts[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[3])){echo $array_arts[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Physical Education</td>
      <td class="tg-0pky"><?php if (isset($array_pe[0])){echo $array_pe[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[1])){echo $array_pe[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[2])){echo $array_pe[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[3])){echo $array_pe[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr">Health</td>
        <td class="tg-0pky"><?php if (isset($array_health[0])){echo $array_health[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[1])){echo $array_health[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[2])){echo $array_health[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[3])){echo $array_health[3];}?></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr" style="height: 30px;"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-fymr" style="height: 30px;"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
      </tr>
      <tr>
        <td class="tg-zv4m"></td>
        <td class="tg-73oq" colspan="4"><span style="font-weight:bold">GENERAL AVERAGE</span></td>
        <td class="tg-0lax"></td>
      </tr>
    </tbody>
    </table>
    </div>
</div>
</div>
</body>
</html>

