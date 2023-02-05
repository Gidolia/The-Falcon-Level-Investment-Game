<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Update Profile</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
  <style>
div.a {
  text-transform: uppercase;
}

div.b {
  text-transform: lowercase;
}

div.c {
  text-transform: capitalize;
}
</style>
</head>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
   <?php include "include/sideber_menu.php";?>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <?php include "include/Header.php";?>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-4 col-md-6 center">
                <div class="cardbody">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>My Profile </h3>
                </div><br/>
    
    <div class="main-body">
        <div style="text-align:laft;" >
                    <h3>Update Profile </h3>
         </div>
         
          <div class="row2 ">
            
            <div class="py-2 mb-4 col-md-12 center">
              
                <div class="cardbody">
                <form action="update_profile_process.php" method="post">
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary c">
                    <input type="text" class="form-control" value="<?php echo $id_detail['name'];?>" disabled>
                     
                    </div>
                  </div>
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email Id :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="email" class="form-control" value="<?php echo $id_detail['email'];?>" disabled>
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile Number :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="number" class="form-control" value="<?php echo $id_detail['mobile'];?>" disabled>
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alt Mobile Mobile  :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="number" class="form-control" name="alt_mobile">
                    </div>
                  </div>
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pancard Numbar :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control" name="pan_card"required>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adhar Card Number :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="number" class="form-control" name="adhr_card" required/>
                    </div>
                    <br/><br/>
                    <div class="custom-file col-sm-6 adhar">
                            <input type="file" class="custom-file-input" id="validatedCustomFile"required>
                            <label class="custom-file-label" for="validatedCustomFile" class="custom-control-input" style="font-size: 10px;" >Choose aadhar card file</label>
                           
                    </div>
                    
                  </div>
                  
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date Of Birth :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="date" class="form-control" name="d_o_b"required>
                    </div>
                  </div>
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control" name="city"required>
                    </div>
                  </div>
                  <hr>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control" name="state"required>
                    </div><br/><br/>
                    
                  </div>
                  <div class="row2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control" name="address" required>
                    </div><br/><br/>
                    
                  </div>
                  <input class="btn btn-primary" type="submit" name="update_profile" value="Submit">
               </form>
                </div>
               
            </div>
            
            
          </div>

        </div>
      </div>
    </div>
   </div>
  </div>
            
     <!-- //forms -->

  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
<?php include "include/footer.php";?>
<!--footer section end-->
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
  