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
                            <h3 class="card-title">Manage Appointment </h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <form action="" method="post" name="hospitalForm" id="hospitalForm">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="date" class="form-control" name="date" id="date">
                                            </div>
                                            <div class="col-5">
                                            <select class="form-control hospital_id" name="hospital_id" id="hospital_id">
                                                <?php echo get_option_list("hospital","hospital_id","hospital_name",""); ?>
                                            </select>
                                            <input type="hidden" name="appointment_search" id="appointment_search" value="appointment_search">
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-success">Search </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php if(!empty($_POST['appointment_search'])){ ?>
                                    <div class="row d-flex justify-content-center pt-5">
                                        <?php 
                                            if(!empty($_POST['hospital_id']) AND !empty($_POST['date']))
                                            {
                                                $hospitalId=$_POST['hospital_id']; 
                                                $date=$_POST['date'];
                                                $query="SELECT appointments.*,hospital.hospital_name,slot_times.start_time,slot_times.end_time FROM appointments INNER JOIN hospital ON appointments.hospital_id=hospital.hospital_id INNER JOIN slot_times ON appointments.slot_time_id=slot_times.slot_time_id WHERE appointments.appointment_date='$date' AND appointments.hospital_id=$hospitalId";
                                            }
                                            else if(!empty($_POST['hospital_id']) AND empty($_POST['date']))
                                            {
                                                $hospitalId=$_POST['hospital_id']; 
                                                $query="SELECT appointments.*,hospital.hospital_name,slot_times.start_time,slot_times.end_time FROM appointments INNER JOIN hospital ON appointments.hospital_id=hospital.hospital_id INNER JOIN slot_times ON appointments.slot_time_id=slot_times.slot_time_id WHERE appointments.hospital_id=$hospitalId";
                                            }
                                            else if(empty($_POST['hospital_id']) AND !empty($_POST['date']))
                                            {
                                                $date=$_POST['date'];
                                                $query="SELECT appointments.*,hospital.hospital_name,slot_times.start_time,slot_times.end_time FROM appointments INNER JOIN hospital ON appointments.hospital_id=hospital.hospital_id INNER JOIN slot_times ON appointments.slot_time_id=slot_times.slot_time_id WHERE appointments.appointment_date='$date'";
                                            }
                                            else
                                            {
                                                $query="SELECT appointments.*,hospital.hospital_name,slot_times.start_time,slot_times.end_time FROM appointments INNER JOIN hospital ON appointments.hospital_id=hospital.hospital_id INNER JOIN slot_times ON appointments.slot_time_id=slot_times.slot_time_id";
                                            }
                                        ?>
                                        
                                        <div class="col-lg-12">
                                            <table class="table table-sm text-center" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Appointment ID</th>
                                                    <th>Paitent Name</th>
                                                    <th>Age</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Time Slot</th>
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Time</th>
                                                    <th>Hospital Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $record=iFetchAll($query);
                                            if($record!=0){
                                            foreach($record as $data){
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['appointment_id']; ?></td>
                                                    <td><?php echo $data['name']; ?></td>
                                                    <td><?php echo $data['age']; ?></td>
                                                    <td><a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></td>
                                                    <td><a href="tel:<?php echo $data['contact']; ?>"><?php echo $data['contact']; ?></a></td>
                                                    <td><?php echo $data['address']; ?></td>
                                                    <td><?php echo $data['start_time'].' To '.$data['end_time']; ?></td>
                                                    <td><?php echo iFormat($data['appointment_date']); ?></td>
                                                    <td><?php echo $data['appointment_date_time']; ?></td>
                                                    <td><?php echo $data['hospital_name']; ?></td>
                                                </tr>
                                            <?php
                                            }} else{?>
                                                <tr><td colspan="8" class="text-center"><b>No Record Found</b></td></tr>
                                            <?php } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
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
<?php   require_once '../footer.php'; ?>