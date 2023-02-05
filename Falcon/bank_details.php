<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>bank Details</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
<style>
.center {
  margin: auto;
  width: 90%;
  border: 2px solid #73AD21;
  padding: 8px;
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
        <li class="breadcrumb-item active" aria-current="page">Bank Details</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-4 col-md-12">
                <div class="card-body">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Your bank accounts</h3>
                </div>
                    <div class="card-body">
                        <div class="center">
					  <?php
                  
$zx="SELECT * FROM `bank_kyc` WHERE `id_no`='$id_detail[id_no]' AND `status`='c'";
                  $xz=$con->query($zx);
	if($xz->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-success"><b>SUCCESS !</b> Bank Detail Submited Successfully</div>
               <form action="" method="POST">
                 <input value="250" name="amount" type="hidden">
    	          <button name="edit_bank" class="btn btn-success">Edit Bank</button>
	           </form>
<?php
} else{
$x="SELECT * FROM `bank_kyc` WHERE `id_no`='$id_detail[id_no]' AND `status`='n'";
                  $z=$con->query($x);
	if($z->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-danger"><b>sorry !</b> you have not provided actual information try again or photo is not clear</div>
<?php
}
                  $s="SELECT * FROM `bank_kyc` WHERE `id_no`='$id_detail[id_no]' AND `status`='p'";
                  $k=$con->query($s);
	if($k->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-info"><b>submited!</b> this photo may take some hour for verification</div>
<?php
}
else{ ?> 
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Passbook photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control1 form-control" name="bank_pass" required>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="bank_name" required>
                          
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank A/C No.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="acc_no" required>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">IFSC Code.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="ifsc" required>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Submit Bank Detail" name="bank_submit">
                        </div>
                      </div>
                      
                     </form>
<?php } }

//////////////////// start bank_img_name//////////////////////
function bank_img_name($bin) 
{
  $data = 'abcdefgh123456789';
  return substr(str_shuffle($data), 0, $bin);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $tbin=bank_img_name(8);
    $ismd="SELECT * FROM `bank_kyc` WHERE `bank_passbook_img`='$tbin'";
    $qr=$con->query($ismd);
    if(mysqli_num_rows($qr)==0)
    {
        break;
    }
}
/////////////////////// end bank_img_name///////////////////////////

 if(isset($_POST[bank_submit]))
            {
            //echo "123";
            	if (file_exists("bank_img/" .$id_detail[id_no].".jpg"))
        {
        unlink("bank_img/" .$id_detail[id_no].".jpg");
          echo $id_detail[id_no].".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["bank_pass"]["tmp_name"], "bank_img/".$tbin.".jpg"))
		{
            echo "Stored in: " . "bank_img/".$fileName;
            
            $sbug="INSERT INTO `bank_kyc` (`bnk_id`, `id_no`, `date`, `time`, `bank_name`, `bank_account_no`, `ifsc_code`, `bank_passbook_img`, `status`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$_POST[bank_name]', '$_POST[acc_no]', '$_POST[ifsc]', '$tbin.jpg', 'p');";
            if($con->query($sbug)==TRUE)
            {
                echo "<script>alert('bank detail submited Sucessfully');
		location.href='bank_details.php';</script>";
            }
           // else{ echo "<script>alert('Query failed please try again');
	//	location.href='bank_details.php';</script>";}
            }
            } ?>
                    </div>
                         
				           
			<?php
    
            $x="SELECT * FROM `bank_kyc` WHERE `id_no`='$id_detail[id_no]' AND `s_status`='n'";
                              $z=$con->query($x);
            	if($z->num_rows!=0)
            	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-danger"><b>sorry !</b> Bank edit request Reject</div>	           
			<?php
            	}
                  $s="SELECT * FROM `bank_kyc` WHERE `id_no`='$id_detail[id_no]' AND `s_status`='p'";
                  $k=$con->query($s);
               	if($k->num_rows!=0)
	          { ?>
                  <br>&nbsp;<br>
               <div class="alert alert-info"><b>submited!</b>&nbsp; Bank edit request successfully, may take some Days for verification</div>
             <?php
              }
            else{ ?> 
				         
				           
         <?php } 
                     if(isset($_POST[edit_bank]))
                     {
                       
                       $sql="UPDATE `bank_kyc` SET `s_status` = 'p' WHERE `bank_kyc`.`id_no` = '$id_detail[id_no]';";
                       echo $sql;
                        if ($con->query($sql) === TRUE) {
                          echo "<script>alert('Edit Bank Details successfully');
                          location.href='bank_details.php'</script>";
                        } 
                      
                    } 
                     ?>
				       
					</div>
					
			<div class="card-box table-responsive">
				        <table id="" class="table table-striped table-bordered" >
                    <thead>
                        <tr><th>Bank Name</th><th>IFSC code</th><th>A/C Number</th><th>Bank Passbook photo</th></tr>
                      </thead>

                      <tbody>
        <?php 
     $d=1;
     $rr="SELECT * FROM `bank_kyc` WHERE `id_no`='$id_detail[id_no]'";
     
     $r=$con->query($rr);
    
     while($s=$r->fetch_assoc()){ ?>
                      
                       <tr>
                          <td>
                            <?php echo $s["bank_name"];?>
                          </td>
                           <td>
                           <?php echo $s["ifsc_code"];?>
                            </td>
                           <td>
                             <?php echo $s['bank_account_no'];?>
                           </td>
                          
                         <td>
                            <a href="bank_img/<?php echo $s['bank_passbook_img'];?>">View Photo</a>
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
  