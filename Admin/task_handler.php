<?php include "config.php";
include "functions.php"
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Task Handler</title>

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
        <li class="breadcrumb-item active" aria-current="page">Task Handler</li>
      </ol>
    </nav>
    
 <!-- forms  -->
            <div class="card card_border py-2 mb-4 col-md-12">
                <div class="card-body">
				<div class="cards__heading" style="text-align:center;" >
                    <h3>Task Handler</h3>
                </div>
                <form method="post">
                <div class="form-row">
                <td class="form-control">Add Link</td> &nbsp;&nbsp;&nbsp;&nbsp;
                <td ><select  class="form-control col-md-2" name="add_select" required>
                    <option value="">select</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="YouTube">YouTube</option>
                    <option value="Pinterest">Pinterest</option>
                    <option value="Instagram">Instagram</option>
                    <option value="WhatsApp">WhatsApp</option>
                </select></td>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control input-lg col-md-6" class="form-group" value=""  name="url" type="text" placeholder="Paste to link here..." required >&nbsp;&nbsp;&nbsp;<br/><br/>
                <input class="form-control input-lg col-md-7" class="form-group" value=""  name="desc" type="text" placeholder="Description" required >&nbsp;
                
                <input class="form-control input-lg col-md-2 btn btn-success" class="form-group"  name="sub_link" type="submit" >
               
                <br/><br/>
                </form>
                
                <?php
                    
                    if(isset($_POST[sub_link]))
                    {
                    $ds="INSERT INTO `task_handler` (`th_id`, `date`, `time`, `link`, `note`, `status`, `description`) VALUES (NULL, '$date', '$time', '$_POST[url]', '$_POST[add_select]', 'a', '$_POST[desc]');";
                    //$fd="UPDATE `task_handler_history` SET `s_notes` = 'a';";
                    if($con->query($ds)===TRUE)
                    {
                        echo "success";
                        echo "<script>alert('Success! Add Link successfully');location.href='task_handler.php';</script>";
                    }
                    }
                    
                    ?>
                
                
                <div class="card card_border py-2 mb-4 col-md-12">
                 <div class="card-body">
               <a href="deactivate_link.php">
                Deactivate Link (<?php echo total_deactivate_link($tdl);?>)
                
                </a>
                <div class="card-box table-responsive">
                     <table id="" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Sr.no.</th>
                          
                          
                          <th>Url</th>
                          <th>Date/Time</th>
                          <th>Note</th>
                          <th>Link Delete</th>
                          </tr>
                      </thead>
                      <tbody>
     <?php 
     $rs=1;
     $rr="SELECT * FROM `task_handler` WHERE `status`='a'";
     $r=$con->query($rr);
     
     while($s=$r->fetch_assoc()){ ?>
                    <tr>
                          <td>
                              <?php echo $s['th_id']; ?>
                          </td>
                          <td>
                              <?php echo $s['link']; ?>
                          </td>
                          
                          <td>
                              <?php echo $s['date']." ".$s['time']; ?>
                          </td>
                          <td>
                              <?php echo $s['note'] ?>
                          </td>
                       
    
                         <td>
                            <form method="post">  
                        <input type="hidden" name="th_id" value="<?php echo $s['th_id']; ?>">
                        
                        <button name="Delete_link" class="btn btn-danger">Delete link</button>
                        </form> 
                            <?php
                     if(isset($_POST[Delete_link]))
                     {
                       
                       $gdf="UPDATE `task_handler` SET `status` = 'd' WHERE `task_handler`.`th_id` = '$_POST[th_id]';";
                      // echo $gdf;
                        if ($con->query($gdf) === TRUE) {
                          echo "<script>alert('deactivate link successfully');
                         location.href='task_handler.php'</script>";
                        } 
                      
                    } 
                     ?>        
                                 
                          </td>
                          
                             
        </tr>
        <?php $rs++;
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
         
  