<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $adminId=$_GET['adminId']; 
   
    $dataArray=array('tableName'=>'all_admins','conditions'=>'WHERE email='."'$adminId'");
    $record=iEdit($dataArray);
    
?>
<div class="modal-dialog modal-md">
    <div class="modal-content">

        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Update <?php echo $record['name']; ?> Records</h2>
            </header>
            <form action="_manage_profile.php" method="POST"  enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="admin_id">User Name/Email</label>
                            <input type="text" class="form-control" id="admin_id" name="admin_id" placeholder="Employee ID" value="<?php echo $record['email']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="adminRole"> Role</label>
                            <input type="text" class="form-control" id="adminRole" name="adminRole"
                                placeholder="Role" value="<?php echo $record['role']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminName">Name</label>
                        <input type="text" class="form-control" id="adminName" name="adminName" placeholder="Employee Name" value="<?php echo $record['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="adminName">Profile Photo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profilePhoto" name="profilePhoto">
                            <label class="custom-file-label" for="profilePhoto">Choose file</label>
                        </div>
                        <input type="hidden" name="old_profile" value="<?=$record['profile_photo']?>">
                    </div>
                    
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success modal-confirm">Add Employee</button>
                            <input type="hidden" value="_update_profile" name="action">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>

    </div>
</div>