<?php include "config.php";
include "functions.php";
?>
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
    <div class="welcome-msg pt-3 pb-4">
      <h1>Hi <span class="text-primary c">Admin</span>, Welcome back</h1>
      <p>Very detailed & featured admin.</p>
    </div>

    <!-- statistics data -->
    <div class="statistics">
      <div class="row">
        <div class="py-2 mb-4 col-md-12">
          <div class="form-row">
            <div class="form-group col-md-3  pr-sm-2 statistics-grid" >
              <div class="card card_border border-primary-top p-4">
                <a href="customer_list.php">
                <i class="lnr lnr-user"> </i>
                <h3 class="text-primary number" style="font-size:22px">Total Customer<h3>
                    <h3 class="text-primary number"><?php echo new_customer($id_no);?><h3>
                    </a>
                <p class="stat-text">Total Customer</p>
              </div>
            </div>
            
            
            <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
              <div class="card card_border border-primary-top p-4">
                <a href="withdrawal_request.php">
                <i class="lnr lnr-sync"> </i>
                <h3 class="text-primary number" style="font-size:20px">Withdrawal Request<h3>
                    <h3 class="text-primary number">
                        <?php echo withdrawal_request($p);?><h3>
                        </a>
                    
                <p class="stat-text">Withdrawal Request</p>
              </div>
            </div>
            
            
            <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
              <div class="card card_border border-primary-top p-4">
                <a href="today_customer_list.php">
                <i class="lnr lnr-rocket"> </i>
                <h3 class="text-primary number" style="font-size:20px">Today New Customer<h3>
                    <h3 class="text-primary number"><?php echo new_customer_today($date);?><h3>
                   </a> 
                <p class="stat-text">New Customer</p>
              </div>
            </div>
            
            <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
              <div class="card card_border border-primary-top p-4">
                <a href="#">
                
                <a href="process_distribute_income.php">
                <button type="button" class="btn btn-primary center">            Distributed Daily Income        </button>
                </a> <br>
                <a href="task_handler.php">
                <button type="button" class="btn btn-primary ">Task Handler</button>
                </a>
                    
                   </a> 
                
              </div>
            </div>
            
            
            
          </div>
        </div>
        
      </div>
    </div>
    <!-- //statistics data -->
</div>
</div>
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
  