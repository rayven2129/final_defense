<?php
include("connect.php");
$new_username = $_REQUEST['new_username'];
$old_password = $_REQUEST['old_password'];
$new_password = $_REQUEST['new_password'];
$stud_id = $_REQUEST['stud_id'];
$password_user = $_REQUEST['password_user'];
        if ($old_password != $password_user) {
          echo 202;
        }else{
          $change_password = "UPDATE enrollment_system SET username = '$new_username', password_user = '$new_password'  WHERE student_id = '$stud_id'";
            if ($conn->query($change_password) == TRUE) {
                echo 200;
            }else{
                echo 201;
                
            }
        }
?>