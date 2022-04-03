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
                            <div class="btn-group">
                                <button type="button" class="btn btn-success" onclick="show_modal('<?php echo $addUrl;?>')">
                                    Add New blog
                                </button>
                                <button type="button" class="btn btn-danger"  id="delete-btn" onclick="formSubmit()">
                                    Delete blog
                                </button>
                            </div>

                            <div class="row pt-2">
                            <div class="col-md-12">
                            <form method="post" name="delete_form" id="delete_form" action="_manage_blog.php" id="form">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered "  style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 10px">#</th>
                                            <th>Blog Heading</th>
                                            <th>Content</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        $sql="SELECT * FROM  `blog` ORDER BY blog_id ASC";
                                        $result=mysqli_query($conn,$sql);
                                        $rowcount=mysqli_num_rows($result);
                                        $count=1; 
                                        if($rowcount>0){
                                        while($data=mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr id="<?php echo $data['blog_id']; ?>">
                                            <td>
                                                <input type="checkbox" name="checkItem[]" value="<?php echo $data['blog_id']; ?>" id="checkbox<?php echo $data['blog_id']; ?>" class="chkbox">
                                            </td>
                                            <td><?= $count?></td>
                                            <td><?= $data['blog_heading'] ?></td>
                                            <td><?= $data['blog_content'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="" class="btn btn-danger single_delete_btn" onclick="checkThis(<?php echo $data['blog_id']; ?>)"><i class="fa fa-trash"></i></a>&nbsp;
                                                
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $count++; }} ?>
                                    </tbody>
                                </table>
                                <input type="hidden" name="action" id="action" value="blog_delete">
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