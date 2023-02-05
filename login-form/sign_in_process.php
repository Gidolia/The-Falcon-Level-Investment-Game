<?php
error_reporting(1);
include "../databade_cont.php";
if(isset($_POST[login]))
{
	$ax="SELECT * FROM `registration_form` WHERE `email`='$_POST[email]' AND `password`='$_POST[password]'";
	$dd=$con->query($ax);
	if($dd->num_rows>0)
	{
		$fet=$dd->fetch_assoc();
		$_SESSION[email]=$fet[email];
		$_SESSION[password]=$fet[password];
		echo "<script>location.href='../Falcon/index.php';</script>";
	}else{echo "<script>alert('invalid user name or password');location.href='index.html';</script>";}
}
?>