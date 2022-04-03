<?php session_start();
session_destroy();
unset($_SESSION['admin_id']);
session_start();
$_SESSION['session-msg']="Logout Successfully";
header("location:index.php");
?>