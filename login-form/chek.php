<?php include("../../../database_connect.php");?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>SIGN IN || NETWORKER</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Sign up" />
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--//Style-CSS -->
</head>

<body>
	<!-- /login-section -->
	<section class="w3l-login-6">
		<div class="login-hny">
			<div class="form-content">
				<div class="form-right">
					<div class="overlay">
						<div class="grid-info-form">
							
							<h3>SIGN IN</h3>
							<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est natus facere aperiam!
								</p>
							Already have Account ? <a href="index.php" class="read-more-1 btn">Signin</a>
						</div>
					
					</div>
				</div>
				<div class="form-left">
					<div class="middle">
						<h4>Forget Password</h4>
						<p></p>
					</div>
					<form method="post" class="signin-form">
							<div class="form-input">
								<label>User ID</label>
								<input type="text" name="id" placeholder="" required/>
								
							</div>
							<input type="submit" class="btn" name="forget_pass_submit" value="Log In">
							
					</form>
					<div class="copy-right text-center">
						<p>© 2020 Success youth network. All rights reserved | Design by
								<a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
					 </div>
				</div>
				
			</div>
			<?php 
		  session_start();
			
		  if(isset($_POST['forget_pass_submit']))
		  {
		  $sel="SELECT * FROM `employee` WHERE `e_id`='$_POST[id]'";
		  $res=$con->query($sel);
		  if ($res->num_rows > 0)
		  {
			  $dec=mysqli_fetch_assoc($res);
			  $dd='Your pass  = '.$dec['password'];
        $dd = str_replace(' ', '%20', $dd);
		$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=NGACTY&smstype=TRANS&numbers='.$dec[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$text = str_replace('%20', ' ', $dd);
		$sms_query="INSERT INTO `software_handling_software` (`shs_id`, `e_id`, `sms`, `url_current_page`, `respond`, `date`, `time`) VALUES (NULL, '$_POST[id]', '$text', '$url', '$response', '$date', '$time');";
		mysqli_query($con, $sms_query);
			  echo "<script>alert('Password Sended to your register Mobile number');
    			location.href='sign_in.php';</script>";
		  }
		  else{
			  	echo "<script>alert('Invalid Login ID Please checkit again');
    			location.href='forget_password.php';</script>";
		  }
		  }
		  ?>
		</div>
	</section>
	<!-- //login-section -->
</body>

</html>