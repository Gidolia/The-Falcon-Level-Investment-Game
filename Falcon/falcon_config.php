<?php 
error_reporting(1);
include "../databade_cont.php";

$id_no="SELECT * FROM `registration_form` WHERE `email`='$_SESSION[email]' AND `password`='$_SESSION[password]'";
$ss=$con->query($id_no);
if($ss->num_rows==0)
{
	echo "<script>alert('Please login again');location.href='../login-form/index.html';</script>";
}else
$id_detail=$ss->fetch_assoc();
