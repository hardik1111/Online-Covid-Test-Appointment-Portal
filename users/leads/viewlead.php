<?php require_once '../header.php';
$leadId=$_GET['id'];
if(isset($_SESSION['user_id']))
    {
        $emp_id=$_SESSION['user_id'];
    } 
    $dataArray=array('tableName'=>'information','conditions'=>'WHERE info_id='.$leadId);
    $record=iEdit($dataArray);
     ?>
<header class="page-header">
    <h2>Lead Detail</h2>
</header>
<style type="text/css">
.onFollowup,.onClose{display: none;}
.lead_descrip{border-left:2px solid #cee0f0;padding-left: 10px;margin-bottom: 20px;}
.box{min-height: 50px;border: 1px solid #ddd;border-radius: 5px;padding:0px 10px ;}
</style>
<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card">
            <div class="card-body">
              <div class="box">
                  <h5 style="background-color:#1d2127;color: white;padding:5px;">Client Detail</h5>
                  <div class="row">
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Name</b>: <?php echo $record['name']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Shop name</b>: <?php echo $record['shop_name']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Email</b>: <?php echo $record['email']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Pincode</b>: <?php echo $record['pincode']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Phone</b>: <?php echo $record['phone']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Whatsapp</b>: <?php echo $record['whatsapp']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Source</b>: <?php echo $record['referral']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Address</b>: <?php echo $record['address']; ?>
                      </div>
                  </div>
              </div>
              <div class="box mt-5">
                  <h5 style="background-color:#1d2127;color: white;padding:5px;">Lead Detail</h5>
                  <div class="row">
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Start Date</b>: <?php echo $record['date']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Status</b>: <?php echo $record['status']; ?>
                      </div>
                      <?php if($record['status']=="Closed"){ ?>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Closed Type</b>: <?php echo $record['close_type']; ?>
                      </div>
                      <div class="col-sm-6 col-md-4 p-1 pl-3">
                          <b>Closed Date</b>: <?php echo $record['close_date']; ?>
                      </div>

                  <?php } ?>

                  </div>
              </div>
              <div class="box mt-5">
                  <h5 style="background-color:#1d2127;color: white;padding:5px;">Follow up discussions </h5>
                  <div class="row">
                      <div class="col-sm-12 p-1 pl-3">
                            <div class="lead_descrip">
                                <b style=""><?php echo $record['date']; ?></b><br />
                                <b>first meeting discussion</b>
                                <p>
                                   <?php echo $record['description']; ?> 
                                </p>
                            </div>
                      </div>
                      <div class="col-sm-12 p-1 pl-3">
                      <?php
                      $lead_convers=mysqli_query($conn,"select * from lead_conversation where lead_id='$leadId' and emp_id='$emp_id' order by id desc");
                      while($lead_conv_data=mysqli_fetch_assoc($lead_convers))
                      {
                       ?>

                            <div class="lead_descrip">
                                <b style=""><?php echo $lead_conv_data['date']; ?></b><br />
                                <p>
                                   <?php echo $lead_conv_data['conversation']; ?> 
                                </p>
                            </div>
                      
                       <?php } ?>
                       </div>
                  </div>
              </div>
            </div>
        </section>
    </div>
</div>
<script>
</script>
<?php require_once '../footer.php'; ?>
