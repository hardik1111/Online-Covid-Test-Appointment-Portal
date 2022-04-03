<?php
require_once '../header.php';
?>
<script>
    $(document).ready(function() {
        $(".hospital_id").change(function() {
            var date = $("#date").val();
            if (date == '') {
                $("#hospital_id").val("");
                alert("Please Select any date");
                return false;
            } else {
                $("#hospitalForm").submit();
            }
        });
    });
</script>
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Slot</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="btn-group">
                            <a href="slot.php" class="btn btn-danger">
                                Back
                            </a>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-12">
                                <form action="" method="post" name="hospitalForm" id="hospitalForm">
                                    <div class="row">
                                        <div class="col">
                                            <input type="date" class="form-control" name="date" id="date">
                                        </div>
                                        <div class="col">
                                            <select class="form-control hospital_id" name="hospital_id" id="hospital_id">
                                                <?php echo get_option_list("hospital", "hospital_id", "hospital_name", ""); ?>
                                            </select>
                                            <input type="hidden" name="hospitalAct" id="hospitalAct" value="hostital_slot">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (!empty($_POST['hospitalAct'])) { ?>
                            <form method="post" action="_manage_slots.php">
                                <div class="row d-flex justify-content-center pt-5">
                                    <div class="col-md-12 pb-3">
                                        <?php $hospitalId = $_POST['hospital_id'];
                                        $date = $_POST['date'];
                                        $dataArray = array('tableName' => 'hospital', 'conditions' => 'WHERE hospital_id=' . $hospitalId);
                                        $record = iFetch($dataArray);
                                        $dataArrayCount = array('tableName' => 'slots', 'conditions' => 'WHERE hospital_id=' . $hospitalId . ' AND slot_date=' . "'$date'");
                                        $numRecord = iCount($dataArrayCount);

                                        ?>
                                        <h4 class="text-center"> Add Slot for <b><?php echo $record['hospital_name']; ?></b> on the date <b><?php echo iFormat($date); ?></b></h4>
                                    </div>
                                    <?php if ($numRecord == 0) { ?>
                                        <div class="col-lg-12">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM `slot_times` ORDER BY slot_time_id ASC";
                                                    // $result = mysqli_query($conn, $query);
                                                    // $record=mysqli_fetch_all($result, MYSQLI_ASSOC);

                                                    // $record=array();
                                                    // while ($row = mysqli_fetch_assoc($result)) {
                                                    //     $record[] = $row;
                                                    // }
                                                    $record = iFetchAll($query);


                                                    foreach ($record as $data) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $data['start_time']; ?> To <?php echo $data['end_time']; ?></td>
                                                            <td>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="slot_time_id[]" value="<?php echo $data['slot_time_id']; ?>" id="checkbox<?php echo $data['slot_time_id']; ?>">
                                                                    <label for="checkbox<?php echo $data['slot_time_id']; ?>">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="hidden" name="action" value="_adding_slots">
                                            <input type="hidden" name="date" value="<?php echo $date; ?>">
                                            <input type="hidden" name="hospitalId" value="<?php echo $hospitalId; ?>">
                                            <button type="submit" class="btn btn-primary">Add Slots</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert alert-danger">
                                            <strong>Alert !</strong> <?php echo "Already Slots Book on this date for this Hospital! Please Change date or Hospital"; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </form>
                        <?php } ?>
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
<?php require_once '../footer.php'; ?>