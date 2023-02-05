<?php include "../databade_cont.php";?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Falcon || Login</title>

	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style-starter.css">

	<!-- Style -->
	<link rel="stylesheet" href="css/style (6).css" type="text/css" media="all" />
<style>
.div {
  border: 8px outset green;
  background-color: lightgreen;    
  text-align: center;
}

</style>	
</head>

<body>
	<!-- login form -->
	<section class="w3l-login">
		<div class="overlay">
			<div class="wrapper">
				<div class="logo">
					<a class="brand-logo" href="../index.php">Falcon
					</a><br><br>
				</div>
				<?php 
				$id_no=($_GET[id_no]/156879)-45;
				$csc="SELECT * FROM `registration_form` WHERE `id_no`='$id_no'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=$dscsdf->fetch_assoc();
				?>
				<div class="div"><br/>
					<h6 style="font-size:25px;">Registration successfully </h6>
						<form action="" method="post" class="signin-form">
						
						   <h6 style="font-size:20px;">Username:-</h6> 
						   <h6 style="font-size:20px;"><?php echo $cdcdc[email];?> </h6><br/>
						</div>
					
					<p class="signup">Sign In falcon <a href="index.html" class="signuplink" style="color:#ffff;">login</a></p>
					</form>
				
				
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
</html>
