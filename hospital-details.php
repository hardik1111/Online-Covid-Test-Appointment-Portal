<?php
require_once 'config/db_connect.php';
$hospitalId=$_POST['hospitalId'];
$dataArray=[];
$sql="SELECT * FROM `hospital` WHERE hospital_id=$hospitalId";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
    $data=mysqli_fetch_assoc($result);
    ?>
        
        <table class="table table-sm">
            <tr class="text-center py-2 bg-success"><th colspan=4> Test Center Details</th></tr>
            <tr><th>Test Center Name</th><td><?php echo $data['hospital_name']?></td> <th>Test Center Number</th><td><?php echo $data['hospital_number']?></td></tr>
            <tr><th>Address</th><td colspan=3><?php echo $data['hospital_address']?>, <?php echo $data['hospital_pincode']?></td></tr>
        </div>
   
    <?php 
} 
else
{
    echo $return ="Error";
}

?>