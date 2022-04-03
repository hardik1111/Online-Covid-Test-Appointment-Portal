<?php require_once '../header.php'; ?>
<header class="page-header">
    <h2>Leads</h2>
</header>

<div class="row">
<div class="col">
    <section class="card">
        <?php include "../includes/session_flash.php"; ?>
        <header class="card-header">
            <div class="card-actions">
                <!-- <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a> -->
            </div>

            <h2 class="card-title d-inline">All Leads</h2>
            <form action="" method="post" style="display: inline;">
            <select class="d-inline selectOption" style="float: right;width: 100px;padding:3px;" onchange="this.form.submit()" name="sortValue">
                <option value="">Sort by</option>
                <?php fetch_leadStatus(); ?>
                <option value="default">Default</option>
            </select>
            </form>
        </header>

        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0 " id="datat" style="width:100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Shop Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th><!-- class="d-lg-none" -->
                        <th>FollowUp Date</th>
                        <th>Start Date</th>
                        <th>Source</th>
                        <th style="min-width:150px;!important">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    
                    if(isset($_POST['sortValue']) && $_POST['sortValue']!="" && $_POST['sortValue']!="default")
                    {
                     $value=$_POST['sortValue'];

                     $query="select * from information where emp_id='$emp_id' and status='$value' order by info_id desc";   
                    }else
                    {
                        $query="select * from information where emp_id='$emp_id' order by info_id desc";
                    }
                         $result=mysqli_query($conn,$query);
                         while($data=mysqli_fetch_assoc($result))
                         {
                     ?>
                    <tr>
                        <td><?php  echo $data['name']; ?></td>
                        <td><?php  echo $data['shop_name']; ?>
                        </td>
                        <td><?php  echo $data['phone']; ?></td>
                        <td><?php  echo $data['email']; ?></td>
                        <td><span class="status-active <?php switch($data['status']){
                            case 'Open' : echo 'open'; break;case 'Follow up' : echo 'followup'; break;case 'Closed' : echo 'closed'; break;case 'Cancelled' : echo 'cancelled'; break;case 'Meeting done' : echo 'meetingdone'; break;
                            case 'Meeting cancelled' : echo 'meetingcancel'; break;
                        } ?>"><?php  echo $data['status']; ?></span></td>
                        <td><?php  echo $data['followup_date']; ?></td>
                        <td><?php  echo iFormat2($data['date']); ?></td>
                        <td><?php  echo $data['referral']; ?></td>
                        <?php $editUrl="edit-modal.php?leadId=".$data['info_id']; ?>
                        <?php $editLeadUrl="edit-lead-modal.php?leadId=".$data['info_id']; ?>
                        <td><a href="https://api.whatsapp.com/send?phone=<?php  echo $data['phone']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Message on whatsapp !"><i class="fa fa-whatsapp my-icon" aria-hidden="true"></i></a>

                            <a onclick="javascript:show_modal('<?php echo $editUrl; ?>')"
                                            class="" data-toggle="tooltip" data-placement="bottom" title="Edit Client !">
                            <i class="fa fa-edit my-icon" aria-hidden="true" ></i>
                            </a>
                            <a onclick="javascript:show_modal('<?php echo $editLeadUrl; ?>')"
                                            class="" data-toggle="tooltip" data-placement="bottom" title="Edit Lead Status">
                            <i class="far fa-comment-dots my-icon" aria-hidden="true"></i>
                            </a>
                            <a href="viewlead.php?id=<?php echo $data['info_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="View Lead">
                            <i class="fa fa-eye my-icon" aria-hidden="true"></i>
                            </a>
                                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </section>
</div>
    </div>
    
<?php require_once '../footer.php'; ?>
<script type="text/javascript">
        
</script>