<?php 
    require_once '../../config/db_connect.php';
?>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Test Center</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="_manage_hosp.php" enctype="multipart/form-data" method="post" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="hos_name">Test Center Name</label>
                        <input type="text" class="form-control" id="hos_name" placeholder="Test Center Name" name="hos_name" required>
                    </div>
                    <div class="form-group">    
                        <label for="hos_number">Test Center Number</label>
                        <input type="text" class="form-control" id="hos_number" placeholder="Number" name="hos_number" pattern="[0-9]+" required>
                    </div>
                   
                    <div class="form-group">    
                        <label for="address">Address</label>
                        <textarea  class="form-control" id="address" placeholder="Address" name="address"></textarea>
                    </div>
                    <div class="form-group">    
                        <label for="pincode">Area Pincode</label>
                        <input type="text" pattern="[0-9]+" class="form-control" id="pincode" placeholder="Pincode" name="pincode">
                    </div>
                    
                </div>
                <div class="modal-footer ">
                    <input type="hidden" name="action" id="action" value="add_hospital">
                    <button type="submit" class="btn btn-primary" >Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

