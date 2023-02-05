<?php
include "falcon_config.php";
error_reporting(1);
if(isset($_POST[pass_change]))
{
if ($_POST[old_p]==$_SESSION[password])
{
if($_POST[new_p]==$_POST[con_p])

{

$dd="UPDATE `registration_form` SET `password`='$_POST[con_p]' WHERE `id_no`='$id_detail[id_no]';";
//echo $dd;

if($con->query($dd)===TRUE)
{
        	date_default_timezone_set('Asia/Calcutta');
        $time=date("h:i:sa");
        $date=date("Y-m-d");
	
	$ds="INSERT INTO `change_password_history` (`cph_id`, `c_id`, `date`, `time`, `b_password`, `a_password`,`email`,`id_no`) VALUES (NULL, '$id_detail[mobile]', '$date', '$time', '$_POST[old_p]', '$_POST[con_p]','$id_detail[email]','$id_detail[id_no]');";
	
	$con->query($ds);
	echo "success";
	echo "<script>alert('Success! Password chenge successfully');location.href='index.php';</script>";
	
}else{echo "fail";}
}else{echo "password not match";}
	
}else {echo "invalid old password! ";}
	
}	
	
	?>	