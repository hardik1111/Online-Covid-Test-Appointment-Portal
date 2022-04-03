<?php require_once '../header.php';
$adminId=$_SESSION['admin_id'];
 $dataArray=array('tableName'=>'all_admins','conditions'=>'WHERE email='."'$adminId'");
 $record=iFetch($dataArray);
?>

<header class="page-header">
    <h2>User Profile <?php //print_r($record);?></h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card ">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                <div class="col-md-4 pb-4">
                            <div class="card card-shadow">
                                <div class="card-body text-center">
                                    <p><img class="user-img" src="../uploads/profile/<?php echo $record['profile_photo']; ?>"
                                            alt=""
                                            onerror="this.src='../../uploads/default.png';"></p>
                                    <h4 class="card-title"><?php echo $record['name']; ?></h4>
                                    <p class="card-text">
                                        <b>Role : </b><?php echo $record['role']; ?><br>
                                        <b>User Id : </b><?php echo $record['email']; ?><br>
                                        <b>Last Changed Password : </b><?php echo iFormat($record['last_update_password']); ?><br>
                                    </p>
                                    <?php $editUrl="edit-profile.php?adminId=".$record['email']; ?>
                                    <div class="btn-group p-2">
                                        <a onclick="javascript:show_modal('<?php echo $editUrl; ?>')"
                                            class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Record !">
                                        <i class="fa fa-edit"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php   require_once '../footer.php'; ?>