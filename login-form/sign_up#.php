<?php include "../databade_cont.php";?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Create Account falcon</title>
    <script> 
    function validateForm() {
    var mobile_no = document.forms["sigupForm"]["mobile_ck"].value;
	var email_id = document.forms["sigupForm"]["email_ck"].value;
	
	if(email_id=="This Email id is Already Register")
	{
	    document.getElementById("text_email").innerHTML = " This Email id is Already Register ";
    return false;
	}

	if(mobile_no=="This Mobile Number is Already Register")
	{
	    document.getElementById("text_mob").innerHTML = " This Mobile Number is Already Register ";
    return false;
	}
	if(mobile_no=="Please Check Your Mobile Number")
	{
	    document.getElementById("text_mob").innerHTML = " Please Check Your Mobile Number ";
    return false;
	}

}
		
function showHint_email(str) {
 // document.getElementById("text_emailt").innerHTML = "bggc";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint_email").value = this.responseText;
        if(this.responseText != "Correct")
    		{
    			document.getElementById("text_email").innerHTML = this.responseText;
    		}
		else{ document.getElementById("text_email").innerHTML = "";
		}
        
      }
    };
    xmlhttp.open("GET", "get_email_check.php?e=" + str, true);
    xmlhttp.send();
  
}

function showHint_mob(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint_mob").value = this.responseText;
        if(this.responseText != "Correct")
				{
					document.getElementById("text_mob").innerHTML = this.responseText;
				}
		else{ document.getElementById("text_mob").innerHTML = "";
		}
        
      }
    };
    xmlhttp.open("GET", "get_mob_check.php?q=" + str, true);
    xmlhttp.send();
  
}
    </script>
  </head>
  <body>
   <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Create Account</h3>
              
            </div>
            <form action="sign_up_process.php" name="sigupForm" method="POST" onsubmit="return validateForm()">
              <div class="form-group first">
                <label for="first_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" required/>
              </div>
              <div class="form-group first">
                <label for="password">PH Number:</label>
                <input type="number" class="form-control" onKeyUp="showHint_mob(this.value)" name="m_number" required/>
                <span id="text_mob" style="color: red"></span>
                <input type="hidden" name="mobile_ck" value="Please Check Your Mobile Number" id="txtHint_mob" readonly />
              </div>
              <div class="form-group first">
                <label for="password">Email id:</label>
                <input type="email" class="form-control" onKeyUp="showHint_email(this.value)" name="email" required/>
                <span id="text_emailt" style="color: red"></span>
                 <span id="text_email" style="color: red"></span>
                <input type="hidden" name="email_ck" value="This Email id is Already Register" id="txtHint_email" readonly />
              </div>
              <div class="form-group first">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required/>
              </div>
              <div class="form-group first">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" name="c_password" required/>
                <span id="cp_msg" style="color: red"></span>
              </div>
              <div class="form-group first">
                <label for="reference_Code">Reference Code:</label>
                <input type="text" class="form-control" name="refarence">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
               <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" required/>
                  <div class="control__indicator"></div>
                </label>
                 
              </div>
              <btn type="submit" name="Reg" value="Continue" class="btn btn-block btn-primary">
              <span  class="btn btn-block"><span><a tabindex="10" href="index.html">
                Sign In falcon 
              </a></span></span>

              <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
           
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
