<?php
session_start();
if ($_SESSION['username'] == null) {
	echo "<script>alert('Please Login First');</script>";
	echo "<script>window.location.assign('admin_account.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Portal Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/teachers_admin.css">
  <script src="https://kit.fontawesome.com/f9a76d52b7.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/global_function.js"></script>
  <script type="text/javascript">
    function loadData(){
      var val = "";
      select_grade_level(val);
    }
    function select_grade_level(val){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          document.querySelector("#data_result").innerHTML = this.response;
        }
      }
      xhttp.open("GET", "admin_dashboard_data.php?select="+val,true);
      xhttp.send();
    }

    function changeValue(){
    var x = document.getElementById('section_value').value;
    document.getElementById('section_value_res').value = x;
    var y = document.getElementById('valueLrn').value;
    submitSection(x,y);
    }

    function submitSection(val1,val2){
      var ajx = new XMLHttpRequest();
      var appen = new URLSearchParams();
      alertify.set('notifier','position','top-center');
      appen.append('section_value',val1);
      appen.append('lrn',val2);
      var str = appen.toString();
      ajx.open("GET","updateSection.php?"+str,true);
      ajx.send();
      ajx.onreadystatechange = function(){
        if (ajx.readyState == 4 && ajx.status == 200) {
          if (this.response == 200) {
            alertify.success("Section successfully added in the students!!");
            alertify.message("See Changes in Student Section-Data in Navigation Menu");
          }else if(this.response == 201){
            alertify.error("Section can't be added in the students!!");
          }else{

          }
        }
      }
      
    }

    </script>
</head>
<body onload="loadData()">
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a href="admin_dashboard.php" class="navbar-brand">
            <img src="images/logo_navigation-removebg-preview.png" alt="logo" class="rounded-pill" style="width: 60px;"><span style="font-size: 35px;">|</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
         <span class="navbar-toggler-icon"></span></button>
            <ul class="navbar-nav me-auto navbar-header">
                <li class="navbar-brand">
                    <a class="nav-link text-white" href="admin_dashboard.php">Admin Page</a>
                </li>
            </ul>
         
            <div class="d-flex">
              <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                      <a href="" class="nav-link"><i class="fas fa-user"></i> Student Data</a>
                    </li>
                    <li class="nav-item">
                      <a href="section_data_student.php" class="nav-link"><i class="far fa-calendar"></i> Student Section-Data</a>
                    </li>
                    <li class="nav-item">
                      <a href="admin_teachers_data.php" class="nav-link"><i class="fas fa-chalkboard-teacher"></i> Teachers Data</a>
                    </li>
                    <li class="nav-item">
                      <a href="admin_logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
              </div>
           </div>
        </div>
      </nav>
<div class="container">
    <div class="container">
      <div class="content"><br>
       <form>
      <table class="search_content_parent">
        <tr>
          <td><input type="search" name="search_data" id="search_data" class="form-control" oninput="uppercaseEvent(event)"></td>
          <td><button type="button" name="submit" class="btn btn-primary" onclick="searchData()"><i class="fas fa-search"></i></button></td>
        </tr>
        <tr>
          <td>
          <select class="form-select select-design" name="grade_level" onchange="select_grade_level(this.value)">
            <option value="" selected>Select All Grade Level</option>
            <option value="7">Grade 7</option>
            <option value="8">Grade 8</option>
            <option value="9">Grade 9</option>
            <option value="10">Grade 10</option>
          </select>
        </td>
        </tr>
      </table>
      </form>
    </div>
    <div>
    </div>
    <table class="table table-hover table-striped table-responsive table-bordered table-design box-shadow-design">
      <thead>
        <tr class="table-background">
          <th>LRN Number</th>
          <th>Grade Level</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Contact Number</th>
          <th>Add Section</th>
        </tr>
      </thead>  
      <tbody id="data_result"></tbody>
    </table>
</div>
</div>
</body>
<script type="text/javascript">
  document.getElementById('search_data').onkeyup = function(){
    searchData();
  }
  var data = new XMLHttpRequest();
  var para = new URLSearchParams();
  function searchData(){
    var search_data = document.getElementById("search_data").value;
    para.append("search",search_data);
    data.open("POST","search_res_student.php?"+para.toString());
    data.send();
    data.onreadystatechange = function(){
      if (data.readyState == 4 && data.status == 200) {
        document.getElementById('data_result').innerHTML = this.response;
      }
    }
  }
</script>
</html>
