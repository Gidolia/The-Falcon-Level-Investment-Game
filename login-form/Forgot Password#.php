<?php include("../databade_cont.php");?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Forgot Password</title>
    
   
  </head>
  <body>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 contents" >
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
         </div>
        <div class="col-md-6">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 class="">Forgot Password</h3>
            </div>
            <form action="forgot_pass_process.php" method="post">
              <div class="form-group first">
                <label for="" >Email Id:</label>
                <input type="email" class="form-control" name="email" required>
                 </div>
                <span><a href="change_password.php">
                    
            <input type="submit" name="fgtp" value="Forgot Password" class="btn btn-block btn-primary"></span></a><br/>
              
            </form>
            <div class="d-flex mb-5 align-items-center">
                
                <span>Already have Account ?
                <a href="index.html"><input type="submit" value="Log in" class="btn-forgot btn-primary"></span> </a>
              </div>
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