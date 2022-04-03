<?php
require_once 'config/db_connect.php';
$hospitalId=$_POST['hospitalId'];
$date=$_POST['date'];
$sql="SELECT slot_id FROM `slots` WHERE hospital_id=$hospitalId AND slot_date='$date'";
$result=mysqli_query($conn, $sql);
$numRows=mysqli_num_rows($result);
if($numRows!=0)
{
    
    $data=mysqli_fetch_assoc($result);
    $slotId=$data['slot_id'];
    $dataArray=[];
    $query="SELECT slot_records.*,slot_times.* FROM slot_records INNER JOIN slot_times ON slot_records.slot_time_id=slot_times.slot_time_id WHERE slot_records.slot_id=$slotId ORDER BY slot_times.slot_time_id";
    //echo $query;
    $result=mysqli_query($conn, $query);
    echo "<div class='col-md-12 text-center font-weight-bold'> Available Slots</div>";
    while($data=mysqli_fetch_assoc($result))
    {
        $slotTimeId= $data['slot_time_id'];
        $countSlotsql="SELECT * FROM `appointments` WHERE hospital_id=$hospitalId AND slot_time_id=$slotTimeId AND appointment_date='$date'";
        $countResult=mysqli_query($conn, $countSlotsql);
        $availableSlot=mysqli_num_rows($countResult);
        $numOfPaitent=$data['number_of_paitent'];
        if($availableSlot!=$numOfPaitent)
        {
        ?>
            
            <div class="icheck-primary d-inline col-md-4 font-weight-bold ">
                <input type="radio" value="<?php echo $data['slot_time_id'];?>" id="timeSlotvalue=<?php echo $data['slot_time_id'];?>" name="time_slot" required="required">
                <label for="timeSlotvalue=<?php echo $data['slot_time_id'];?>"><b><?php echo $data['start_time'];?> To <?php echo $data['end_time'];?> </b></label>
            </div>
    
        <?php
        }       
    }

}
else
{
    echo 0;
    //echo "<div class='col-md-12 text-center font-weight-bold'> No Slots Available </div>";
}

?>