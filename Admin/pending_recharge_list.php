<?php include "config.php";
include "functions.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Pending Recharge History</title>

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
        <li class="breadcrumb-item active" aria-current="page">Pending Recharge History</li>
      </ol>
    </nav>
    
 <!-- forms  -->
  
 
            <div class="card card_border col-md-12">
                
                <div class="card-body" class="table-sm">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Pending Recharge History</h3>
                </div>
                
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
                        <?php   
                        
                              $e="SELECT * FROM `mobile_recharge_response` WHERE `recharge_status`='panding'";
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
                                
                                 <td>
                                     <form method="post">
                                         <input type="hidden" name="mr_id" value="<?php echo $r['mr_id']; ?>">
                                         <input type="submit" name="submit_accept" class="btn btn-success">
                                     </form>
                                     <form method="post">
                                         <input type="hidden" name="mr_id" value="<?php echo $r['mr_id']; ?>">
                                         <input type="submit" name="submit_reject" value="Reject" class="btn btn-danger">
                                     </form>
                                 
                                 
                                   
                                   </td>
                               <?php  } ?>

                      
                    </table>
                 <?php
                 if(isset($_POST[submit_accept]))
                 {
                     $sqld="SELECT * FROM `mobile_recharge_response` WHERE `recharge_status`='panding'";
                    $bvn=$con->query($sqld);
                    $dcc=$bvn->fetch_assoc();
                    
                    $xs="UPDATE `mobile_recharge_response` SET `recharge_status` = 'Success' WHERE `mobile_recharge_response`.`mr_id` = '$_POST[mr_id]';";
                    while ($con->next_result()) {;}
                    if($con->query($xs)===TRUE)
                    {
                        echo "<script>alert('Success ! Accept Recharge'); location.href='pending_recharge_list.php';</script>";
                    }
                    else{
                        //$fail="INSERT INTO `fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', 'Y', '$url', 'Mobile Income Distribution');";
                        $fail="INSERT INTO `fail_report` (`fr_id`, `id_no`, `date`, `time`, `url`, `failed_type`, `fail_amount`) VALUES (NULL, '$_SESSION[id_no]', '$date', '$time', '$url', 'recharge', '$_POST[amount]');";
                    	        $con->query($fail);
                         echo "<script>alert('Failed ! Some Problem'); location.href='pending_recharge_list.php';</script>";
                     }
                     }
                     if(isset($_POST[submit_reject]))
                     {
                      $sqld="SELECT * FROM `mobile_recharge_response` WHERE `mr_id`='$_POST[mr_id]'";
                        $bvn=$con->query($sqld);
                        $dcc=$bvn->fetch_assoc();
                        
                         $lsql5="SELECT * FROM `registration_form` WHERE `id_no`='$dcc[id_no]'";
                         $que5=$con->query($lsql5);
                         $fet5=mysqli_fetch_assoc($que5);
                         $main_bal=$fet5[wallet_balance]+$dcc[amount];
                         
                         $fer="UPDATE `registration_form` SET `wallet_balance` = '$main_bal' WHERE `registration_form`.`id_no` = '$dcc[id_no]';";
                         //$inst="INSERT INTO `wallet_balance` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$dcc[d_id]', '+', '$dcc[amount]', '$main_bal', 'Recharge Fail Return', '', '', 'Recharge', '$date', '$time', '$dcc[unique_id]');";
                         $inst="INSERT INTO `main_wallet` (`mw_id`, `id_no`, `date`, `time`, `amount`, `a_amount`, `note`, `type`, `withdraw_amount`, `txn_id`, `rech_unique_id`) VALUES (NULL, '$dcc[id_no]', '$date', '$time', '$dcc[amount]', '$main_bal', 'Recharge Fail Return', '+', '', '$dcc[txn_id]', '$dcc[rech_unique_id]');";
                         $xs="UPDATE `mobile_recharge_response` SET `recharge_status` = 'Fail' WHERE `mobile_recharge_response`.`mr_id` = '$_POST[mr_id]';";
                        if($con->query($fer)===TRUE && $con->query($inst)===TRUE && $con->query($xs)===TRUE)
                        {
                            echo "<script>alert('Rejected ! Amount Returned Successfully'); location.href='pending_recharge_list.php';</script>";
                        }
                        else{
                            
                            $fail="INSERT INTO `fail_report` (`fr_id`, `id_no`, `date`, `time`, `url`, `failed_type`, `fail_amount`) VALUES (NULL, '$_SESSION[id_no]', '$date', '$time', '$url', 'recharge', '$_POST[amount]');";
                        	        $con->query($fail);
                             echo "<script>alert('Failed ! Some Problem Occour'); location.href='pending_recharge_list.php';</script>";
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
  