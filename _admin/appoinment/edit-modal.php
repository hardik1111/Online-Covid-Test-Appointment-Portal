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
      <h5 class="modal-title font-weight-bold">Update slot for <?php echo $result['hospital_name']; ?>, on the Date <?php echo iFormat($result['slot_date']); ?> </h5>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <?php 

    ?>
    <!-- Modal body -->
    <div class="modal-body">
    <form method="post" action="_manage_slots.php">
      <table class="table text-center table-sm">
        <thead>
            <tr><th>Slot Number</th><th> Time </th><th>Action</th>
        </tbody>
        <tbody>
            <?php 
                $count=1;
                $query="SELECT slot_records.*,slot_times.* FROM `slot_records` RIGHT JOIN slot_times ON slot_records.slot_time_id=slot_times.slot_time_id AND slot_records.slot_id=$slotId ORDER BY slot_times.slot_time_id ASC ";
                $record=iFetchAll($query);
                foreach($record as $data)
                {
            ?>
            <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['start_time']; ?> To <?php echo $data['end_time']; ?></td>
                    <td>
                        <div class="icheck-primary d-inline">
                        <input type="checkbox" name="slot_time_id[]" value="<?php echo $data['slot_time_id']; ?>" <?php if($data['slot_id']!=""){echo "Checked"; }else{ echo "";} ?> id="checkbox<?php echo $data['slot_time_id']; ?>">
                        <label for="checkbox<?php echo $data['slot_time_id']; ?>">
                        </label>
                      </div>
                    </td>
            </tr>
            <?php $count++; } ?>
        <tbody>
      </table>
      <input type="hidden" name="action" value="_update_slots">
      <input type="hidden" name="slotId" value="<?php echo $slotId; ?>">
      <button type="submit" class="btn btn-success">Update Slot</button>
    </form>

    </div>
    
    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    
  </div>
</div>