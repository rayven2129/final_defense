function uppercaseEvent(e){
		var ss = e.target.selectionStart;
		var se = e.target.selectionEnd;
		e.target.value = e.target.value.toUpperCase();
		e.target.selectionStart = ss;
   		e.target.selectionEnd = se;
	}
function transmutation_table(x){
        if (x >= 80 && x<=100) {
          return x = 100;
        }else if(x<=79.99 && x >= 78.70){
          return x = 99
        }else if(x<=78.68&& x >= 77.40){
          return x = 98
        }else if(x<=77.39 && x >= 76.10){
          return x = 97
        }else if(x<=76.09 && x >= 74.80){
          return x = 96
        }else if(x<=74.79 && x >= 73.50){
          return x = 95
        }else if(x<=73.49 && x >= 72.20){
          return x = 94
        }else if(x<=72.19 && x >= 70.90){
          return x = 93
        }else if(x<=70.89 && x >= 69.60){
          return x = 92
        }else if(x<=69.59 && x >= 68.30){
          return x = 91
        }else if(x<=68.29 && x >= 67.00){
          return x = 90
        }else if(x<=66.99 && x >= 65.70){
          return x = 89
        }else if(x<=65.69 && x >= 64.40){
          return x = 88
        }else if(x<=64.39 && x >= 63.10){
          return x = 87
        }else if(x<=63.09 && x >= 61.80){
          return x = 86
        }else if(x<=61.79 && x >= 60.50){
          return x = 85
        }else if(x<=60.49 && x >= 59.20){
          return x = 84
        }else if(x<=59.19 && x >= 57.70){
          return x = 83
        }else if(x<=57.89 && x >= 56.60){
          return x = 82
        }else if(x<=56.59 && x >= 55.30){
          return x = 81
        }else if(x<=55.29 && x >= 54.00){
          return x = 80
        }else if(x<=53.99 && x >= 52.70){
          return x = 79
        }else if(x<=52.69 && x >= 51.40){
          return x = 78
        }else if(x<=51.39 && x >= 50.10){
          return x = 77
        }else if(x<=50.09 && x >= 48.80){
          return x = 76
        }else if(x<=48.79 && x >= 47.50){
          return x = 75
        }else if(x<=47.49 && x >= 44.33){
          return x = 74
        }else if(x<=44.32 && x >= 41.16){
          return x = 73
        }else if(x<=41.15 && x >= 37.99){
          return x = 72
        }else if(x<=37.98 && x >= 34.82){
          return x = 71
        }else if(x<=34.81 && x >= 31.65){
          return x = 70
        }else if(x<=31.64 && x >= 28.48){
          return x = 69
        }else if(x<=28.47 && x >= 25.31){
          return x = 68
        }else if(x<=25.30 && x >= 22.14){
          return x = 67
        }else if(x<=22.13 && x >= 18.97){
          return x = 66
        }else if(x<=18.96 && x >= 15.80){
          return x = 65
        }else if(x<=15.79 && x >= 12.63){
          return x = 64
        }else if(x<=12.62 && x >= 9.46){
          return x = 63
        }else if(x<=9.45 && x >= 6.29){
          return x = 62
        }else if(x<=6.28 && x >= 3.12){
          return x = 61
        }else if(x<=3.11 && x >= 0){
          return x = 60
        }else{
          return "Invalid";
        }
 	}
 function compute_per_grading(){
          var first = parseInt(document.getElementById("first_grading").value);
          var second = parseInt(document.getElementById("second_grading").value);
          var third = parseInt(document.getElementById("third_grading").value);
          var fourth = parseInt(document.getElementById("fourth_grading").value);
          var value_per_subject = document.getElementById("value_subject").value;
              if (value_per_subject == "math") {
                 document.getElementById("math").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "science"){
                document.getElementById("science").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "ap"){
                document.getElementById("ap").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "filipino"){
                document.getElementById("filipino").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "english"){
                document.getElementById("english").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "pe"){
                document.getElementById("pe").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "health"){
                document.getElementById("health").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "music"){
                document.getElementById("music").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "arts"){
                document.getElementById("arts").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "tle"){
                document.getElementById("tle").value = (first+second+third+fourth)/4;
              }else if(value_per_subject == "esp"){
                document.getElementById("esp").value = (first+second+third+fourth)/4;
              }else{
                console.log("Invalid");
              }
}

function clear_data(){
   document.getElementById("last_name").value = "";
   document.getElementById("first_name").value = "";
   document.getElementById("math").value = "";
   document.getElementById("science").value = "";
   document.getElementById("filipino").value = "";
   document.getElementById("english").value = "";
   document.getElementById("ap").value = "";
   document.getElementById("pe").value = "";
   document.getElementById("health").value = "";
   document.getElementById("music").value = "";
   document.getElementById("arts").value = "";
   document.getElementById("tle").value = "";
   document.getElementById("esp").value = "";
}
function grading_period_value(){
  var x = document.getElementById('grading_period').value;
  document.getElementById('grading_period_result').value = x;
}