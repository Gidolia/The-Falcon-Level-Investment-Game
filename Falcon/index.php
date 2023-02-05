<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Falcon</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
<style>
.text_center {
  text-align: center;
}

.text_left {
  text-align: left;
}

.text_right {
  text-align: right;
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
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
    <div class="welcome-msg pt-3 pb-4" style="text-align:center;">
      <h1>Hi <span class="text-primary c"><?php echo $id_detail['name'];?></span>, Welcome back</h1>
      <p>Very detailed & featured admin.</p>
    </div>
        <div class="card card_border py-2 mb-4 col-md-6">
                <div class="card-body">
            <?php
            $rr="SELECT * FROM `registration_form` WHERE `id_no`='$id_detail[id_no]'";
                 
                 $r=$con->query($rr);
                $s=$r->fetch_assoc()
            ?>

            <div class="statistics">
                     <table class="table table-striped">
                         <tr><th>invites</th><th><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 
                         SHARE INVITE CODE ( <?php echo $s[shere_ref_code];?> )</th></tr>

                         <tr><th collspan="2">
                              <a href="whatsapp://send?text=https://the-falcon.in/login-form/sign_up.php?id_no=<?php echo $id_detail[id_no];?>" data-action="share/whatsapp/share"><span class="badge badge-primary" style="background-color: green;">Share invites Link</span></a> <a href="#"><span class="badge badge-primary" style="background-color: green;">App Download</span></a></th></tr>
                     </table>
                    </div>
                    </div>
                  </div>
    
    <!-- statistics data -->
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
             
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid" >
                <a href="my_invites.php">
              <div class="card card_border border-primary-top p-4">
                  
                <i class="lnr lnr-briefcase"> </i>
                <h3 class="text-primary number" style="font-size:18px">Total Investment</h3><br>
                <h3 class="stat-text text_right" style="color:green;">₹ <?php echo $id_detail['Invest_wallet'];?></h3>
                <p class="stat-text"></p>
                </a>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                  <a href="add_money.php">
                <i class="lnr lnr-hourglass"> </i>
                <h3 class="text-primary number" style="font-size:19px" >Add Money</h3>
                 <h3 class="stat-text text_right" style="color:green;"> ₹ <?php echo $id_detail['wallet_balance'];?></h3>
                <p class="stat-text"> Add Wallet Balance</p>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                  <a href="my_invites.php">
                <i class="lnr lnr-clock"> </i>
                <h3 class="text-primary number" style="font-size:19px" >Revenue Investment</h3><br>
                <h3 class="stat-text text_right" style="color:red;"> ₹ <?php echo $id_detail['Invest_wallet'];?></h3>
                <p class="stat-text"></p>
              </div>
              </a>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                  <a href="withdraw.php">
                <i class="lnr lnr-user"> </i>
                <h3 class="text-primary number" style="font-size:19px">Withdraw Request</h3><br>
                <h3 class="stat-text text_right" style="color:green;">₹ <?php echo $id_detail['Withdraw'];?></h3>
                <p class="stat-text"></p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->

    
	
    </section>
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
  