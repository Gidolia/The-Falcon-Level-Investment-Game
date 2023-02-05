<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Mobile Recharge</title>

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
        <li class="breadcrumb-item active" aria-current="page">Mobile Recharge</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-4 col-md-12">
                <div class="card-body">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Mobile Recharges</h3>
                </div>
                <form action="#" method="post" name="myForm" onsubmit="return validateForm()">
                <div class="form-row">
                    <div class="form-group col-md-4 center card_border slot-desktop-card" >
					  <div>
				     <span>Wallet Balance</span>
				   </div>
				   <div><span style="color:green;" >₹ <?php echo $id_detail[wallet_balance]+0;?></span>
				   
				   </div>
				   </div><br/><br/>
				   </div>
                    
                        <div class="form-group col-md-12">
                            <label for="inputAddress" class="input__label">Mobile phone number</label>
                            <input type="number" class="form-control input-style" name="mobile"
                                placeholder="+91">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2" class="">Operator/Circle/State</label>
                            <select name="operator" class="form-control">
                                <option value="RA">Airtel</option>
                                <option value="RV">Vodafone</option>
                                <option value="TB">BSNL</option>
                                <option value="RJ">Reliance jio</option>
                                <option value="RC">Aircel</option>
                                <option value="RI">Idea</option>
                                <option value="RM">MTNL</option>
                                <option value="UN">Uninor</option>
                            </select>
                        </div>
						<div class="form-group col-md-12">
                            <label for="inputAddress2" class="input__label">Recharge amount</label>
                            <input type="text" class="form-control input-style" 
                                placeholder="Enter Amount" name="amount">
							<a href="javascript:void(0)" >View plans
							<i class="a-icon a-icon-popover" ></i>
							</a>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-style mt-4" name="mobile_recharge">Pay Now</button>
                    </form>
<?php
if(isset($_POST[mobile_recharge]))
{
    $rch=$id_detail[wallet_balance]-$_POST[amount];
    
    if($rch>=0)
    {
   
    ///////////////for creating unique ID
        function unq_id_generate($chars) 
        {
          $data = '123456789';
          return substr(str_shuffle($data), 0, $chars);
        }
        for($x=0; $x<100; $x++)
        {
            echo $x;
            $unq_id=unq_id_generate(10);
            $sqsqqs="SELECT * FROM `mobile_recharge_response` WHERE `unique_id`='$unq_id'";
            $qur=$con->query($sqsqqs);
            if(mysqli_num_rows($qur)==0)
            {
                break;
            }
        }
        //echo $rch;
        //////////////////////
		$urla = 'http://www.rbizforcerecharge.in/ReCharge/APIs.aspx?Mob=7760122390&message=RR+'.$_POST[operator].'+'.$_POST[mobile].'+'.$_POST[amount].'+9874&myTxId='.$unq_id.'&source=API&circle=14';
	//	http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=7760122390&message=RR+RA+7869470415+10+9036&myTxId=1235&source=API&circle=14'

		$ch = curl_init($urla);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
        
       
        
        $str_arr = explode (",", $response);
        ///////
        if($str_arr[0]=="Your Request have been Success")
        {
            $sss="UPDATE `registration_form` SET `wallet_balance` = '$rch' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
    	
    		$sccc="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`, `trn_id`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '$id_detail[wallet_balance]', '$rch', '-', 'Recharged', ' Mobile Recharged', '$unq_id');";
    		
    		$con->query($sss);
    		$con->query($sccc);
    		$dis=distribute_recharge_income($id_detail[id_no],$_POST[amount],$unq_id);
    		if($dis=="y"){$com='y'; $hold='n';}
    		else{$com='n'; $hold='y';}
    		while ($con->next_result()) {;}
          
            $cd="INSERT INTO `mobile_recharge_response` (`mr_id`, `id_no`, `mr_date`, `mr_time`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `unique_id`, `recharge_status`, `hold_amount`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$unq_id', 'Success', '$hold');";
		    $con->query($cd);
            
    		
    		echo "<script>alert('Success! Mobile No. Recharged'); location.href='mobile_recharge.php?status=s';</script>";
           
        }
        elseif($str_arr[0]=="Your Request have been Processed")
        {
            
            $sss="UPDATE `registration_form` SET `wallet_balance` = '$rch' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
            
            $sccc="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`, `trn_id`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[amount]', '$id_detail[wallet_balance]', '$rch', '-', 'Recharged', ' Mobile Recharged', '$unq_id');";
    	
    		$con->query($sss);
    		$con->query($sccc);
            $cd="INSERT INTO `mobile_recharge_response` (`mr_id`, `id_no`, `mr_date`, `mr_time`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `unique_id`, `recharge_status`, `hold_amount`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$unq_id', 'panding', '$hold');";
		    $con->query($cd);
            
    		
    		echo "<script>alert('Pending ! Mobile recharge is pending'); location.href='mobile_recharge.php?status=p';</script>";
    		
         
        }
            else{
        echo "<script>alert('Failed! Plz Try Again'); location.href='mobile_recharge.php?status=f';</script>";
    }
    }
    else{
        echo "<script>alert('You Dont Have Balance'); location.href='mobile_recharge.php?status=uf';</script>";
    }
    
}
?>     
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