<?php

include("../databade_cont.php");

	$status=$_POST["status"];
	
	$firstname=$_POST["firstname"];
	$amount=$_POST["amount"];
	$txnid=$_POST["txnid"];
	$posted_hash=$_POST["hash"];
	$key=$_POST["key"];
	$productinfo=$_POST["productinfo"];
	$email=$_POST["email"];
	$e_id=$_POST["e_id"];
	$salt="kb8BVBdmaO";
	
	//echo $status;
	
	
	If (isset($_POST["additionalCharges"])) {
		   $additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

					  }
		else {	  

			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

			 }
			 $hash = hash("sha512", $retHashSeq);

		   if ($hash != $posted_hash) {
			   echo "Invalid Transaction. Please try again";
			   }
		   else {
		       
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
		       

$edfffff="SELECT * FROM `wallet_balance_history` WHERE `txn_id`='$txnid'";
$aop=$con->query($edfffff);
if($aop->num_rows==0)
{
$sax="SELECT * FROM `txn_handler` WHERE `txn_id`='$txnid'";
$qu=$con->query($sax);
$id_detail=mysqli_fetch_assoc($qu);
$asa="SELECT * FROM `registration_form` WHERE `id_no`='$id_detail[id_no]'";
$edd=$con->query($asa);
$ibo=mysqli_fetch_assoc($edd);

if($status=="success")
{
    $bal=$ibo[wallet_balance]+$_POST["amount"];
    
    $ssdf="UPDATE `registration_form` SET `wallet_balance` = '$bal' WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
   
    
     $sxe="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`, `trn_id`) VALUES (NULL, '$ibo[id_no]', '$date', '$time', '$_POST[amount]', '$ibo[wallet_balance]', '$bal', '+', 'Add Money', '', '$txnid');";
    
    $sccccvv="UPDATE `txn_handler` SET `status` = 'Success' WHERE `txn_handler`.`txn_id` = '$txnid';";
    
    
    if($con->query($ssdf)===TRUE && $con->query($sxe)===TRUE && $con->query($sccccvv)===TRUE)
    {
        echo "Success";
        echo "<script>alert('Success ! Amount added to your account successfully'); location.href='my_invites.php';</script>";
    }
    else{
         $fail="INSERT INTO `fail_report` (`fr_id`, `id_no`, `date`, `time`, `url`, `failed_type`, `fail_amount`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$url', 'Add money', '$bal');";
    	       $con->query($fail);
    	       echo "fail";
        echo "<script>alert('Failed ! sorry some problem '); location.href='add_money.php';</script>";
    }
}else{echo "<script>alert('Failed ! sorry some problem occours'); location.href='add_money.php';</script>";
}
}else{echo "<script>alert('Success ! Amount added to your account successfully'); location.href='add_money.php';</script>";}
}


?>