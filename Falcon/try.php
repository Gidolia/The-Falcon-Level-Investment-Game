<?php 
  include "falcon_config.php";
  $as= date("Y-m-d H:i:s", strtotime('-5 hours', strtotime($date.$time)));
  echo $as."<br>";
  echo $date." ".$time;
 	//echo date ("Y-m-d", strtotime("+1 day", strtotime($date)));
  if(strtotime($date.$time)>strtotime($as))
  {echo "true";
  }
  else{ echo "<br>false";}
?>