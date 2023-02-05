
<?php
    include "falcon_config.php";
    if(isset($_POST[ad_amount]))
            {
                echo $id_detail[wallet_balance];
                $ad=$id_detail[wallet_balance]+$_POST[amount];       
            if($ad>=0)
            {
        
        $sr="INSERT INTO `main_wallet` (`mw_id`, `id_no`, `date`, `time`, `amount`, `a_amount`, `note`, `type`) VALUES (NULL, '$id_detail[id_no]', '$date', '$time', '$ad', '$id_detail[wallet_balance]', 'self add money', '+');";
        $dd="UPDATE `registration_form` SET `wallet_balance`='$ad'WHERE `registration_form`.`id_no` = '$id_detail[id_no]';";
        $dy="INSERT INTO `ad_wallet_record` (`awr_no`, `id_no`, `date`, `time`, `amount`, `trn_id`, `notes`, `type`) VALUES (NULL, '$id_detail[mobile]', '$date', '$time', '$_POST[amount]', 'addmoney11115', 'aaaaaa', '+ Self ');";
    if($con->query($sr)===TRUE && $con->query($dd)===TRUE && $con->query($dy)===TRUE)
        {
        	echo "success";
        	echo "<script>alert('Success! Amount Add successfully');location.href='add_money.php';</script>";
        	
    }
    }
    }
        ?>