<?php require_once '../header.php';
?>
<script>
$(document).ready(function() {
    $(".empList").change(function() {
        $("#empForm").submit();

    });
});
</script>
<header class="page-header">
    <h2>Employee Task</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card ">
            <div class="card-body" style="height:100vh;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="" method="post" name="empForm" id="empForm">
                            <select class="form-control  empList select2" name="empId">
                                <?php echo employeeList(); ?>
                            </select>
                            <input type="hidden" name="empAct" id="empAct" value="employee_task">
                            <form>
                    </div>
                </div>
                <?php if(!empty($_POST['empAct'])){ ?>
                <div class="row d-flex justify-content-center pt-5">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Shop Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Deal Date</th>
                                    <th width=20px;>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $empId=$_POST['empId']; 
                                $query="SELECT * FROM `information` WHERE emp_id='$empId'";
                                $result=mysqli_query($conn,$query);
                                $count=1;
                                while($record=mysqli_fetch_assoc($result))
                                {?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $record['name']; ?></td>
                                    <td><?php echo $record['shop_name']; ?></td>
                                    <td><?php echo $record['phone']; ?></td>
                                    <td><?php echo $record['status']; ?></td>
                                    <td><?php echo iFormat($record['date']); $leadUrl="view-leads.php?leadId=".$record['info_id'] ?></td>
                                    <td><button type="button" class="btn btn-success" onclick="show_modal('<?=$leadUrl?>');"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                                </tr>
                                <?php $count++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>
<?php   require_once '../footer.php'; ?>