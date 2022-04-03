<?php session_start(); ?>
<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $leadId=$_GET['leadId']; 
    $dataArray=array('tableName'=>'information','conditions'=>'WHERE info_id='.$leadId);
    $record=iEdit($dataArray);
    if(isset($_SESSION['user_id']))
    {
        $emp_id=$_SESSION['user_id'];
    }
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Update <?php echo $record['name']; ?>'s Profile</h2>
            </header>
            <form action="../includes/actions.php" method="POST">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6 mb-2">
                            <label for="name">Client Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Employee Name" value="<?php echo $record['name']; ?>">
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="shopName"> ShopName</label>
                                <input type="text" class="form-control" id="shopName" name="shopname" placeholder="Employee Shop Name" value="<?php echo $record['shop_name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                            <input type="text" class="form-control" pattern="[0-9]+" id="phone" name="phone"
                                placeholder="Employee Phone" value="<?php echo $record['phone']; ?>">
                            </div>
                        </div>
                         <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="whatsapp">Whatsapp Number</label>
                            <input type="text" class="form-control" pattern="[0-9]+" id="whatsapp" name="whatsapp"
                                placeholder="Whatsapp Number" value="<?php echo $record['whatsapp']; ?>" >
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Client Email" value="<?php echo $record['email']; ?>">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="pincode">Pincode/Zipcode</label>
                            <input type="number" class="form-control" id="pincode" name="pincode"
                                placeholder="PinCode" value="<?php echo $record['pincode']; ?>">
                        </div>
                        
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address"
                                placeholder="Apartment, City, State, Pincode"><?php echo $record['address']; ?></textarea>
                             </div>
                        </div>
                        
                    </div>
                    
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success modal-confirm">Update Profile</button>
                            <input type="hidden" value="update_client" name="action">
                            <input type="hidden" name="leadId" value="<?php echo $record['info_id']; ?>">
                            <input type="hidden" name="empId" value="<?php echo $emp_id; ?>">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>

    </div>
</div>