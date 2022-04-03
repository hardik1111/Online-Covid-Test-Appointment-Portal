<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $empId=$_GET['empId']; 
   
    $dataArray=array('tableName'=>'employees','conditions'=>'WHERE id='.$empId);
    $record=iFetch($dataArray);
    
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Showing Details of <?php echo $record['name']; ?> Records</h2>
            </header>
            <div class="card-body">
                <div class="row mb-2">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>EMP ID</th>
                                <td><?php echo $record['emp_id']; ?></td>
                                <th>Date of Joining</th>
                                <td><?php echo iFormat($record['doj']); ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $record['name']; ?></td>
                                <th>Contact Number</th>
                                <td><?php echo $record['contact']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $record['email']; ?></td>
                                <th>Employee Type</th>
                                <td><?php echo $record['emp_type']; ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo iFormat($record['dob']); ?></td>
                                <th>Date of Joining</th>
                                <td><?php echo iFormat($record['doj']); ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo $record['status']; ?></td>
                                <th>Date of Registration</th>
                                <td><?php echo iFormat($record['reg_date']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </footer>
        </section>

    </div>
</div>