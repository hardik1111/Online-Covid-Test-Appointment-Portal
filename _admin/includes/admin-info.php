<?php
$adminId=$_SESSION['admin_id']; 
$dataArray=array('tableName'=>'all_admins','conditions'=>'WHERE email='."'$adminId'");
$adminData=iFetch($dataArray);

?>