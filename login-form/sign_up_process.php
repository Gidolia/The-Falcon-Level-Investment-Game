<?php
include "../databade_cont.php";

function password_generate($chars) 
{
  $data = '123456789';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $refcode=password_generate(4);
    $sqsqqs="SELECT * FROM `registration_form` WHERE `ref_code`='FAL$refcode'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}


if(isset($_POST[Reg]))
{
if($_POST[password]==$_POST[c_password])
{    
    $shdg="select max(id_no) as max from registration_form";
    $hhs=$con->query($shdg);
        $row=$hhs->fetch_assoc();
        $id_no=$row['max'];
        $id_no=$id_no+1;
        
 $ss="INSERT INTO `registration_form` (`id_no`, `username`, `password`, `name`, `mobile`, `ref_code`, `email`, `Withdraw`, `adhar_card`, `wallet_balance`, `d_o_b`, `address`, `city`, `state`, `pancard_no`, `alt_mobile`, `status`, `Invest_wallet`, `r_date`, `shere_ref_code`) VALUES ('$id_no', '$_POST[m_number]', '$_POST[c_password]', '$_POST[full_name]', '$_POST[m_number]', '$_POST[refarence]', '$_POST[email]', '00.0', '', '00.0', '', '', '', '', '', '', '', '00.0', '$date', 'FAL$refcode');";
    
if($con->query($ss)===TRUE)
{
    $id_no=($id_no+45)*156879;
    //echo "sucsses";
	echo "<script>alert('Registration successfully');location.href='reg_successful.php?id_no=".$id_no."';</script>";
}else{echo "fail";}
}else{echo "confirm password not matched";}
}
?>

<?php /*
include "config.php";
if(isset($_POST[ad_submit]))
{
 $ss="INSERT INTO `admin_password` (`sr_no`, `id`, `password`) VALUES 
 (NULL, '$_POST[u_name]', '$_POST[password]');"; 
//$ss="INSERT INTO `admin_password` (`id_no`, `id`, `password`) 
//VALUES ('NULL', '$_POST[u_name]', '$_POST[password]');";

if($con->query($ss)===TRUE)
{
	echo "success";
	echo "<script>location.href='index.html';</script>";
	
}else{echo "fail";}

}
*/
?>