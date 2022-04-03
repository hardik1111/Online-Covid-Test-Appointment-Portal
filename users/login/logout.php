<?php session_start();
session_destroy();
unset($_SESSION['user_id']);
$_SESSION['session-msg']="Logout Successfully";
header("location:index.php");

?>