<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Teachers Signup Form</title>
  <link rel="icon" href="images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script type="text/javascript" src="js/global_function.js"></script>
  
</head>
<body>
  <!-- multistep form -->
<form id="msform" action="teachers_admin_insert_account.php" method="POST">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Personal Information</li>
    <li>Additional Personal Information</li>
    <li>School Information</li>
    <li>Account Setup</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Personal Information</h2>
    <input type="text" name="last_name" id="last_name" placeholder="Last Name" oninput="uppercaseEvent(event)" />
    <input type="text" name="first_name" id="first_name" placeholder="First Name" oninput="uppercaseEvent(event)" />
    <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name" oninput="uppercaseEvent(event)" />
    <span class="fs-subtitle">    Gender: </span><select id="gender_type_source" onchange="gender_type_function()">
              <option>Please Select Option</option>
              <option value="MALE">Male</option>
              <option value="FEMALE">Female</option>
    </select>
    <input type="hidden" name="gender_type_result" id="gender_type_result" oninput="uppercaseEvent(event)">
    <input type="button" name="previous" class="cancel action-button" value="Cancel" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
   <fieldset>
    <h2 class="fs-title">Additional Personal Information</h2>
    <input type="text" name="contact_number" placeholder="Contact Number">
    <input type="email" name="email_address" placeholder="Email Address">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">School Information</h2>
    <h3 class="fs-subtitle">Your information on school</h3>
    <input type="text" name="grade_level" id="grade_level_value" placeholder="Grade Level to be Advised" />
    <input type="text" name="section" id="section_value"  readonly />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never know it</h3>
    <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" id="password_login" placeholder="Password" />
    <table>
      <tr>
        <td><span class="fs-subtitle">Show Password</span></td>
        <td><input type="checkbox" onchange="checkPassword()"></td>
      </tr>
    </table>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="action-button" value="Submit" />
  </fieldset>
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="js/form.js"></script>
</body>
<script type="text/javascript">
  function checkPassword(){
    var x = document.getElementById("password_login");
      if (x.type == "password") {
        x.type = "text";
      }else{
        x.type = "password";
      }
  }
  function student_type_function(){
    var x = document.getElementById("student_type_value_source").value;
    document.getElementById("student_type_value").value = x;
  }
  function gender_type_function(){
    var x = document.getElementById("gender_type_source").value;
    document.getElementById("gender_type_result").value = x;
  }
  document.querySelector(".cancel").onclick = function(){
  	window.location.assign("teachers_index.php");
  }
  document.querySelector("#grade_level_value").onkeyup = function(){
    var lname = document.getElementById("last_name").value;
    var fname = document.getElementById("first_name").value;
    var mname = document.getElementById("middle_name").value;
    var grade_level = document.getElementById("grade_level_value").value;
    document.getElementById("section_value").value = "G"+grade_level+" - "+fname.charAt(0)+mname.charAt(0)+lname.charAt(0)
  }
</script>
</html>
