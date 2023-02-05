<?php include "config.php";
include "functions.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Customer Bank Details List </title>

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
        <li class="breadcrumb-item active" aria-current="page">Customer Bank Details List</li>
      </ol>
    </nav>
    
 <!-- forms  -->
  
 
            <div class="card card_border col-md-12">
                 <div class="statistics">
                  <div class="row">
                    <div class="py-2 mb-4 col-md-12">
                      <div class="form-row center" >
                        
                        <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
                          <div class="card card_border border-primary-top p-4">
                            <a href="withdrawl_cleared_requests.php">
                            <i class="lnr lnr-sync"> </i>
                            <h3 class="text-primary number" style="font-size:19px">Bank Details Approved<h3>
                                <h3 class="text-primary number">
                                    <?php echo bank_approved($ba);?><h3>
                                    </a>
                                
                            <p class="stat-text">Bank Details Approved</p>
                          </div>
                        </div>
                        <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
                          <div class="card card_border border-primary-top p-4">
                            <a href="withdrawal_cancel_requests.php">
                            <i class="lnr lnr-sync"> </i>
                            <h3 class="text-primary number" style="font-size:19px">Bank Details Reject<h3>
                                <h3 class="text-primary number">
                                    <?php echo bank_details_reject($bdr);?><h3>
                                    </a>
                                
                            <p class="stat-text">Bank Details Reject</p>
                          </div>
                        </div>
                         <div class="form-group col-md-3 pr-sm-2 statistics-grid" >
                          <div class="card card_border border-primary-top p-4">
                            <a href="bank_change_details.php">
                            <i class="lnr lnr-sync"> </i>
                            <h3 class="text-primary number" style="font-size:19px">Change Bank Details<h3>
                                <h3 class="text-primary number">
                                    <?php echo change_bank_derails($cbd);?><h3>
                                    </a>
                                
                            <p class="stat-text">Change Bank Details Request</p>
                          </div>
                        </div>
                        
                        
                      </div>
                    </div>
                    
                  </div>
                </div>
                
                <div class="card-body" class="table-sm">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Customer Bank Details List</h3>
                </div>
                <div class="card-box table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>ID</th>
                          <th>Full name</th>
                          <th>Bank Name</th>
                          <th>IFSC Code</th>
                          <th>Bank A/C No.</th>
                          <th>Bank images</th>
                          <th>Date / Time</th>
                          <th>Approved/Reject</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `bank_kyc` WHERE `status`='p'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `registration_form` WHERE `id_no`='$R[id_no]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                  <tr>
                                        <td> <?php echo $R['bnk_id']; ?></td>
                                <td>
                                    <?php echo $R['id_no']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['name'];?>
                                </td>
                                <td>
                                    <?php echo $R['bank_name']; ?>
                                </td>
                                <td>
                                    <?php echo $R['ifsc_code']; ?>
                                </td>
                                <td>
                                    <?php echo $R['bank_account_no']; ?>
                                </td>
                                <td>
                            <a href="../Falcon/bank_img/<?php echo $R['bank_passbook_img'];?>">View Photo</a>
                          </td>
                                
                                <form method="post">
                                <td>
                                    <?php echo $R['date']." ".$R['time']; ?>
                                </td>
                                <td>
                                <input type="hidden" name="bnk_id" value="<?php echo $R['bnk_id']; ?>">
                                <input type="submit" value="Approved" name="clear_submit" class="btn btn-success">
                                <input type="submit" value="Reject" name="reject_submit" class="btn btn-danger">
                                
                                </td>
                                </form>
                                <?php 
                                } ?>
                      </tbody>
                    </table>
                    </div>
                     <?php
                     if(isset($_POST[clear_submit]))
                     {
                        
                       $sql="UPDATE `bank_kyc` SET `status` = 'c' WHERE `bank_kyc`.`bnk_id` = '$_POST[bnk_id]';";
                       //echo $sql;
                        if ($con->query($sql) === TRUE) {
                          echo "<script>alert('Bank Details Approved successfully');
                          location.href='bank_details_apd.php'</script>";
                        } else {
                          echo "Error: " . $sql . "<br>" . $con->error;
                        }
                      
                     }
                     if(isset($_POST[reject_submit]))
                     {
                       
                       $sql="UPDATE `bank_kyc` SET `status` = 'r' WHERE `bank_kyc`.`bnk_id` = '$_POST[bnk_id]';";
                     
                       
                        if ($con->query($sql) === TRUE) {
                          echo "<script>alert('Bank Details reject successfully');
                          location.href='bank_details_apd.php'</script>";
                        } else {
                          echo "Error: " . $sql . "<br>" . $con->error;
                        }
                       
                     }
                     ?>
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
  