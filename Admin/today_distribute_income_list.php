<?php include "config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Today Distribute Income List</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
<style>
.div {
  border: 3px outset green;
  background-color: lightblue;    
  text-align: center;
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
        <li class="breadcrumb-item active" aria-current="page">Today Distribute Income List</li>
      </ol>
    </nav>
    
    <div class="div">
        <div class="card-box table-responsive">
         <table id="" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Invest Id</th>
                            <th>Id Number</th>
                          <th>Full Name</th>
                          <th>Mobile Number</th>
                          <th>Date</th>
                          <th>Invest Amount</th>
                          
                          <th>Amount</th>
                          <th>Percentage</th>
                         
                          </tr>
                      </thead>
                      <tbody>
     <?php 
     $rs=1;
     $rr="SELECT * FROM `daily_return_record` WHERE `date`='$date'";
     $r=$con->query($rr);
     
     while($s=$r->fetch_assoc()){ 
          $fv="SELECT * FROM `registration_form` WHERE `id_no`='$s[id_no]'";
            $dc=$con->query($fv);
            $ssss=mysqli_fetch_assoc($dc);
     ?>
     
        <tr>
            
                            
                          <td> <?php echo $s['drr_id'];?>
                             
                          </td>
                          
                          
                          <td>
                              <?php echo $s['id_no']; ?>
                          </td>
                          
                          <td>
                              <?php echo $ssss['name']; ?>
                          </td>
                          <td>
                              <?php echo $ssss['mobile']; ?>
                          </td> 
                          <td>
                              <?php echo $s['date']; ?>
                          </td>
                          
                          <td>
                              <?php echo $s['invest_amount']; ?>
                          </td>
                          
                          <td>
                              <?php echo $s['amount']; ?>
                          </td>
                           <td>
                              <?php echo $s['percentage']; ?>
                          </td>
                          
                        
        </tr>
        <?php $rs++;
     } ?>
                          
                      </tbody>
                      </table>
        
    </div>
    </div>
    <br/>
    </div>
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
         
  