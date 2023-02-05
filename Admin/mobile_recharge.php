<?php include "config.php";
include "functions.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Recharge History</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
<style>
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  
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
        <li class="breadcrumb-item active" aria-current="page">Recharge History</li>
      </ol>
    </nav>
    
 <!-- forms  -->
  
 
            <div class="card card_border col-md-12">
                 <div class="statistics">
                  <div class="row">
                    <div class="py-2 mb-4 col-md-12">
                      <div class="form-row center" >
                        
                    <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
                        <a href="mobile_recharge.php">
                          <div class="card card_border border-primary-top p-4">
                           
                            <i class="lnr lnr-sync"> </i>
                            <h3 class="text-primary number" style="font-size:19px">Done Recharge<h3>
                                <h3 class="text-primary number">
                                    <?php echo total_successfully_recharge($sfr);?><h3>
                            <p class="stat-text">Successfully Recharge</p>
                          </div>
                           </a>
                        </div>
                        <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
                            <a href="pending_recharge_list.php">
                          <div class="card card_border border-primary-top p-4">
                            
                            <i class="lnr lnr-sync"> </i>
                            <h3 class="text-primary number" style="font-size:19px">Pending Recharge<h3>
                                <h3 class="text-primary number">
                                    <?php echo total_pending_recharge($pdg);?><h3>
                            <p class="stat-text">Pending Recharge List</p>
                             
                          </div>
                          </a>
                        </div>  
                         <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
                        <a href="#">
                          <div class="card card_border border-primary-top p-4">
                           
                            <i class="lnr lnr-sync"> </i>
                            <h3 class="text-primary number" style="font-size:19px"> Fail Recharge<h3>
                                <h3 class="text-primary number">
                                    <?php echo total_Fail_recharge($tfr);?><h3>
                            <p class="stat-text">Total Fail Recharge</p>
                          </div>
                           </a>
                        </div>
                        
                        </div>
                        
                      </div>
                    </div>
                   
                  </div>
                
                <div class="card-body" class="table-sm">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Recharge History</h3>
                </div>
                <div class="card-box table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>ID</th>
                          <th>Amount</th>
                          <th>Mobile</th>
                          <th>Date / Time</th>
                          <th>Response</th>
                          <th>Hold</th>
                        </tr>
                      </thead>


                      <tbody>
                          
                      </tbody>
                      <?php   
                        
                              $e="SELECT * FROM `mobile_recharge_response` WHERE `recharge_status`='Success'";
                                $d=$con->query($e);
                                while($r=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `mobile_recharge_response` WHERE `id_no`='$R[id_no]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                            <tr>
                                <td> <?php echo $r["mr_id"]; ?></td>
                                <td>
                                    <?php echo $r['id_no'];?>
                                </td>
                                <td>
                                    <?php echo $r['amount'];?>
                                </td>
                                <td>
                                    <?php echo $r['r_mobile'];?>
                                </td>
                                
                                <td>
                                    <?php echo $r['mr_date']." / ".$r['mr_time'];?>
                                </td>
                                <td>
                                   <?php echo $r["response"];?>
                                </td>
                                
                                 <td><?php if($r[recharge_status]=='Rejected') {?> 
                                 <button type="button" class="btn btn-danger">Rejected</button>
                                 <?php }
                                 elseif($r[recharge_status]=='Success') {?> <button type="button" class="btn btn-success">Success</button>
                                    <?php    
                                    }
                                    else {?> <button type="button" class="btn btn-warning">Panding</button>
                                    <?php    
                                    } 
                                 ?></td>
                               <?php  } ?>
                    </table>
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
  