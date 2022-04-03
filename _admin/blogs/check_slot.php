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
                            <h3 class="card-title">Manage Blogs </h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="container">
                            <h2>Toggleable Tabs</h2>
                            <br>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                            <?php $query="SELECT * FROM `slots`";
                                $res=mysqli_query($conn,$query);
                                while($data=mysqli_fetch_assoc($res)){
                            ?>
                                <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab<?php echo $data['slot_id'];?>"><?php echo $data['slot_date'];?></a>
                                </li>
                                <?php } ?>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                            <?php $query="SELECT * FROM `slot_records`";
                                $res=mysqli_query($conn,$query);
                                while($data=mysqli_fetch_assoc($res)){
                            ?>
                                <div id="tab<?php echo $data['slot_id'];?>" class="container tab-pane"><br>
                                <h3><?php echo $data['slot_time_id'];?></h3><br>
                               
                                </div>
                            <?php } ?>
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