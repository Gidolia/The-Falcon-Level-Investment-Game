<?php include "config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Customer List</title>

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


.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 30px;
  border: 2px solid green; 
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
        <li class="breadcrumb-item active" aria-current="page">Customer List</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-4 col-md-12">
                <div class="cardbody">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Customer List </h3>
                </div><br/>
    
    <div class="main-body">
        <?php 
                            
                                $rr="SELECT * FROM `registration_form` WHERE `id_no`='$_GET[id_no]'";
                                $r=$con->query($rr);
                              
                                $s=mysqli_fetch_assoc($r); ?> 
          <div class="row ">
            <div class="col-md-5 ">
              <div class="card">
                <div class="cardbody">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="assets/images/profileimg.jpg"  class="rounded-circle" width="120">
                    <div class="mt-3">
                      <h4 class="c"> <?php echo $s["name"]; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $s["email"]; ?></p>
                      <p class="text-muted font-size-sm"></p>
                      <button class="btn btn-primary">Edit Profile</button>
                      <button class="btn btn-outline-primary">Message to Customer </button>
                    </div>
                  </div>
                </div>
            <div class="cardbody">
                <a href="ch_pass_record.php?id_no=<?php echo $s['id_no'];?>">
                <button type="button" class="btn btn-danger center">Change Password Record</button>
                </a>
                  <br>
            <h6 class="c" style="text-align:center;" >Aadhar,Pan,Bank Details</h6>
                  
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Aadhar card :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     The Customer KYC has not been approved
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Pancard :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     The Customer KYC has not been approved
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bank Details :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      The Customer KYC has not been approved
                    </div>
                  </div>
                 </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between ">
                    <h6 class="mb-0" class="feather feather-globe mr-2 icon-inline">Wallet Balance</h6>
                    <span class="text-secondary"><?php echo $s["wallet_balance"]; ?></span>
                  </li>
                </ul>
              </div>
               <div class="card mt-3">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between ">
                    <h6 class="mb-0" class="feather feather-globe mr-2 icon-inline">Wallet Balance</h6>
                    <span class="text-secondary">
                        <a href="add_remove_wallet.php?id_no=<?php echo $s['id_no'];?>">
                     
                      <button class="btn btn-primary">Add / Remove</button>
                     </a>
                    </span>
                  </li>
                </ul>
              </div>
               <div class="card mt-3">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between ">
                    <h6 class="mb-0" class="feather feather-globe mr-2 icon-inline">Withdrawal Balance</h6>
                    <span class="text-secondary"><?php echo $s["Withdraw"]; ?></span>
                  </li>
                </ul>
              </div>
              <div class="card mt-3">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between ">
                    <h6 class="mb-0" class="feather feather-globe mr-2 icon-inline">Withdrawal Balance</h6>
                    <span class="text-secondary">
                     <a href="add_remove_withdrawal.php">
                        <button class="btn btn-primary">Add / Remove</button>
                      </a>
                    </span>
                  </li>
                </ul>
              </div>
              <div class="card mt-3">
              
                   
                
                
                <div class="list-group"
                    
                   
                   
                  
                </div>
              </div>
            </div>
            </div>
                             
                        
            <div class="col-md-7">
              <div class="card mb-3">
                <div class="cardbody">
                  
                      <h6 class="c" style="text-align:center;" >Customer  Detail</h6>
                  
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Id no :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["id_no"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Full Name :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $s["name"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $s["username"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $s["password"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["mobile"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alt Mobile Number :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s['alt_mobile'];?>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email Id :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["email"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date Of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["d_o_b"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City, State</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["city"].", ".$s["state"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pancard No.</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["pancard_no"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adhar Card No.</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $s["adhar_card"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Addreass</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $s["address"]; ?>
                    </div>
                  </div>
                </div>
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
  