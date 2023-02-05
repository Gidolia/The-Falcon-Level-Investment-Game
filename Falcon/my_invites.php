<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>My Invites</title>

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
        <li class="breadcrumb-item active" aria-current="page">My Investment</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-4 col-md-12">
                
                <div class="form-group col-md-12 center card_border slot-desktop-card" >
					  <div>
				     <span>Our Investment Plans</span>
				   </div><br>
				   <div>
				       <div class="card-box table-responsive">
				        <table id="" class="table table-striped table-bordered" >
                    <thead>
                        <tr><th>Amount</th><th>Daily</th><th>Monthly</th><th>Yearly</th><th>Investment</th></tr>
                      </thead>

                      <tbody>

                       <tr>
                          <td>
                             250.00 
                          </td>
                           <td>
                            2.50 rs/day
                            </td>
                           <td>
                              75.00 rs/month
                           </td>
                          <td>
                              900.00 rs/Year
                          </td> 
                          <td>
                            <form action="" method="POST">
                          <input value="250" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
				       
				          
                        </td>
                    </tr>
                        <tr>
                          <td>
                             2,500.00  
                          </td>
                           <td>
                              25.00 rs/day
                            </td>
                           <td>
                              750.00 rs/month
                           </td>
                          <td>
                              9,000.00 rs/Year
                          </td> 
                          <td>
				           <form action="" method="POST">
                          <input value="2500" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
                        </td>
                    </tr>
                        <tr>
                          <td>
                             5,000.00 
                          </td>
                           <td>
                              50.00 rs/day
                            </td>
                           <td>
                              1,500.00 rs/month
                           </td>
                          <td>
                              18,000.00 rs/Year
                          </td> 
                          <td>
				           <form action="" method="POST">
                          <input value="5000" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
                        </td>
                    </tr>
                        <tr>
                          <td>
                             15,000.00 
                          </td>
                           <td>
                                150.00 rs/day
                            </td>
                           <td>
                              4,500.00 rs/month
                           </td>
                          <td>
                              54,000.00 rs/Year
                          </td> 
                          <td>
				           <form action="" method="POST">
                          <input value="15000" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
                        </td>
                    </tr>
                        <tr>
                          <td>
                              35,000.00
                          </td>
                           <td>
                            350.00 rs/day
                            </td>
                           <td>
                              10,500.00 rs/month
                           </td>
                          <td>
                              1,26,000.00 rs/Year
                          </td> 
                          <td>
				           <form action="" method="POST">
                          <input value="35000" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
                        </td>
                    </tr>
                        <tr>
                          <td>
                             50,000.00 
                          </td>
                           <td>
                            500.00 rs/day
                            </td>
                           <td>
                              15,000.00 rs/month
                           </td>
                          <td>
                              1,80,000.00 rs/Year
                          </td> 
                          <td>
				           <form action="" method="POST">
                          <input value="50000" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
                        </td>
                    </tr>
                        <tr>
                          <td>
                              1,00,000.00
                          </td>
                           <td>
                            1,000.00 rs/day
                            </td>
                           <td>
                              30,000.00 rs/month
                           </td>
                          <td>
                              3,60,0000.00 rs/Year
                          </td> 
                          <td>
				           <form action="" method="POST">
                          <input value="100000" name="amount" type="hidden">
				           <button name="invest_ment" class="btn btn-success">Investment</button>
				           </form>
                        </td>
                    </tr>
                     
                          
                      </tbody>
                     </table>
                     </div>
				   </div>
				   </div>
                <br> <br>
                <div class="card-body">
				
                <div class="form-row">
                    <div class="form-group col-md-4 center card_border slot-desktop-card" >
					  <div>
				     <span>Wallet Balance</span>
				   </div>
				   <div><span style="color:green;" >₹ <?php echo $id_detail['wallet_balance'];?></span>
				   </div>
				   </div><br/><br/><br/>
				   
				   <div class=" form-group col-md-4 center card_border slot-desktop-card">
					  <div>
				     <span>Invest Balance</span>
				   </div>
				   <div><span style="color:green;" >₹ <?php echo $id_detail['Invest_wallet'];?></span>
				   </div>
				   </div>
				   </div><br/>
				   <div class="form-row">
				      <div class="form-group col-md-4 center card_border">
				        <form action="" method="POST">
				         <div class="col-sm-12 text-secondary">
				          <span>Amount :</span>    
                          <input value="ment" min="250" name="amount" type="number" class="form-control input-style" placeholder="Enter Amount";>
                         </div><br/>
                        <div class="col-md-12">
                         <div class="form-row">
				          <div class="form-group col-md-4">
				           <button name="Redeem" class="btn btn-primary" disabled>Redeem</button>
				          </div><br/><br/>
				         </div>
				       </div>
				       </form>
				       
        
            		  <?php
            if(isset($_POST[Redeem]))
            {
                $ast=$id_detail[Invest_wallet]-$_POST[amount];
                $dsg=$id_detail[wallet_balance]+$_POST[amount];
               
            if($ast>=0)
                    {
           
            $sd="INSERT INTO `Invest_wallet` (`iw_id`, `id_no`, `date`, `time`, `amount`, `type`, `b_iw`, `a_iw`, `note`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '-', '$id_detail[Invest_wallet]
                ', '$ast', 'Redeem');";
            $ys="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '$id_detail[wallet_balance]', '$dsg', '-', 'Redeem', '');";
            //echo $sd;
            $dd="UPDATE `registration_form` SET `Invest_wallet`='$ast' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
            $ds="UPDATE `registration_form` SET `wallet_balance`='$dsg' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
            //echo $dd;
            if($con->query($sd)===TRUE && $con->query($dd)===TRUE && $con->query($ys)===TRUE && $con->query($ds)===TRUE)
            {
            	echo "success";
            	echo "<script>alert('Success! Redeem Amount successfully');location.href='my_invites.php';</script>";
            	
            }else{echo "fail";}
                    }
            }
            ?>   

            
              <?php
            if(isset($_POST[invest_ment]))
            {
                $ast=$id_detail[Invest_wallet]+$_POST[amount];
                $dsg=$id_detail[wallet_balance]-$_POST[amount];
                if($dsg>=0)
                {
                    $txn_id=rand(10000,99999);
                    $txn_id=10;
                    $txn_id=15;
            //$sd="INSERT INTO `Invest_wallet` (`ivt_id`, `id_no`, `date`, `time`, `wallet_balance`, `Invest_amount`, `redeem_amount`, `a_invest_balance`, `invest_balance`, `note`,`a_wallet_balance`, `txn_id`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$dsg', '$_POST[amount]', '', '$id_detail[Invest_wallet]', '$ast', 'Invest', '$id_detail[wallet_balance]', '$txn_id');";
             $sd="INSERT INTO `Invest_wallet` (`iw_id`, `id_no`, `date`, `time`, `amount`, `type`, `b_iw`, `a_iw`, `note`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '+', '$id_detail[Invest_wallet]', '$ast', 'Investment');";
             $ys="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '$id_detail[wallet_balance]', '$dsg', '+', 'Investment', '');";
            //echo $sd;
            $dsccmn="SELECT * FROM `registration_form` WHERE `shere_ref_code`='$id_detail[ref_code]'";
            $sde=$con->query($dsccmn); 
            $mnbcop=$sde->fetch_assoc();
            
            $commis=$_POST[amount]*2/100;
            $commis_wallet=$mnbcop[wallet_balance]+$commis;
            $ddds="UPDATE `registration_form` SET `wallet_balance`='$commis_wallet' WHERE `registration_form`.`id_no` = '$mnbcop[id_no]';";
            
            $ysds="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`) VALUES (NULL, '$mnbcop[id_no]', '$date', '$time', '$commis', '$mnbcop[wallet_balance]', '$commis_wallet', '+', 'Referal Commission', '$id_detail[id_no]');";
            //echo $sd;
            $dd="UPDATE `registration_form` SET `wallet_balance`='$dsg' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
            
            $ds="UPDATE `registration_form` SET `Invest_wallet`='$ast' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
            //echo $dd;
            if($con->query($sd)===TRUE && $con->query($dd)===TRUE && $con->query($ys)===TRUE && $con->query($ds)===TRUE && $con->query($ddds)===TRUE && $con->query($ysds)===TRUE)
            {
            	echo "success";
            	echo "<script>alert('Success! Investment Amount successfully');location.href='my_invites.php';</script>";
            	
            }else{echo "fail";}
            }echo "<script>alert('Insufficient Wallet Balance');location.href='my_invites.php';</script>";
            }
            ?>   
	
				     </div>
				 </div><br/><br/>
				
                    <div class="form-row">
                     <div class="form-group col-md-12 card_border" >
                        <div class="cards__heading" style="text-align:center;" >
                         <h3>Redeem And Investment History</h3>
                         </div>
                         <div class="card-box table-responsive">
                           <table id="" class="table table-striped table-bordered" >
                    <thead>
                        <tr><th>Sr no.</th><th>Id. no.</th><th>Date</th><th>Time</th><th>Type</th><th>Note</th><th>Amount</th></tr>
                      </thead>

                      <tbody>
<?php 

     $d=1;
     $rr="SELECT * FROM `Invest_wallet` WHERE `id_no`='$id_detail[id_no]' ORDER BY `Invest_wallet`.`iw_id` DESC";
     
     $r=$con->query($rr);
    $a=0;
     while($s=$r->fetch_assoc()){ $a++; ?>
                       <tr>
                         <td>
                              <?php echo $a; ?>
                          </td>
                          <td>
                              <?php echo $s['id_no']; ?>
                          </td>
                          <td>
                            
                              <?php echo $s['date'];?>
                             
                          </td>
                           <td>
                              <?php echo $s["time"]; ?>
                          </td>
                          
                          <td>
                              <?php echo $s["type"]; ?>
                          </td>
                          
                          <td>
                                <?php echo $s["note"]; ?>
                        </td>
                        <td>
                                <?php echo $s["amount"]; ?>
                        </td>
                       
                         
                          
                    </tr>
                     <?php $d++;
                                  } ?>
                          
                      </tbody>
                     </table>
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
  