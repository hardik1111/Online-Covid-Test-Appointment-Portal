<?php require_once '../header.php';
$today=date("Y-m-d");
$analysis_query=mysqli_query($conn,"select (select count(info_id) from information where status='Closed' and emp_id='$emp_id' and close_type='Successfully') as closeSuccess,(select count(info_id) from information where status='Closed' and emp_id='$emp_id' and close_type='Failed') as closeFailed, (select count(info_id) from information where emp_id='$emp_id' and followup_date='$today') as followToday,(select count(info_id) from information where emp_id='$emp_id' and followup_date<'$today' and not followup_date='') as allMissed, (select count(info_id) from information where emp_id='$emp_id') as allLeads from information");
$analysis_result=mysqli_fetch_assoc($analysis_query);
 ?>

<header class="page-header">
    <h2>Dashboard</h2>
</header>

<!-- start: page -->
<div class="row">
  <!--   <div class="col-lg-12 mb-3">
    <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Leads (<?php echo $analysis_result['allCounter']; ?>)</h2>
                    
                </header>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 col-sm-4">
                            
                        </div>
                    </div>
                </div>
            </section>
    </div> -->
    <div class="col-sm-3 mb-4 col-12">
            <div class="card" style="width: 100%;height: 120px;">
              <div class="card-body bg-info">
                <h3 class="text-dark mt-0 text-light"><?php echo $analysis_result['allLeads']; ?></h3>
                <h5 class=" text-light">Total Leads</h5>
                <a href="../leads/all_leads.php"><div style="background-color: rgba(0,0,0,0.5);display: inline;float: right;padding:2px 5px;border-radius: 10px;">More info&nbsp;<i class="fa fa-arrow-right"></i> </div></a>
              </div>
            </div>
    </div>
    <div class="col-sm-3 mb-4 col-12">
        <div class="card" style="width: 100%;height: 120px;">
              <div class="card-body bg-warning">
                <h3 class="text-dark mt-0 text-light"><?php echo $analysis_result['allMissed']; ?></h3>
                <h5 class=" text-light">Follow Up Missed</h5>
                <a href="../leads/all_leads.php"><div style="background-color: rgba(0,0,0,0.5);display: inline;float: right;padding:2px 5px;border-radius: 10px;">More info&nbsp;<i class="fa fa-arrow-right"></i> </div></a>
              </div>
        </div>
    </div>
    <div class="col-sm-3 mb-4 col-12">
        <div class="card" style="width: 100%;height: 120px;">
              <div class="card-body bg-primary">
                <h3 class="text-dark mt-0 text-light"><?php echo $analysis_result['followToday']; ?></h3>
                <h5 class=" text-light">Today Follow up</h5>
                <a href="../leads/all_leads.php"><div style="background-color: rgba(0,0,0,0.5);display: inline;float: right;padding:2px 5px;border-radius: 10px;">More info&nbsp;<i class="fa fa-arrow-right"></i> </div></a>
              </div>
        </div>
    </div>
    <div class="col-sm-3 mb-4 col-12">
        <div class="card" style="width: 100%;height: 120px;">
              <div class="card-body bg-success">
                <h3 class="text-dark mt-0 text-light"><?php echo $analysis_result['closeSuccess']; ?></h3>
                <h5 class=" text-light">Closed (Success)</h5>
                <a href="../leads/all_leads.php"><div style="background-color: rgba(0,0,0,0.5);display: inline;float: right;padding:2px 5px;border-radius: 10px;">More info&nbsp;<i class="fa fa-arrow-right"></i> </div></a>
              </div>
        </div>
    </div>
    <div class="col-sm-3 mb-4 col-12">
        <div class="card" style="width: 100%;height: 120px;">
              <div class="card-body bg-danger">
                <h3 class="text-dark mt-0 text-light"><?php echo $analysis_result['closeFailed']; ?></h3>
                <h5 class=" text-light">Closed (Failed)</h5>
                <a href="../leads/all_leads.php"><div style="background-color: rgba(0,0,0,0.5);display: inline;float: right;padding:2px 5px;border-radius: 10px;">More info&nbsp;<i class="fa fa-arrow-right"></i> </div></a>
              </div>
        </div>
    </div>
</div>


<!-- end: page -->
<?php require_once '../footer.php'; ?>