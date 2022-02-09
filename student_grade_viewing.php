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
$sql_statement = "SELECT * FROM grade_subject_export WHERE id_grades = '$id'";
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
$array_teachers_name = [];
$array_section = [];
$array_school_year = [];
$gen_filipino=null;
$gen_english=null;
$gen_math=null;
$gen_science=null;
$gen_ap=null;
$gen_esp=null;
$gen_tle=null;
$gen_mapeh=null;
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
  $array_teachers_name[] = $fetch['teachers_name'];
  $array_section[] = $fetch['section'];
  $array_school_year[] = $fetch['school_year'];
  $array_mapeh[] = intval(($fetch['music']+$fetch['arts']+$fetch['pe']+$fetch['health'])/4);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Viewing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a href="student_grade_viewing.php" class="navbar-brand">
            <img src="images/logo_navigation-removebg-preview.png" alt="logo" class="rounded-pill" style="width: 60px;"><span style="font-size: 35px;">|</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
         <span class="navbar-toggler-icon"></span></button>
            <ul class="navbar-nav me-auto navbar-header">
                <li class="navbar-brand">
                    <a class="nav-link text-white" href="student_grade_viewing.ph">Student Viewing Page</a>
                </li>
            </ul>
         
            <div class="d-flex">
              <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="navbar-nav me-auto">
                     <li class="nav-item">
                     <a href="student_grade_viewing.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                      <a href="download_grade.php" class="nav-link"><i class="fas fa-download"></i> Download Grade</a>
                    </li>
                    <li class="nav-item">
                      <a href="edit_password.php" class="nav-link"><i class="fas fa-key"></i> Edit Password</a>
                    </li>
                    <li class="nav-item">
                      <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
              </div>
           </div>
        </div>
      </nav>

 <div class="container  student-navigation-grades">
<table class="tg card-design background-content">
    <thead>
      <tr>
        <th class="tg-0lax" colspan="6" rowspan="2">Adviser: <?php if(isset($array_teachers_name[0])){echo $array_teachers_name[0];}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Year: <span style="text-decoration: underline;"><?php if(isset($array_school_year[0])){echo $array_school_year[0];}  ?></span><br>Year and Section: <?php if(isset($array_section[0])){echo $array_section[0];}?></th>
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
        <td class="tg-0pky"><?php if(isset($array_filipino[4])){echo $array_filipino[4]; $gen_filipino = $array_filipino[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">English</td>
        <td class="tg-0pky"><?php if (isset($array_english[0])){echo $array_english[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[1])){echo $array_english[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[2])){echo $array_english[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[3])){echo $array_english[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_english[4])){echo $array_english[4]; $gen_english = $array_english[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Mathematics</td>
        <td class="tg-0pky"><?php if (isset($array_math[0])){echo $array_math[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[1])){echo $array_math[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[2])){echo $array_math[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[3])){echo $array_math[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_math[4])){echo $array_math[4]; $gen_math = $array_math[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Science</td>
        <td class="tg-0pky"><?php if (isset($array_science[0])){echo $array_science[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[1])){echo $array_science[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[2])){echo $array_science[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[3])){echo $array_science[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_science[4])){echo $array_science[4];$gen_science = $array_science[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Aralin Panlipunan</td>
        <td class="tg-0pky"><?php if (isset($array_ap[0])){echo $array_ap[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[1])){echo $array_ap[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[2])){echo $array_ap[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[3])){echo $array_ap[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_ap[4])){echo $array_ap[4]; $gen_ap = $array_ap[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Edukasyon sa Pagpapakatao</td>
       <td class="tg-0pky"><?php if (isset($array_esp[0])){echo $array_esp[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[1])){echo $array_esp[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[2])){echo $array_esp[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[3])){echo $array_esp[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_esp[4])){echo $array_esp[4]; $gen_esp = $array_esp[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Technology and Livelihood Education</td>
        <td class="tg-0pky"><?php if (isset($array_tle[0])){echo $array_tle[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[1])){echo $array_tle[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[2])){echo $array_tle[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[3])){echo $array_tle[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_tle[4])){echo $array_tle[4]; $gen_tle = $array_tle[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">MAPEH</td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[0])){echo $array_mapeh[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[1])){echo $array_mapeh[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[2])){echo $array_mapeh[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[3])){echo $array_mapeh[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_mapeh[4])){echo $array_mapeh[4]; $gen_mapeh = $array_mapeh[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Music</td>
        <td class="tg-0pky"><?php if (isset($array_music[0])){echo $array_music[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[1])){echo $array_music[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[2])){echo $array_music[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[3])){echo $array_music[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_music[4])){echo $array_music[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Arts</td>
        <td class="tg-0pky"><?php if (isset($array_arts[0])){echo $array_arts[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[1])){echo $array_arts[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[2])){echo $array_arts[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[3])){echo $array_arts[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_arts[4])){echo $array_arts[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Physical Education</td>
      <td class="tg-0pky"><?php if (isset($array_pe[0])){echo $array_pe[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[1])){echo $array_pe[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[2])){echo $array_pe[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[3])){echo $array_pe[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_pe[4])){echo $array_pe[4];}?></td>
      </tr>
      <tr>
        <td class="tg-fymr">Health</td>
        <td class="tg-0pky"><?php if (isset($array_health[0])){echo $array_health[0];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[1])){echo $array_health[1];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[2])){echo $array_health[2];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[3])){echo $array_health[3];}?></td>
        <td class="tg-0pky"><?php if (isset($array_health[4])){echo $array_health[4];}?></td>
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
        <td class="tg-0lax">
          <?php
          $genave = intval(($gen_filipino+$gen_english+$gen_math+$gen_science+$gen_ap+$gen_esp+$gen_tle+$gen_mapeh)/8);
          echo $genave;
          ?>

        </td>
      </tr>
    </tbody>
    </table>
    </div>
</div>
</div>
</body>
</html>

