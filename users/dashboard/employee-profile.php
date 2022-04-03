<?php require_once '../header.php';
$emp_id=$_SESSION['user_id'];
$query="SELECT * FROM `employees` WHERE emp_id='$emp_id' and status='Active'";
$result=mysqli_query($conn,$query);
$emp_data=mysqli_fetch_assoc($result);
 ?>

<header class="page-header">
    <h2>PROFILE</h2>
</header>
<style type="text/css">
    
</style>
<!-- start: page -->
<div class="row">
    <div class="col-sm-12">
        <?php include_once '../includes/session_flash.php'; ?>
        <div class="whitebox">
            <div class="profile-container">
                <div class="profile-item text-center">
                    <img src="../../uploads/users/<?php echo $emp_data['photo']; ?>" onerror="this.onerror=null;this.src='../../uploads/default.png'" />
                    <div class="text-center "><b>Employee ID: </b> <?php echo $emp_data['emp_id']; ?></div>
                </div>
                <div class="profile-item">
                     <div class="profile-inner-container mobile-padding-grid">
                            <div class="profile-inner-item label">
                                Name
                            </div>
                            <div class="profile-inner-item">
                                <?php echo $emp_data['name']; ?>
                            </div>
                             <div class="profile-inner-item label">
                                Email
                            </div>
                            <div class="profile-inner-item">
                                <?php echo $emp_data['email']; ?>
                            </div>
                            <div class="profile-inner-item label">
                                Type
                            </div>
                            <div class="profile-inner-item">
                                <?php echo $emp_data['emp_type']; ?>
                            </div>   
                            <div class="profile-inner-item label">
                                Status
                            </div>
                            <div class="profile-inner-item">
                                <?php echo $emp_data['status']; ?>
                            </div>
                            <div class="profile-inner-item label">
                                Address
                            </div>
                            <div class="profile-inner-item">
                                <?php echo $emp_data['address']; ?>
                            </div>    
                        
                      </div>          
                </div>
            </div>
            <div class="text-right">
                <button class="btn-primary btn btn-sm" onclick="show_editprofile()">Edit Profile</button>
            </div>
        </div>
    </div>

    <div class="col-sm-12" id="editprofile">
        <div class="whitebox">
            <form action="../includes/actions.php" method="post" enctype="multipart/form-data">
                <label>Name</label>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $value = $emp_data['name']!='' ? $emp_data['name'] : '' ; ?>">
                </div>
                <label>Email</label>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $value = $emp_data['email']!='' ? $emp_data['email'] : '' ; ?>">
                </div>
                <label>Address</label>
                <div class="form-group">
                    <textarea name="address" class="form-control" placeholder="Enter Address"><?php echo $value = $emp_data['address']!='' ? $emp_data['address'] : '' ; ?>></textarea>
                </div>
                <label>Profile Picture</label>
                <div class="form-group">
                    <input type="file" name="photo" class="form-control">
                </div>
                <input type="hidden" name="action" value="profile_update">
                <input type="hidden" name="empId" value="<?php echo $emp_id; ?>">
                <div class="text-right">
                <input type="submit" class="btn btn-success mt-3 btn-sm text-right" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function show_editprofile()
    {
      $("#editprofile").show("slow");  
        scrollToAnchor('editprofile');
        function scrollToAnchor(aid){
            var aTag = $("#"+aid);
            $('html,body').animate({scrollTop: aTag.offset().top},'slow');
        }
    }
</script>
<!-- end: page -->
<?php require_once '../footer.php'; ?>