<?php require_once '../header.php'; 
    $analysis_query=mysqli_query($conn,"select (select count(*) from hospital)  as totalHospital, (select count(*) from blog)  as totalBlog,(select count(*) from appointments)  as totalAppointments");
    $analysis_data=mysqli_fetch_assoc($analysis_query);
?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $analysis_data['totalHospital']; ?></h3>

                            <p> Total Test Center</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <a href="../hospitals/hospital.php" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $analysis_data['totalBlog']; ?></h3>

                            <p>Total Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper-o"></i>
                        </div>
                        <a href="../blogs/blogs.php" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                  <!-- ./col -->
                   <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $analysis_data['totalAppointments']; ?></h3>

                            <p>Total Appointments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <a href="../appoinment/appoinment.php" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                  <!-- ./col -->
                 <!-- ./col -->
                 <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <!-- <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php 
                            $dataArray=array('tableName'=>'appointments','conditions'=>'WHERE appointment_date='."'$currentDate'");
                            $todayAppointment=iCount($dataArray);
                            echo $todayAppointment; ?></h3>

                            <p>Today Appointments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <a href="../appoinment/appoinment.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div> -->
                </div>
                  <!-- ./col -->
              
            </div>
            <!-- /.row -->


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->


<!-- end: page -->
<?php require_once '../footer.php'; ?>