<?php include("../databade_cont.php");?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Falcon || Change Password</title>

	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Style -->
	<link rel="stylesheet" href="css/style (6).css" type="text/css" media="all" />
	
</head>

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
					<h3>Change Password</h3>
				
				<form action="" method="post">
              <div class="form-input">
               
                <input type="text" class="form-control" name="email" placeholder="Enter Otp">
                <span action="forgot_pass_process.php">
                    	<button type="submit"  name="resend" value="Request Resend OTP" class="btn-forgot btn-primary">Request Resend OTP?</button></span>
                <!--<button type="button" name="resend"value="Request Resend OTP" class="btn-forgot btn-primary">Resend OTP ?</button></span>-->
                 </div>
              <div class="form-input">
               
                <input type="text" class="form-control" name="email" placeholder="New Password">
                 </div>
              <div class="form-input">
               
                <input type="text" class="form-control" name="email" placeholder="Confirm Password">
                   </div>   
                  
             <button type="submit" name="" value="Change Password" class="btn btn-primary theme-button mt-4">Submit</button><br/>
             
            </form>
            
                
                
                <a href="index.html" style="color: white">Already have Account ?</a>
              </div>
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
            <p class="col-lg-8 copy-footer-29" style="text-align: center">© All rights reserved to Falcon. Design by <a href="http://the-falcon.in/">Falcon</a></p>

               
            </div>
        </div>

	
	<!-- /login form -->
</body>

