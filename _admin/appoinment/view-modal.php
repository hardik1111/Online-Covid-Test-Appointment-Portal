<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $slotId=$_GET['slotId']; 
   
    $query="SELECT slots.slot_id,slots.slot_date,hospital.hospital_id,hospital.hospital_name FROM slots INNER JOIN hospital ON slots.hospital_id=hospital.hospital_id WHERE slots.slot_id=$slotId";
    
    $record=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($record);
    
?>
<!-- The Modal -->
<div class="modal-dialog modal-lg">
  <div class="modal-content">
  
    <!-- Modal Header -->
    <div class="modal-header">
      <h5 class="modal-title font-weight-bold">Details for <?php echo $result['hospital_name']; ?>,  Date <?php echo iFormat($result['slot_date']); ?> </h5>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <?php 

    ?>
    <!-- Modal body -->
    <div class="modal-body">
      <table class="table text-center">
        <thead>
            <tr><th>Slot Number</th><th> Time </th><th>Number of Paitent</th>
        </tbody>
        <tbody>
            <?php 
                $count=1;
                $query="SELECT slot_records.slot_id,slot_records.slot_time_id,slot_times.slot_time_id,slot_times.start_time,slot_times.end_time,slot_times.number_of_paitent FROM slot_records INNER JOIN slot_times ON slot_records.slot_time_id=slot_times.slot_time_id WHERE slot_records.slot_id=$slotId";
                $record=iFetchAll($query);
                foreach($record as $data)
                {
            ?>
            <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['start_time']; ?> To <?php echo $data['end_time']; ?></td>
                    <td><?php echo $data['number_of_paitent']; ?></td>
            </tr>
            <?php $count++; } ?>
        <tbody>
      </table>
    </div>
    
    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    
  </div>
</div>