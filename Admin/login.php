<?php include "../databade_cont.php";?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
<style>
.center {
  margin: auto;
  width: 100%;
  border: 3px solid blue;
  padding: 10px;
}
</style>
</head>

<body class="main-conten">

 <!-- forms  -->
 
       <div class="container-fluid content-top-gap card card_border col-md-6">
           <div style="text-align:center;" >
                    <h3>Welcome to Admin Panel</h3>
                </div>
                <div class="center">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Login to Admin</h3>
                </div>
                <form method="post">
                    <div class="card-body">
					 	<div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Username:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" name="u_name" class="form-control input-style" 
                     required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Password:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="password" name="password" class="form-control input-style" required>
                    </div>
                  </div>
                  </form>
				<input type="submit" name="ad_submit" class="btn btn-primary btn-style mt-4 col-md-12">
				   
                </div>
            </div>
            <div style="text-align:center;">
             <h1>The-falcon</h1>
             <p>©2020 All Rights Reserved. The Falcon</p>
         </div>
    </div>
   <?php 
       // include "config.php";
		  session_start();

		  if(isset($_POST[ad_submit]))

		  {
//echo "fgh";
		  $sel="SELECT * FROM `admin_password` WHERE `id`='$_POST[u_name]' AND `password`='$_POST[password]'";

		  $res=$con->query($sel);

		  if ($res->num_rows > 0)

		  {

			  $_SESSION[u_name]=$_POST[u_name];

			  $_SESSION[password]=$_POST[password];

			  echo "<script>location.href='index.php';</script>";

		  }

		  else{

			  	echo "<script>alert('Invalid user name or Password');

    			location.href='login.php';</script>";

		  }

		  }

		  ?>
  <!-- //forms -->

<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="assets/js/bar.js"></script>
<script src="assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
  