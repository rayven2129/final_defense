<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Enrollment Form</title>
  <link rel="icon" href="images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/rayven2129/cdnrvd/form_style.css">
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
    
    <input type="text" name="last_name" placeholder="Last Name" oninput="uppercaseEvent(event)"/>
    <input type="text" name="first_name" placeholder="First Name" oninput="uppercaseEvent(event)" />
    <input type="text" name="middle_name" placeholder="Middle Name" oninput="uppercaseEvent(event)" />
    <span class="fs-subtitle">    Gender: </span><select id="gender_type_source" onchange="gender_type_function()">
              <option>Please Select Option</option>
              <option value="MALE">Male</option>
              <option value="FEMALE">Female</option>
    </select>
    <input type="hidden" name="gender_type_result" id="gender_type_result" oninput="uppercaseEvent(event)">
    <input type="text" name="age" placeholder="Age" id="age_value" readonly/>
    <label for="date_of_birth" class="fs-subtitle" id="date_value">Date Of Birth</label>
    <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" onchange="age_find()"/>
    <input type="text" name="place_of_birth" placeholder="Place of Birth" oninput="uppercaseEvent(event)">
    <input type="button" name="previous" class="cancel action-button" value="Cancel" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
   <fieldset>
    <h2 class="fs-title">Additional Personal Information</h2>
    <input type="text" name="house_number" placeholder="House Number" oninput="uppercaseEvent(event)" />
    <input type="text" name="street_number" placeholder="Street Number" oninput="uppercaseEvent(event)" />
    <input type="text" name="villages" placeholder="Sitio or Villages" oninput="uppercaseEvent(event)" />
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
    <label for="grade_level_option" class="fs-subtitle">Grade Level</label>
    <select id="grade_level_option" onchange="grade_level_change_function()">
      <option value="Invalid">Please Select Option</option>
      <option value="7">Grade 7</option>
      <option value="8">Grade 8</option>
      <option value="9">Grade 9</option>
      <option value="10">Grade 10</option>
    </select>
    <input type="hidden" name="grade_level" id="grade_level_result">
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
        <td><span class="fs-subtitle">Show Password &nbsp;&nbsp;</span></td>
        <td><input type="checkbox" onchange="checkPassword()"></td>
      </tr>
    </table>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="action-button" value="Submit" />
  </fieldset>
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdn.jsdelivr.net/gh/rayven2129/cdnrvd/form.js"></script>
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
  function grade_level_change_function(){
    var x = document.getElementById("grade_level_option").value;
    document.getElementById("grade_level_result").value = x;
  }
  function age_find(){
    var mydate = document.getElementById('date_of_birth').value;
    var now =new Date();                            //getting current date
    var currentY= now.getFullYear();                //extracting year from the date
    var currentM= now.getMonth();                   //extracting month from the date
      
    var dobget =document.getElementById("date_of_birth").value; //getting user input
    var dob= new Date(dobget);                             //formatting input as date
    var prevY= dob.getFullYear();                          //extracting year from input date
    var prevM= dob.getMonth();                             //extracting month from input date
      
    var ageY =currentY - prevY;
    var ageM =Math.abs(currentM- prevM);          //converting any negative value to positive
      
    var res = ageY;
    document.getElementById("age_value").value = res;
  }
</script>
</html>
