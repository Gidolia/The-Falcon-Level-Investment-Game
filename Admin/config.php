<?php 
error_reporting(1);
include "../databade_cont.php";
{
$id="SELECT * FROM `admin_password` WHERE `id`='$_SESSION[u_name]' AND `password`='$_SESSION[password]'";
$dd=$con->query($id);
if($dd->num_rows==0)
{
	echo "<script>alert('Please login again Admin');location.href='../Admin/login.php';</script>";
}
}
$id_detail=$dd->fetch_assoc();
