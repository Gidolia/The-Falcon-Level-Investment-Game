<?php
session_start();
session_destroy();
echo "<script>location.href='../Admin/login.php';</script>";
?>