<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Confirm Withdraw Request</title>

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
        <li class="breadcrumb-item active" aria-current="page">Confirm Withdraw</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-2 col-md-12" style="display: block;">
              
			   <div class="card card_border col-md-8 center" style="display: block;">
              <div class="cardbody">
				   <div>
				     <span>Wallet Balance</span>
				   </div>
				   <div>
				       
				        <span style="color:green;" >₹ <?php echo $id_detail['wallet_balance'];?></span>
				        <br/><br/> 
<?php
$rr="SELECT * FROM `bank_kyc` WHERE `status`='c'";
     
     $r=$con->query($rr);
    $s=$r->fetch_assoc()
?>
				<div class="card mb-3">
                <div class="cardbody">
                  <form action="" method="POST">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Bank Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control input-style" 
                    value="<?php echo $s['bank_name'];?>" name="bank_name" disabled>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">IFSC Code:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control input-style" 
                      value="<?php echo $s['ifsc_code'];?>" name="ifsc_code" disabled>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Account Number:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control input-style" 
                     value="<?php echo $s['bank_account_no'];?>" name="bank_ac_no" disabled>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Confirm Account Number:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control input-style" 
                     value="" name="con_ac_no"required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Add Amount:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $_POST[amount];?>
                     <input name="amount" type="hidden" value="<?php echo $_POST[amount];?>" class="form-control input-style" 
                      >
                    </div>
                  </div>
                  
                </div><br/>
                <button name="Withdrawal_now" class="btn btn-primary">Confirm Withdrawal Request </button>
                
              
              </div>
            </form>
            
				    </div>
 <?php
    
    if(isset($_POST[Withdrawal_now]))
    {
        if($_POST[amount]>10)
    
            {
                $ad=$id_detail[wallet_balance]-$_POST[amount]; 
                 $weq=$id_detail[Withdraw]+$_POST[amount];
            if($ad>=0)
            {
        
            
        
       // $sr="INSERT INTO `main_wallet` (`mw_id`, `id_no`, `date`, `time`, `amount`, `a_amount`, `note`, `type`, `withdraw_amount`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$id_detail[wallet_balance]', '$ad', '-', 'w', '$_POST[amount]');";
        
        $dd="UPDATE `registration_form` SET `wallet_balance`='$ad'WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
        
        $xd="UPDATE `registration_form` SET `Withdraw`='$weq'WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
      
        
        //$dc="INSERT INTO `withdrawal_record` (`wr_no`, `id_no`, `date`, `time`, `amount`, `trn_id`, `notes`, `c_date`, `c_time`, `status`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '', 'withdrawal', '', '', 'p', '$id_detail[name]', '$s[bank_name]', '$s[ifsc_code]', '$s[bank_accont_no]');";
        $dc="INSERT INTO `withdrawal_record` (`wr_no`, `id_no`, `date`, `time`, `amount`, `trn_id`, `notes`, `c_date`, `c_time`, `status`, `full_name`, `bank_name`, `ifsc_code`, `bank_account_no`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '', 'withdrawal', '', '', 'p', '$id_detail[name]', '$s[bank_name]', '$s[ifsc_code]', '$s[bank_account_no]');";
    
       if($con->query($dd)===TRUE && $con->query($xd)===TRUE && $con->query($dc)===TRUE)
        {
        	echo "success";
        	echo "<script>alert('Success! Withdrawal Request successfully');location.href='withdraw.php';</script>";
        	
    }
    }
    }	echo "<script>alert('insufficient balance')</script>";
    }
        ?>
				   
				   
			   </div>
            </div>
            <br/>
			
            
        <div class="card-body" class="table-sm">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Withdrawal Request History</h3>
                </div>
            <?php
                             
        $g="SELECT * FROM `withdrawal_record` WHERE `id_no`='$id_detail[id_no]'";
        $dc=$con->query($g);
        ?>
                <div class="card-box table-responsive">
                <table id="" class="table table-striped table-bordered" >
                    <thead>
                        <tr><th>Sr. no.</th><th>Full Name</th><th>Bank Name</th><th>IFSC Code</th><th>Bank Account Number</th><th>Date/time</th><th>Amount</th><th>TXN No</th><th>Clear Date</th><th>Status</th></tr>
                      </thead>
             <?php
            $a=0;
            $t1=0;
            $t2=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
           
            ?>       
                  
                       <tr>
                         <td>
                              <?php echo $a; ?>
                          </td>
                          <td>
                              <?php echo $d['full_name'];?>
                          </td>
                          <td>
                              <?php echo $d['bank_name']?>
                          </td>
                          <td>
                              <?php echo $d['ifsc_code'];?>
                          </td>
                          <td>
                              <?php echo $d['bank_account_no'];?>
                          </td>
                          <td>
                            
                              <?php echo $d["date"];?> <?php echo $d["time"]; ?>
                             
                          </td>
                           <td>
                              <?php echo $d["amount"]; ?>
                          </td> 
                           <td>
                              <?php echo $d["trn_id"]; ?>
                          </td> 
                           <td>
                              <?php echo $d["c_date"]; ?>
                          </td> 
                          <td>
                              <?php if($d[status]=="p"){
                   ?><button class="btn btn-warning">Pending</button>
                   <?php }
                   elseif($d[status]=="r"){?>
                       <button class="btn btn-danger">Rejected</button>
                  <?php }
                   else{?>
                   <button class="btn btn-success">Completed</button>
                   <?php } ?>
                          </td>
                    </tr>
                    
              <?php
            }?>            

                     </table>
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