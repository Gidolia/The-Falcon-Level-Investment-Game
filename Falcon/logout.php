<?php
session_start();
session_destroy();
echo "<script>location.href='../login-form/index.html';</script>";
?>