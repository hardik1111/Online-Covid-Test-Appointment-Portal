<!-- The Modal -->
<?php 
    require_once '../../config/db_connect.php';
    $leadId=$_GET['leadId']; 
   
    $dataArray=array('tableName'=>'information','conditions'=>'WHERE info_id='.$leadId);
    $record=iFetch($dataArray);
    $emp_id=$record['emp_id'];
    
?>
<style>
.lead_descrip {
    border-left: 2px solid #cee0f0;
    padding-left: 10px;
    margin-bottom: 20px;
}
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

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
                            <b>Start Date</b>: <?php echo iFormat($record['date']); ?>
                        </div>
                        <div class="col-sm-6 col-md-4 p-1 pl-3">
                            <b>Status</b>: <?php echo $record['status']; ?>
                        </div>
                        <?php if($record['status']=="Closed"){ ?>
                        <div class="col-sm-6 col-md-4 p-1 pl-3">
                            <b>Closed Type</b>: <?php echo $record['close_type']; ?>
                        </div>
                        <div class="col-sm-6 col-md-4 p-1 pl-3">
                            <b>Closed Date</b>: <?php echo iFormat($record['close_date']); ?>
                        </div>

                        <?php } ?>

                    </div>
                </div>
                <div class="box mt-5">
                    <h5 style="background-color:#1d2127;color: white;padding:5px;">Follow up discussions </h5>
                    <div class="row">
                        <div class="col-sm-12 p-1 pl-3">
                            <div class="lead_descrip">
                                <b>First meeting discussion</b>
                                <b><span class="badge badge-success"> <?php echo iFormat($record['date']); ?></span></b><br />
                                <p>
                                    <?php echo $record['description']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1 pl-3">
                            <?php
                            $query="SELECT * FROM lead_conversation WHERE lead_id='$leadId' AND emp_id='$emp_id' ORDER BY date ASC";
                            $lead_convers=mysqli_query($conn,$query);
                            while($lead_conv_data=mysqli_fetch_assoc($lead_convers))
                            {
                            ?>
                                <div class="lead_descrip">
                                    <b><span class="badge badge-success"><?php echo iFormat($lead_conv_data['date']); ?></span></b><br />
                                    <p>
                                        <?php echo $lead_conv_data['conversation']; ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </footer>
        </section>

    </div>
</div>