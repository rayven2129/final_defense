<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Enrollment Form</title>
  <link rel="icon" href="images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script type="text/javascript" src="js/global_function.js"></script>
  
</head>
<body>
  <!-- multistep form -->
<form id="msform" action="insert_enrollment.php" method="POST">
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
    <span class="fs-subtitle">Student Type</span><select id="student_type_value_source" onchange="student_type_function()">
            <option>Please Select Option</option>
            <option value="OLD">Old</option>
            <option value="NEW">New</option>
            <option value="TRANSFEREE">Transferee</option>
    </select>
    <input type="hidden" name="student_type" id="student_type_value">
    
    <input type="text" name="last_name" placeholder="Last Name" oninput="uppercaseEvent(event)" />
    <input type="text" name="first_name" placeholder="First Name" oninput="uppercaseEvent(event)" />
    <input type="text" name="middle_name" placeholder="Middle Name" oninput="uppercaseEvent(event)" />
    <span class="fs-subtitle">    Gender: </span><select id="gender_type_source" onchange="gender_type_function()">
              <option>Please Select Option</option>
              <option value="MALE">Male</option>
              <option value="FEMALE">Female</option>
    </select>
    <input type="hidden" name="gender_type_result" id="gender_type_result" oninput="uppercaseEvent(event)">
    <input type="text" name="age" placeholder="Age" />
    <label for="date_of_birth" class="fs-subtitle">Date Of Birth</label>
    <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth"/>
    <input type="text" name="place_of_birth" placeholder="Place of Birth" oninput="uppercaseEvent(event)">
    <input type="button" name="previous" class="cancel action-button" value="Cancel" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
   <fieldset>
    <h2 class="fs-title">Additional Personal Information</h2>
    <input type="text" name="house_street" placeholder="House Number/Street Number" oninput="uppercaseEvent(event)" />
    <input type="text" name="barangay" placeholder="Barangay" oninput="uppercaseEvent(event)" />
    <input type="text" name="municipal" placeholder="Municipal/City" oninput="uppercaseEvent(event)" />
    <input type="text" name="province" placeholder="Province" oninput="uppercaseEvent(event)" />
    <input type="text" name="zip_code" placeholder="Zip Code" />
    <input type="text" name="contact_number" placeholder="Contact Number">
    <input type="email" name="email_address" placeholder="Email Address">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">School Information</h2>
    <h3 class="fs-subtitle">Your information on school</h3>
    <input type="text" name="lrn" placeholder="Learners References Number" />
    <input type="text" name="grade_level" placeholder="Grade Level To be Enrolled" />
    <input type="text" name="guardian_name" placeholder="Guardian's Name" oninput="uppercaseEvent(event)" />
    <input type="text" name="guardian_contact_number" placeholder="Guardian's Contact  Number" oninput="uppercaseEvent(event)" />
    <input type="text" name="guardian_relation_to_student" placeholder="Guardian's Relation to Student" oninput="uppercaseEvent(event)" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never know it</h3>
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" id="password_login" placeholder="Password" required />
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
  	window.location.assign("index.php");
  }
</script>
</html>
