<?php
 //File are include in db_connect.php
 
$empChar='EMP'; //Charecter Employee Registration 
$empDigit=1001; //Count Employee Registration 
$currentDate=date('Y-m-d');

################### Site Configurations Data Start ###############################
$dataArray=array('tableName'=>'configurations','conditions'=>'WHERE id=1');
$record=iFetch($dataArray);
$GLOBALS['siteName']=$record['site_name'];
$GLOBALS['siteDomain']=$record['domain_name'];
$GLOBALS['logo']=$record['logo'];
$GLOBALS['favicon']=$record['favicon'];

################### Site Configurations Data End ###############################

$myName="Shekhar";
$month=array('1'=>'January','2'=>'Fabruary','3'=>'March');


?>