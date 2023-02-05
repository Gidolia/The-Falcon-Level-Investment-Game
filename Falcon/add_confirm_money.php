<?php include "falcon_config.php";
////////////////for create unique id
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $pas=password_generate(10);
    $sqsqqs="SELECT * FROM `txn_handler` WHERE `product_unique_id`='$pas'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}

////////////////////////////////////////////////
//////////////////////////////////////////////
/////////////////////////////////////////////////////for pay u money code
// Merchant key here as provided by Payu
$MERCHANT_KEY = "ZVRufHul";

// Merchant Salt as provided by Payu
$SALT = "kb8BVBdmaO";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
		  
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> Confirm Add Money</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
<style>
.center {
  margin: auto;
  width: 50%;
  border: 5px;
  padding: 10px;
}
</style>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
    function validateForm(str) {
        var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "get_hint.php?q=" + str, true);
    xmlhttp.send();
    }
  </script>
</head>

<body class="sidebar-menu-collapsed" onload="submitPayuForm()">
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
        <li class="breadcrumb-item active" aria-current="page">Confirm Add Money</li>
      </ol>
    </nav>
    
 <!-- forms  --><div class="">
            <div class="card card_border py-2 mb-4 col-md-12" >
                <div class="card-body" class="center">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Confirm Add Money</h3>
                </div>
                    <div class="card-body">
					 <div class="form-group col-md-12">
			<div class="card card_border col-md-12" style="display: block;">
              <div class="cardbody center" >
                  
				   <div>
				     <span>Wallet balance</span>
				   </div>
				   <div>
				        <span style="color:green;" ><?php echo $id_detail['wallet_balance'];?></span>
				   </div>
			   </div>
            </div>
            
              <div class="card mb-3">
                <div class="cardbody">
                
         <form class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post" name="payuForm">
          <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
              <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
              <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
              <input type="hidden" class="form-control" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $pas : $posted['productinfo'] ?>">
      
      
                 <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Full Name:</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                     <input type="text" class="form-control input-style" required="required" name="firstname" id="firstname"
                    value="<?php echo (empty($posted['firstname'])) ? $id_detail['name'] : $posted['firstname']; ?>" readonly>
                     </div>
                   </div>
                  <hr>  
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Mobile Number:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $_POST[mobile];?>
                        <input type="text" required="required" class="form-control" name="phone" value="<?php echo (empty($posted['phone'])) ? $id_detail['mobile'] : $posted['phone']; ?>" readonly>
                     
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Email Id:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $_POST[email];?>
                     <input type="email" 
                     value="<?php echo (empty($posted['email'])) ? $id_detail['email'] : $posted['email']; ?>" name="email" class="form-control input-style"readonly>
                    </div>
                  </div>
                  <hr>
                     
                        
                          <input type="hidden" class="form-control" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $pas : $posted['productinfo'] ?>">
                          <input type="hidden" class="form-control" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>">
                        
                          <?php $amountr=$_POST['amount']*2/100;
                            $amounr=$_POST['amount']+$amountr;
                            //echo $amounr;
                          ?>
                 <div class="row">
                    <div class="col-sm-3">
                      <h6 class="c" class="mb-0">Add Amount:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $_POST[amount];?>
                     <input type="hidden" min="10" value="<?php echo (empty($posted['amount'])) ? $amounr : $posted['amount'] ?>" name="amount" type="number" class="form-control input-style" readonly >
                    </div>
                  </div> <br/>
                      
                      <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                      
                          <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? 'https://the-falcon.in/Falcon/process_add_money.php?statusd=s' : $posted['surl'] ?>" size="64" />
                          <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? 'https://the-falcon.in/Falcon/process_add_money.php?statusd=f' : $posted['furl'] ?>" size="64" />
                          <?php
      $cvbnm="SELECT * FROM `txn_handler` WHERE `txn_id`='$txnid'";
      $dcvbnm=$con->query($cvbnm);
      if($dcvbnm->num_rows==0)
      {
      $dscsvsvvv="INSERT INTO `txn_handler` (`th_id`, `id_no`, `txn_id`, `date`, `time`, `status`, `name`, `mobile`, `email`, `amount`, `voucher_code`, `product_unique_id`) VALUES (NULL, '$id_detail[id_no]', '$txnid', '$date', '$time', 'open', '$id_detail[name]', '$id_detail[mobile]', '$id_detail[email]', '$_POST[amount]', '', '$pas');";
      
      if($con->query($dscsvsvvv)===TRUE)
                      {
						   if(!$hash) { ?>
                          <input type="submit" name="submit_data" class="btn btn-success col-sm-12">
                          <?php } }
                          }?>
            
            
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
  