<?php
include "config.php";
include "functions.php";
$dcd="SELECT * FROM `registration_form`;";
$sdvv=$con->query($dcd);
while($detail=$sdvv->fetch_assoc())
{
    
    distribute_income($detail[id_no]);
   // echo $detail[id_no]." Success<br>";
}
	echo "<script>alert('Today Distribute Income Successfully')</script>";
echo "<script>location.href='today_distribute_income_list.php?d=s';</script>";

?>
