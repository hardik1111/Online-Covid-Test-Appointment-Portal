<?php 
require_once '../header.php';
$addUrl="add-modal.php";
?>
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage Test Center </h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success" onclick="show_modal('<?php echo $addUrl;?>')">
                                    Add New Test Center
                                </button>
                                <button type="button" class="btn btn-danger"  id="delete-btn">
                                    Delete Test Center
                                </button>
                            </div>

                            <div class="row pt-2">
                            <div class="col-md-12">
                            <form method="post" name="delete_form" id="delete_form" action="_manage_hosp.php" id="form">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered table-sm"  style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 10px">#</th>
                                            <th>Test Center Name</th>
                                            <th>Number</th>
                                            <th>Pincode</th>
                                            <th>Address</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        $sql="SELECT * FROM  `hospital` ORDER BY hospital_id ASC";
                                        $result=mysqli_query($conn,$sql);
                                        $rowcount=mysqli_num_rows($result);
                                        $count=1; 
                                        if($rowcount>0){
                                        while($data=mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr id="<?php echo $data['hospital_id']; ?>">
                                            <td>
                                                <input type="checkbox" name="checkItem[]" value="<?php echo $data['hospital_id']; ?>" id="checkbox<?php echo $data['hospital_id']; ?>" class="chkbox">
                                            </td>
                                            <td><?= $count?></td>
                                            <td><?= $data['hospital_name'] ?></td>
                                            <td><?= $data['hospital_number'] ?></td>
                                            <td><?= $data['hospital_pincode'] ?></td>
                                            <td><?= $data['hospital_address'] ?></td>
                                            <td>
                                                <?php $editUrl="edit-modal.php?hospId=".$data['hospital_id']; ?>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-danger single_delete_btn" value="<?php echo $data['hospital_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Record ?">
                                                    <i class="fa fa-trash"></i>
                                                </button>&nbsp;
                                                <button type="button" class="btn btn-primary edit-btn-modal editBtn" onclick="javascript:show_modal('<?php echo $editUrl; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                                                
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $count++; }} ?>
                                    </tbody>
                                </table>
                                <input type="hidden" name="action"  value="hospital_delete">
                            </div>
                            </form>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script>
    $(".editBtn").click(function(e){
        e.preventDefault();
    });
    function checkThis(HospIdclass)
    {
        $("#checkbox"+HospIdclass).attr("checked","checked");
    }
    
</script>
<?php
require_once '../footer.php'; ?>