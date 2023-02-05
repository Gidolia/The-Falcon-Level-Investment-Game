<?php include("../databade_cont.php");

$e = $_REQUEST['e'];
//$e="r975493@gmail.com";

$hint = "";

// lookup all hints from array if $q is different from ""
if ($e !== "") {
  $sqlkj="SELECT email FROM `registration_form` WHERE `email`='$e'";
  $dfgh=$con->query($sqlkj);
	if($dfgh->num_rows > 0)
	{
	
	$hint="This Email id is Already Register";
	}
	else
	{
	    $hint="Correct";
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint;

?>