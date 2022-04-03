<?php session_start();
    session_destroy();
    session_start();
    $_SESSION['session-msg']='Unauthorised Access ';
    $_SESSION['session-type']='danger';
    header("location:../index.php"); die;
?>