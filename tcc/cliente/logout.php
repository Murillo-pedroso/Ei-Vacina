<?php 

session_start();
session_unset();
session_destroy();
header("localhost/tcc/register.php");
echo ("<script>window.location.href='login.php';</script>");
exit();

?>