<?php
include "../databade_cont.php";
if(isset($_POST[fgtp]))
{
        $to      = 'r975493@gmail.com';
        $subject = 'the subject';
        $message = 'hello';
       $headers = "hgvhvhgvjh";

mail($to, $subject, $message, $headers);
echo "OTP send";
echo "<script>location.href='change_password.php';</script>";
}else{echo "OTP send";}
?>