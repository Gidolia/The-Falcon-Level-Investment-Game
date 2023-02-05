<?php include "falcon_config.php";?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Today's Task</title>

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
        <li class="breadcrumb-item active" aria-current="page">Today's Task</li>
      </ol>
    </nav>
    
 <!-- forms  --><div class="">
            <div class="card card_border py-2 mb-4 col-md-12" >
                <div class="card-body" class="center">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Today's Task</h3>
                </div>
                    <div class="card-body">
					 <div class="form-group col-md-12">
                    
					 <form method="post">
                <div class="form-row">
               
                
                <input class="form-control input-lg col-md-1 btn btn-danger" class="form-group"  name="sub_share" value="Share Link" type="submit" ></input>&nbsp;
                
                <input class="form-control input-lg col-md-1 btn btn-danger" class="form-group"  name="sub_link" value="Like" type="submit" ></input>&nbsp;&nbsp;
                
                
                &nbsp;
                
                <br/><br/>
                </form> 
                
            <?php
                    
                if(isset($_POST[ph_submit]))
                    
                     /* $dv="SELECT * FROM `task_handler`"; 
                      $ss=$con->query($dv);
                      $s=$ss->fetch_assoc();*/
                      
                    {
                    $rr="SELECT * FROM `task_handler`";
                      $ss=$con->query($rr);
                      $rs=$ss->fetch_assoc();
                      
                    $ds="INSERT INTO `task_handler_history` (`thh_id`, `th_id`, `id_no`, `date`, `time`, `file_name`, `notes`) VALUES (NULL, '$rs[th_id]', '$id_detail[id_no]', '$date', '$time', '$_POST[sub_file]', 'task');";
                   
                    if($con->query($ds)===TRUE)
                    {
                        echo "success";
                        echo "<script>alert('Success! Complete Task successfully');location.href='today_task.php';</script>";
                    }
                    }
                    
                    ?>
                    
				</div>		
            </div>
        </div>
        <div class="card-body" class="table-sm">
				<div class="cards__heading" style="text-align:laft;" >
                    <h3>Today's Task</h3>
                </div>
                <a href="task_history.php">
                <input class="form-control input-lg col-md-2 btn btn-primary" class="form-group"  name="tast_histoty" value="Task History" type="submit" ></input>
                </a>
            <div class="card-box table-responsive">
                 <table  class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                          <th>Url</th>
                          <th>Description</th>
                          <th>Click Now</th>
                          <th>file Upload(Screenshot, Photos)</th>
                          
                          </tr>
                      </thead>
                      <tbody>
     <?php 
      if(isset($_POST[tast_histoty]))
     $rs=0;
     $rr="SELECT * FROM `task_handler` WHERE `status`='a'";
     $r=$con->query($rr);
      while($s=$r->fetch_assoc()){ 
      $a++;
      $as= date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($s[date].$s[time])));
      if(strtotime($date.$time)<strtotime($as))
      {
         if($id_detail[Invest_wallet]>0) 
         {
      
        ?>
  
                        <td>
                              <?php echo $a; ?>
                          </td>
                         
                          <td>
                              <?php echo $s["link"]; ?>
                           
                          </td>
                          <td>
                              <?php echo $s["description"]; ?>
                          </td>
                           <td>
                             <a href="<?php echo $s['link']; ?>" target="_blank">
                            <button type="button" class="btn btn-success">Click Now</button>
                            </a>
                  
                          </td>
                          <td>
                              <?php
                              $sdsdsdsd="SELECT * FROM `task_handler_history` WHERE `th_id`='$s[th_id]' AND `id_no`='$id_detail[id_no]'";
                              $mk=$con->query($sdsdsdsd);
                              if($mk->num_rows==0)
                              {
                              ?>
                 <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                     <input class="form-control input-lg col-md-12" class="form-group" value=""  name="sub_file" type="file" placeholder="Paste to link here..." >
                     <input value="<?php echo $s['th_id']; ?>"  name="th_id" type="hidden" >
                 <input class="form-control input-lg col-md-4 btn btn-success" class="form-group"  name="task_submit" type="submit" required>
                  </form>
                    <?php }?>
                 </td>
              
                </tr>

 <?php $rs++;
         }
      }
      }?>       
              </tbody>
            </table>
<?php
$csc="SELECT * FROM `task_handler`";
 $dscsdf=$con->query($csc);
 $gsvxg=$dscsdf->fetch_assoc();
?>

            
         </div>
           
<?php 
//////////////////// start today_task_img_name//////////////////////
function task_img_name($tin) 
{
  $data = '123456789abcdefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $tin);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $ttin=task_img_name(20);
    $imd="SELECT * FROM `task_handler_history` WHERE `file_name`='$ttin'";
    $qusr=$con->query($imd);
    if(mysqli_num_rows($qusr)==0)
    {
        break;
    }
}
/////////////////////// end today_task_img_name///////////////////////////


if(isset($_POST[task_submit]))
            {
            //echo "123";
            	if (file_exists("task_img/" .$ttin.".jpg"))
        {
        unlink("task_img/" .$ttin.".jpg");
          echo $ttin.".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["sub_file"]["tmp_name"], "task_img/".$ttin.".jpg"))
		{
       
           $sbug="INSERT INTO `task_handler_history` (`thh_id`, `th_id`, `id_no`, `date`, `time`, `file_name`, `notes`, `status`, `amount`, `task_unique_id`, `Task_link`, `add_option`) VALUES (NULL, '$gsvxg[th_id]', '$id_detail[id_no]', '$date', '$time', '$ttin.jpg', 'task', 'p', '', '', '$gsvxg[link]', '$gsvxg[note]');";
         // echo $sbug;
         //  $dsc="UPDATE `task_handler` SET `status`='submit' WHERE `task_handler`.`th_id` = '$gsvxg[th_id]';";
          // echo $dsc;
            //$sbug="INSERT INTO `task_handler_history` (`thh_id`, `th_id`, `id_no`, `date`, `time`, `file_name`, `notes`, `status`) VALUES (NULL, '$rs[th_id]', '$id_detail[id_no]', '$date', '$time', '$rs[th_id].jpg', 'task', 'p');";
            if($con->query($sbug)==TRUE)
            {
               echo "<script>alert(' Today Task submited Sucessfully');
		         location.href='task_history.php';</script>";
            }
           else{ echo "<script>alert('Query failed please try again');
	    location.href='task_history.php';</script>";}
            }
            } ?>
            
                
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
  