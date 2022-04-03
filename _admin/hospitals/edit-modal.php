<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $hospId=$_GET['hospId']; 

    $dataArray=array('tableName'=>'hospital','conditions'=>'WHERE hospital_id='.$hospId);
    $record=iEdit($dataArray);
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Update <?php echo $record['hospital_name']; ?></h2>
            </header>
            <form action="_manage_hosp.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="hos_name">Test Center Name</label>
                        <input type="text" class="form-control" id="hos_name" placeholder="Test Center Name" name="hos_name" value="<?php echo $record['hospital_name']; ?>" required>
                    </div>
                    <div class="form-group">    
                        <label for="hos_number">Test Center Number</label>
                        <input type="text" class="form-control" id="hos_number" placeholder="Number" name="hos_number" pattern="[0-9]+" value="<?php echo $record['hospital_number']; ?>" required>
                    </div>
                    <div class="form-group">    
                        <label for="pincode">Area Pincode</label>
                        <input type="text" pattern="[0-9]+" class="form-control" id="pincode" placeholder="Pincode" name="pincode" value="<?php echo $record['hospital_pincode']; ?>">
                    </div>
                    <div class="form-group">    
                        <label for="address">Address</label>
                        <textarea  class="form-control" id="address" placeholder="Address" name="address"><?php echo $record['hospital_address']; ?></textarea>
                    </div>    
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success modal-confirm">Update</button>
                            <input type="hidden" value="_update_hospital" name="action">
                            <input type="hidden" name="hospId" value="<?php echo $record['hospital_id']; ?>">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>

    </div>
</div>