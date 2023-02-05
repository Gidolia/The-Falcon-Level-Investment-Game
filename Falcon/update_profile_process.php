<?php
include "falcon_config.php";
if(isset($_POST[update_profile]))
{
$s="UPDATE `registration_form` SET `adhar_card`='$_POST[adhr_card]',`d_o_b`='$_POST[d_o_b]',`address`='$_POST[address]',`city`='$_POST[city]',`state`='$_POST[state]',`pancard_no`='$_POST[pan_card]',`alt_mobile`='$_POST[alt_mobile]' WHERE `id_no`='$id_detail[id_no]';";

if($con->query($s)===TRUE)
{
	echo "success";
	echo "<script>alert('Success! Profile Updete successfully');location.href='my_profile.php';</script>";
	
}else{echo "fail";}
}
?> 