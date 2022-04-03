<?php require_once '../header.php';
     //require_once 'add-modal.php';
?>

<header class="page-header">
    <h2>Employee</h2>
</header>

<?php $addModalUrl="add-modal.php" ?>
<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card ">
            <div class="card-body">
                <div class="btn-group pb-4">
                    <button type="button" class="btn btn-success"
                        onclick="javascript:show_modal('<?php echo $addModalUrl; ?>')"><i class="fa fa-user"></i>
                        Add Employee</button>

                    <button type="button" class="btn btn-danger" id="delete-btn"> <i class="fa fa-trash"></i> Delete</button>
                    <!-- <input type="checkbox" id="checkAll" > -->
                    <div class="custom-control custom-checkbox checkbox-xl chk-div">
                        &nbsp;<input type="checkbox" class="custom-control-input" id="checkAll">
                        <label class="custom-control-label" for="checkAll">Select All</label>
                    </div>
                </div>

                <form method="post" name="delete_form" id="delete_form" action="_manage_emp.php">
                    <div class="row ">
                        <?php 
                        $query="SELECT * FROM `employees` ORDER BY emp_digit ASC ";
                        $result=mysqli_query($conn,$query);
                        while($record=mysqli_fetch_assoc($result))
                        {
                        ?>
                        <div class="col-md-4 pb-4">
                            <div class="card card-shadow">
                                <div class="card-body text-center">
                                    <p><img class="user-img" src="../../uploads/users/<?php echo $record['photo']; ?>"
                                            alt="<?php echo $record['name']; ?>"
                                            onerror="this.src='../../uploads/default.png';"></p>
                                    <h4 class="card-title"><?php echo $record['name']; ?></h4>
                                    <p class="card-text">
                                        <b>EMP ID : </b><?php echo $record['emp_id']; ?> || <b>EMP Type : </b><?php echo $record['emp_type']; ?><br>
                                        <b>EMP No : </b><?php echo $record['contact']; ?> <br>
                                        <b>EMP Email : </b><?php echo $record['email']; ?><br>
                                    </p>
                                    <?php $editUrl="edit-modal.php?empId=".$record['id']; ?>
                                    <?php $viewUrl="view-modal.php?empId=".$record['id']; ?>
                                    <div class="btn-group p-2">
                                        <a onclick="javascript:show_modal('<?php echo $editUrl; ?>')"
                                            class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Record !">
                                        <i class="fa fa-edit"></i></a>
                                        
                                        <div class="custom-control custom-checkbox checkbox-lg " data-toggle="tooltip" data-placement="bottom" title="Click to Select !">
                                            &nbsp;<input type="checkbox" name="checkItem[]"
                                                value="<?php echo $record['id']; ?>" class="chkbox custom-control-input"
                                                id="checkbox<?php echo $record['id']; ?>" >
                                            <label class="custom-control-label"
                                                for="checkbox<?php echo $record['id']; ?>" ></label>
                                        </div>

                                        &nbsp;<button class="btn btn-danger btn-sm single_delete_btn" value="<?php echo $record['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Record ?">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        &nbsp;
                                        <a onclick="javascript:show_modal('<?php echo $viewUrl; ?>')"
                                            class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Show all Details !">
                                        <i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="action" value="_delete_employee">
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php   require_once '../footer.php'; ?>