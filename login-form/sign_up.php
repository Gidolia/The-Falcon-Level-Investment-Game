<?php include "../databade_cont.php";?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Falcon || Sign Up</title>

	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Style -->
	<link rel="stylesheet" href="css/style (6).css" type="text/css" media="all" />
	
</head>
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
<body>
	<!-- login form -->
	<section class="w3l-login">
		<div class="overlay">
			<div class="wrapper">
				<div class="logo">
					<a class="brand-logo" href="../index.php">Falcon
					</a>
				</div>
				<div class="form-section">
					<h3>Sign Up</h3>
					<h6>Join Us</h6>
					<form action="sign_up_process.php" name="sigupForm" method="POST" onsubmit="return validateForm()" class="signin-form">
						<div class="form-input">
						    
							
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required/>
						</div>
						
						 <div class="form-input">
                
                <input type="text" class="form-control" onKeyUp="showHint_mob(this.value)" name="m_number" placeholder="Phone Number" required/>
                <span id="text_mob" style="color: red"></span>
                <input type="hidden" name="mobile_ck" value="Please Check Your Mobile Number" id="txtHint_mob" readonly />
              </div>
					   <div class="form-input">
               
                <input type="email" class="form-control" onKeyUp="showHint_email(this.value)" name="email" placeholder="Email" required/>
                <span id="text_emailt" style="color: red"></span>
                 <span id="text_email" style="color: red"></span>
                <input type="hidden" name="email_ck" value="This Email id is Already Register" id="txtHint_email" readonly />
              </div>
              <div class="form-input">
              
                <input type="password" class="form-control" name="password" placeholder="Password" required/>
              </div>
              <div class="form-input">
               
                <input type="password" placeholder="Confirm Password" class="form-control" name="c_password" required/>
                <span id="cp_msg" style="color: red"></span>
              </div>
              <div class="form-input">
            <?php
                $id_no=$_GET[id_no];
               $rr="SELECT * FROM `registration_form` WHERE `id_no`='$id_no'";
                 //echo $rr;
                 $r=$con->query($rr);
                $s=$r->fetch_assoc()
            ?>
                
                <input type="text" class="form-control" name="refarence" placeholder="Referrence Id" value="<?php echo $s['shere_ref_code'];?>">
              </div>
              <button type="submit" value="Continue" class="btn btn-primary theme-button mt-4" name="Reg">sign up</button>
						
					<!--	<button type="submit" name="Reg" value="Continue" class="btn btn-block btn-primary">-->
              <span  class="btn btn-block"><span><a tabindex="10" href="index.html" style="color:white">
                Sign In falcon 
              </a></span></span>
				</div>
			</div>
		</div>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>

	</section>
<!-- copyright -->
    <section class="w3l-copyright" style="">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29" style="text-align: center">© All rights reserved to Falcon. Design by <a href="http://the-falcon.in/">Falcon</a></p>

               
            </div>
        </div>

	
	<!-- /login form -->
</body>

