<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $empId=$_GET['empId']; 
   
    $dataArray=array('tableName'=>'employees','conditions'=>'WHERE id='.$empId);
    $record=iEdit($dataArray);
    
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Update <?php echo $record['name']; ?> Records</h2>
            </header>
            <form action="_manage_emp.php" method="POST">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empId">Employee ID</label>
                            <input type="text" class="form-control" id="empId" name="empId" placeholder="Employee ID" value="<?php echo $record['emp_id']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="empType">Employee Type</label>
                            <input type="text" class="form-control" id="empType" name="empType"
                                placeholder="Employee Type" value="<?php echo $record['emp_type']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empName">Name</label>
                        <input type="text" class="form-control" id="empName" name="empName" placeholder="Employee Name" value="<?php echo $record['name']; ?>">
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empDob">Date of Birth</label>
                            <input type="date" class="form-control" id="empDob" name="empDob"
                                placeholder="Date of Birth" value="<?php echo $record['dob']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="empDoj">Date of Joining</label>
                            <input type="date" class="form-control" id="empDoj" name="empDoj"
                                placeholder="Date of Joining" value="<?php echo $record['doj']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empAddr">Address</label>
                        <textarea class="form-control" id="empAddr" name="empAddr"
                            placeholder="Apartment, City, State, Pincode"><?php echo $record['address']; ?></textarea>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empContact">Employee Number</label>
                            <input type="number" class="form-control" id="empContact" name="empContact"
                                placeholder="Employee Number" value="<?php echo $record['contact']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="empEmail">Email</label>
                            <input type="email" class="form-control" id="empEmail" name="empEmail"
                                placeholder="Employee Email" value="<?php echo $record['email']; ?>">
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success modal-confirm">Update</button>
                            <input type="hidden" value="_update_employee" name="action">
                            <input type="hidden" name="empId" value="<?php echo $record['id']; ?>">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>

    </div>
</div>