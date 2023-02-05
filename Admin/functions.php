<?php 
//include "config.php";

function new_customer()
{
    global $con;
    $r=0;
    $s="SELECT * FROM `registration_form`";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
} 

//echo new_customer(1);
function new_customer_today()
{
    global $con, $date;
    $r=0;
    $s="SELECT * FROM `registration_form` WHERE `r_date`='$date'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
} 
////////Withdrawal Request//////
function withdrawal_request()
{
    global $con, $p;
    $r=0;
    $s="SELECT * FROM `withdrawal_record` WHERE `status`='p'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}
///////////////////////Withdrawl Cleared Requests//////////////////////
function withdrawal_cleared_request()
{
    global $con, $c;
    $r=0;
    $s="SELECT * FROM `withdrawal_record` WHERE `status`='y'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}

///////////////////////Withdrawl cancelled Requests//////////////////////
function withdrawal_cancel_request()
{
    global $con, $r;
    $r=0;
    $s="SELECT * FROM `withdrawal_record` WHERE `status`='r'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}


//////////////////////////////// Total Pending Recharge///////////////////////////
function total_pending_recharge()
{
    global $con, $tpr;
    $r=0;
    $s="SELECT * FROM `mobile_recharge_response` WHERE `recharge_status`='panding'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}


////////////////////////Total Successfully Recharge/////////////////////////////
function total_successfully_recharge()
{
    global $con, $tsr;
    $r=0;
    $s="SELECT * FROM `mobile_recharge_response` WHERE `recharge_status`='Success'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}

////////////////////////Total Fail Recharge/////////////////////////////
function total_Fail_recharge()
{
    global $con, $tfr;
    $r=0;
    $s="SELECT * FROM `mobile_recharge_response` WHERE `recharge_status`='Fail'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}

///////////////////////////Bank Details Approved/////////////////////////
function bank_approved()
{
    global $con, $ba;
    $r=0;
    $s="SELECT * FROM `bank_kyc` WHERE `status`='c'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}

///////////////////////////Bank Details Reject/////////////////////////
function bank_details_reject()
{
    global $con, $bdr;
    $r=0;
    $s="SELECT * FROM `bank_kyc` WHERE `status`='n'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}

///////////////////////////Change Bank Details/////////////////////////
function change_bank_derails()
{
    global $con, $cbd;
    $r=0;
    $s="SELECT * FROM `bank_kyc` WHERE `s_status`='p'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}


///////////////////////////total Deactivate Link/////////////////////////
function total_deactivate_link()
{
    global $con, $tdl;
    $r=0;
    $s="SELECT * FROM `task_handler` WHERE `status`='d'";
    $rs=$con->query($s);
    while($ss=$rs->fetch_assoc())
    {
        $r++;
    }
    return $r;
}


////////////////for create unique id///////////////////////////
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $pas=password_generate(15);
    $sqsqqs="SELECT * FROM `txn_handler` WHERE `product_unique_id`='$pas'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}


////////////////task_unique_id///////////////////////////
function task_unique_id($tui) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $tui);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $taskid= task_unique_id(10);
    $qqs="SELECT * FROM `task_handler_history` WHERE `task_unique_id`='$taskid'";
    $qukr=$con->query($qqs);
    if(mysqli_num_rows($qukr)==0)
    {
        break;
    }
}



//////////////////////function for distribute investment amount income///
function distribute_income($id_no){
    global $con,$date,$time;
    $dcd="SELECT * FROM `registration_form` WHERE `id_no`='$id_no';";
    $sdvv=$con->query($dcd);
    $detail=$sdvv->fetch_assoc();
    $investment_distribute_amt=$detail[Invest_wallet]*1/100;
    $a_bal=$detail[wallet_balance]+$investment_distribute_amt;
    $qsqs="UPDATE `registration_form` SET `wallet_balance` = '$a_bal' WHERE `registration_form`.`id_no` = '$id_no';";
    
    $wdfg="INSERT INTO `wallet_balance_history` (`wbh_id`, `id_no`, `date`, `time`, `amount`, `b_wallet_balance`, `a_wallet_balance`, `type`, `note`, `s_note`) VALUES (NULL, '$id_no', '$date', '$time', '$investment_distribute_amt', '$detail[wallet_balance]', '$a_bal', '+', 'Investment Return', 'Investment Return');";
    
    $fer="INSERT INTO `daily_return_record` (`drr_id`, `id_no`, `date`, `time`, `amount`, `invest_amount`, `percentage`) VALUES (NULL, '$id_no', '$date', '$time', '$investment_distribute_amt', '$detail[Invest_wallet]', '1');";
    if($con->query($qsqs)===TRUE && $con->query($wdfg)===TRUE && $con->query($fer)===TRUE)
    {
        return "success";
    }
    else{
        return "fail";
    }
}

//echo distribute_income(1);

?>