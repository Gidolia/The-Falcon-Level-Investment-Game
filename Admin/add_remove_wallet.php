<?php include "config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Add/Remove Wallet</title>

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
<?php
        $rr="SELECT * FROM `registration_form` WHERE `id_no`='$_GET[id_no]'";
        $ss=$con->query($rr);
        $rs=$ss->fetch_assoc();
        ?>
  <!-- content -->
  <div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add/Remove Wallet </li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div>
        
            <div class="card card_border py-2 mb-4 col-md-6">
                <div class="card-body">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Add/Remove Wallet Balence</h3>
                </div>
                    <div class="card-body">
                        <div style="color:#00cc44;">
                    <h1 style="font-size:25px;" >Wallet Balance = <?php echo $rs[wallet_balance]+0;?></h1>
                        </div>
				<table class="table table-striped table-bordered">
            <form method="post">
            <tr>
                <td>Id No :</td>
                <td><?php echo $_GET[id_no];?>(<?php echo $rs[name];?>)
                <input type="hidden" class="form-control" name="id_no" value="<?php echo $_GET[id_no];?>" required></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td><select name="operator">
                    <option value="add">Add</option>
                    <option value="remove">Remove</option>
                </select></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><input type="number"  name="amount" class="form-control" required></td>
            </tr>
            <tr>
                <td>Note</td>
                <td><input type="text"  name="note" class="form-control" required ></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" class="btn btn-success" value="Submit" name="opperaa"></td>
            </tr>
            </form>
            </table>	 
                    </div>
                </div>
            </div>
            <div class="card card_border py-2 mb-4 col-md-12">
                <div class="card-body">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Add/Remove Wallet Balence View History</h3>
                </div>
                    <div class="card-body">
		         <table class="table table-striped table-bordered" id="datatable" width="100%">
            <thead>
                <tr><th>Sr. no.</th><th>d_id</th><th>Date</th><th>Time</th><th>Type</th><th>Amount</th><th>Transaction Id</th><th>Note</th></tr>
            </thead>
         
        <?php
           $r=0;
            $rr="SELECT * FROM `ad_wallet_record` WHERE `id_no`='$_GET[id_no]';";
            
            $ss=$con->query($rr);
            while($s=$ss->fetch_assoc())
            {$r++; ?>
            
            <tr>
                <td><?php echo $s[awr_no];?></td>
                <td><?php echo $s[id_no];?></td>
                <td><?php echo $s[date];?></td>
                <td><?php echo $s[time];?></td>
                <td><?php echo $s[type];?></td>
                <td><?php echo $s[amount];?></td>
                <td><?php echo $s[trn_id];?></td>
                <td><?php echo $s[notes];?></td>
               
            </tr>
            <?php
            }?>
        </table>
        <?php
        
            if(isset($_POST[opperaa]))
            {
                if($_POST[operator]=="add")
                
                {
                
                  $rr="SELECT * FROM `registration_form` WHERE `id_no`='$_POST[id_no]'";
                  $ss=$con->query($rr);
                  $rs=$ss->fetch_assoc();
                  
                    $wal=$rs[wallet_balance]+$_POST[amount];
                    
                   
                     $s .="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`) VALUES (NULL, '$rs[id_no]', '$date', '$time', '$_POST[amount]', '$rs[wallet_balance]', '$wal', '+', 'Admin', '');";
                    
                    $s .="UPDATE `registration_form` SET `wallet_balance`='$wal' WHERE `registration_form`.`id_no` = '$_POST[id_no]';";
                
                    $s .="INSERT INTO `ad_wallet_record` (`awr_no`, `id_no`, `date`, `time`, `amount`, `trn_id`, `notes`, `type`) VALUES (NULL, '$_POST[id_no]', '$date', '$time', '$_POST[amount]', 'TRN7723+', '$_POST[note]', '+');";
                   
                    
                if($con->multi_query($s)===TRUE)
                {
                    	echo "<script>alert('Amount Distributed Successfully');
		location.href='add_remove_wallet.php?id_no=$_POST[id_no]';</script>";
                
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`date`, `time`, `id_no`, `url`, `sr_no`) VALUES ('$date', '$time', 'admin', '$url', 'null');";
                
                $con->query($fail);
                echo "<script>alert('failed');
		        location.href='add_remove_wallet.php?id_no=$_POST[id_no]';</script>";
                }
                }
                
                elseif($_POST[operator]=="remove")
                {
                
                  $rr="SELECT * FROM `registration_form` WHERE `id_no`='$_POST[id_no]'";
                  $ss=$con->query($rr);
                  $rs=$ss->fetch_assoc();
                  
                    $wal=$rs[wallet_balance]-$_POST[amount];
                    
                    $s="UPDATE `registration_form` SET `wallet_balance`='$wal' WHERE `registration_form`.`id_no` = '$_POST[id_no]';";
                
                    $s .="INSERT INTO `ad_wallet_record` (`awr_no`, `id_no`, `date`, `time`, `amount`, `trn_id`, `notes`, `type`) VALUES (NULL, '$_POST[id_no]', '$date', '$time', '$_POST[amount]', 'TRN7723-', '$_POST[note]', '-');";
                    
                    
                    $s .="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`) VALUES (NULL, '$rs[id_no]', '$date', '$time', '$_POST[amount]', '$rs[wallet_balance]', '$wal', '-', 'Admin', '');";
                    
                if($con->multi_query($s)===TRUE)
                {
                    	echo "<script>alert('Amount Distributed Successfully');
		location.href='add_remove_wallet.php?id_no=$_POST[id_no]';</script>";
                
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`date`, `time`, `id_no`, `url`, `sr_no`) VALUES ('$date', '$time', 'admin', '$url', 'null');";
                
                $con->query($fail);
                echo "<script>alert('failed');
		        location.href='add_remove_wallet.php?id_no=$_POST[id_no]';</script>";
                }
                }
            }  
        ?>
        
        </div>
      </div>
    </div>
    </div>
            </div>
     <!-- //forms -->

  </div>
  <!-- //content -->

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
  