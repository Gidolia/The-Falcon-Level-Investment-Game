<?php include "config.php";
include "functions.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Task Handler Money Distribute Customer List</title>

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
        <li class="breadcrumb-item active" aria-current="page">Task Handler Money Distribute Customer List</li>
      </ol>
    </nav>
    
 <!-- forms  -->
  
 
            <div class="card card_border col-md-12">
                
                <div class="card-body" class="table-sm">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Task Handler Money Distribute Customer List</h3>
                </div>
                    <div class="card-box table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>Task Handler ID</th>
                          <th>ID</th>
                          <th>Full Name</th> 
                          <th>Date / Time</th>
                         <th>Screenshot, Photos</th>
                          <th>Approved/Reject</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `task_handler_history` WHERE `status`='p'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `registration_form` WHERE `id_no`='$R[id_no]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $R['thh_id']; ?></td>
                                <td>
                                    <?php echo $R['th_id']; ?>
                                </td>
                                <td>
                                    <?php echo $R['id_no']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['name'];?>
                                </td>
                                 <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td>
                                    <a href="../Falcon/task_img/<?php echo $R['file_name'];?>">View Photo</a>
                                </td>
                                
                                <form method="post">
                                <td>
                                <input type="hidden" name="thh_id" value="<?php echo $R['thh_id']; ?>">
                                <input type="hidden" name="id_no" value="<?php echo $ssss['id_no']; ?>">
                                <input type="hidden" name="" value="<?php echo $R['amount']; ?>">
                                
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
                            $_POST[amount]=0.10;
                        
                         $csc="SELECT * FROM `registration_form` WHERE `id_no`='$_POST[id_no]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         $amt=$cdcdc[wallet_balance]+$_POST[amount];
                      
                       $sql="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`, `trn_id`) VALUES (NULL, '$_POST[id_no]', '$date', '$time', '$_POST[amount]', '$cdcdc[wallet_balance]', '$amt', '+', 'today Task add Money', 'Task Handler Money', '$pas');";
                       
                     //  $sql="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`, `trn_id`) VALUES (NULL, '$_POST[id_no]', '$date', '$time', '$_POST[amount]', '$cdcdc[wallet_balance]', '$amt', '-', 'Withdrawal', 'withdrawal_request', '$_POST[trn_id]');";
                       
                       
                       $sql .="UPDATE `task_handler_history` SET `status` = 'c' WHERE `task_handler_history`.`thh_id` = '$_POST[thh_id]';";
                       
                       $sql .="UPDATE `task_handler_history` SET `task_unique_id` = '$taskid' WHERE `task_handler_history`.`thh_id` = '$_POST[thh_id]';";
                       
                        $sql .="UPDATE `task_handler_history` SET `c_date` = '$date' WHERE `task_handler_history`.`thh_id` = '$_POST[thh_id]';";
                        $sql .="UPDATE `task_handler_history` SET `amount` = '$_POST[amount]' WHERE `task_handler_history`.`thh_id` = '$_POST[thh_id]';";
                       
                       $sql .="UPDATE `registration_form` SET `wallet_balance` = '$amt' WHERE `registration_form`.`id_no` = '$_POST[id_no]';";
                       
                        if ($con->multi_query($sql) === TRUE) {
                          echo "<script>alert('Task Handler Add Money Distribute Customer Cleared successfully');
                          location.href='task_handler_money_distribute.php'</script>";
                        } else {
                          echo "Error: " . $sql . "<br>" . $con->error;
                        }
                      
                     }
                     if(isset($_POST[reject_submit]))
                     {
                        
                       
                        $sql="UPDATE `task_handler_history` SET `status` = 'r' WHERE `task_handler_history`.`thh_id` = '$_POST[thh_id]';";
                    
                       
                        if ($con->query($sql) === TRUE) {
                          echo "<script>alert('Task Handler Add Money Distribute Customer not  Cleared successfully');
                          location.href='task_handler_money_distribute.php'</script>";
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
  