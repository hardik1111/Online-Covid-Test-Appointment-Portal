<?php session_start();
 ?>
 <?php // include "../header.php"; ?>
<?php 
    require_once '../../config/db_connect.php';
    $leadId=$_GET['leadId']; 
    $dataArray=array('tableName'=>'information','conditions'=>'WHERE info_id='.$leadId);
    $record=iEdit($dataArray);
    if(isset($_SESSION['user_id']))
    {
        $emp_id=$_SESSION['user_id'];
    }
?>
<style type="text/css">
    .onFollowup,.onClose,.OnfollowupConversation{display: none;}
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Update <?php echo $record['name']; ?>'s Lead</h2>
            </header>
            <form action="../includes/actions.php" method="POST">
                <div class="card-body">
                    <div class="row mb-2">
                        
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                            <label for="status">Status</label>

                            <select name="status" class="form-control statusClass" onchange="checkStatus()">
                                <option value="<?php echo $record['status']; ?>" selected="selected"><?php echo $record['status']; ?></option>
                                <?php fetch_leadStatus(); ?>
                            </select>
                            </div>

                            <div class="onClose">
                               <label>Closing Type</label>
                               <div class="form-group">
                                   <select name="closeType" class="form-control mb-1 closeOption" required="required">
                                    <option value="">Select Close type</option>
                                       <option value="Successfully"
                                       <?php if($record['close_type']=="Successfully" and $record['close_type']!=""){echo "selected='selected'";}; ?>>Successfully</option>
                                       <option value="Failure" <?php if($record['close_type']=="Failure" and $record['close_type']!=""){echo "selected='selected'";}; ?>>
                                           Failure
                                       </option>
                                   </select>
                               </div>
                            </div>
                            <div class="onFollowupConversation">
                               <label>Follow up/Meeting Conversation</label>
                               <div class="form-group">
                                  <textarea name="conversation" class="form-control FollowupConversation"></textarea>
                               </div>
                           </div>
                            <div class="followupYesNo mt-2">
                               <label>Add new Follow up Date</label>
                               <div class="form-group">
                                   <input type="radio" name="follow" class="yes">&nbsp;Yes
                                   <input type="radio" name="follow" class="no" checked>&nbsp;No
                               </div>
                            </div>
                            <div class="onFollowup">
                               <label>Follow up Date</label>
                               <div class="form-group">
                                   <input type="date" name="followupDate" class="form-control mb-1 followUpOption">
                               </div>
                           </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                            <label for="description">First Meeting Agenda</label><br />
                            <label><input type="checkbox" name="editFirstDesc" class="checkFirstDesc"> Edit</label>
                            <textarea name="description" class="form-control firstDesc" readonly="readonly"><?php echo $record['description']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success modal-confirm">Update Lead</button>
                            <input type="hidden" value="update_lead" name="action">
                            <input type="hidden" name="leadId" value="<?php echo $record['info_id']; ?>">
                            <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
                            <input type="hidden" name="empId" value="<?php echo $emp_id; ?>">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>

    </div>
</div>

<script type="text/javascript">
    $(function () {
        $(".checkFirstDesc").click(function () {
            var isChecked = $(".checkFirstDesc").is(":checked");
            if (isChecked) 
            {
                $(".firstDesc").removeAttr("readonly","readonly");
            } else 
            {
                $(".firstDesc").attr("readonly","readonly");
            }
        });
    });

    function checkStatus()
    {
        var status=$(".statusClass").val();
       if(status=="Closed")
        {
            $(".onClose").show("2000");
            $(".closeOption").removeAttr("disabled","disabled");
            $(".onFollowup").hide("1000");
            $(".followupYesNo").hide("1000");
            $(".followUpOption").attr("disabled","disabled");
        }else if(status=='Follow up' || status=='Meeting done')
        {
            $(".FollowupConversation").removeAttr("disabled","disabled");
            $(".onFollowupConversation").show("2000");
        }
        else
        {
          $(".closeOption").attr("disabled","disabled"); 
          $(".onClose").hide("1000");  
          $(".followupYesNo").show("2000");
          $(".FollowupConversation").attr("disabled","disabled");
          $(".onFollowupConversation").hide("1000");
        }
    }

 $(document).ready(function(){
    var status=$(".statusClass").val();
       if(status=="Closed")
       {
        $(".onClose").show(); 
        $(".onFollowup").css("display","none");
        $(".followupYesNo").css("display","none");

       }
       else
       {
         $(".followupYesNo").show();
       }
       if(status=="Cancelled" || status=="Meeting done")
       {
        $(".closeOption").attr("disabled","disabled");
       }
   
    $(".onFollowupConversation").hide();
    $(".FollowupConversation").attr("disabled","disabled");

    $(".yes").click(function (){
         $(".onFollowup").show("1000");
         $(".followUpOption").removeAttr("disabled","disabled");
    });
    $(".no").click(function () {
         $(".onFollowup").hide("1000");
         $(".followUpOption").attr("disabled","disabled");
    });
   
 });   
</script>
<?php //  include "../footer.php"; ?>