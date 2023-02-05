<?php
//error_reporting(E_ERROR | E_PARSE);
$host="localhost";
$username="the_falcon";
$pass="the_falcon";
$db_name="the_falcon";
date_default_timezone_set('Asia/Calcutta');
        $time=date("h:i:s A");
        $date=date("Y-m-d");
/////////////////connection
$con=new MySQLi($host, $username, $pass, $db_name);

if($con->connect_error)
{
	die("connection failed: " . $con->connect_error);

}

session_start();
?>