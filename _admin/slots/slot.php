<?php 
require_once '../header.php';
?>

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage Slots </h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="btn-group">
                                <a href="add_slot.php" class="btn btn-success">
                                    Add New Slot
                                </a>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <table class="table">
                                    <thead>
                                        <tr><th>#</th><th>Test Center</th><th>Date</th><th>Action</th>
                                    </tbody>
                                    <tbody>
                                    <form method="post">
                                        <?php 
                                            $count=1;
                                            $query="SELECT slots.slot_id,slots.slot_date,hospital.hospital_id,hospital.hospital_name FROM slots INNER JOIN hospital ON slots.hospital_id=hospital.hospital_id";
                                            //$query="SELECT * FROM `slots`";
                                            $record=iFetchAll($query);
                                            if($record!=0){
                                            foreach($record as $data)
                                            {
                                        ?>
                                        <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $data['hospital_name']; ?></td>
                                                <td><?php echo iFormat($data['slot_date']); ?></td>
                                                <td>
                                                    <?php $viewUrl="view-modal.php?slotId=".$data['slot_id']; ?>
                                                    <a onclick="javascript:show_modal('<?php echo $viewUrl; ?>')"
                                                    class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Show Slot Details !">
                                                    <i class="fa fa-eye"></i></a>

                                                    <?php $editUrl="edit-modal.php?slotId=".$data['slot_id']; ?>
                                                    <a onclick="javascript:show_modal('<?php echo $editUrl; ?>')"
                                                    class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Update Slots !">
                                                    <i class="fa fa-edit"></i></a>

                                                </td>
                                        </tr>
                                        <?php $count++; } }?>
                                    </form>
                                    <tbody>
                                    </table>
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
<?php   require_once '../footer.php'; ?>