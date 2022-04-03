<?php require_once '../header.php'; ?>
<header class="page-header">
    <h2>Add a Lead</h2>
</header>
<style type="text/css">
.onFollowup,.onClose,.onFollowupConversation{display: none;}
</style>
<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card">
            <div class="card-body">
               <form action="../includes/actions.php" method="post" enctype="multipart/form-data">
                   <label>Client Name</label>
                   <div class="form-group">
                       <input type="text" placeholder="Client Name" name="name" class="form-control">
                   </div>
                   <label>Client ShopName</label>
                   <div class="form-group">
                       <input type="text" placeholder="Client Shop Name" name="shopname" class="form-control" >
                   </div>
                   <label>Client Email</label>
                   <div class="form-group">
                       <input type="email" placeholder="Client Email Address" name="email" class="form-control">
                   </div>
                   <label>Client Phone</label>
                   <div class="form-group">
                       <input type="text" placeholder="Phone Number" name="phone" id="phone" class="form-control" pattern="[0-9]+" required="required">
                   </div>
                   <div class="form-group">
                       <input type="checkbox" name="sameAsWhatsapp" id="sameAsWhatsapp" > Whatsapp is Same as Phone Number
                   </div>
                   <label>Client Whatsapp Number</label>
                   <div class="form-group">     
                       <input type="text" placeholder="Whatsapp Number" name="whatsapp" id="whatsapp"  class="form-control" pattern="[0-9]+">
                   </div>
                   <label>Client Address</label>
                   <div class="form-group">
                       <textarea placeholder="Address" name="address" class="form-control"></textarea>
                   </div>
                   <label>Pin Code</label>
                   <div class="form-group">
                       <input type="text" placeholder="Pincode/Zipcode" name="pincode" class="form-control" pattern="[0-9]+">
                   </div>
                   <label>Meeting agenda</label>
                   <div class="form-group">
                       <textarea placeholder="Meeting agenda" name="description" class="form-control" required="required"></textarea>
                   </div>
                   <label>Status</label>
                   <div class="form-group">
                       <select name="status" class="form-control statusClass" required="required" onchange="checkStatus()">
                           <option readonly disabled="disabled" selected="selected">Select Status</option>
                           <?php fetch_leadStatus(); ?>
                       </select>
                   </div>
                   <div class="onFollowupConversation">
                       <label>Follow up Conversation</label>
                       <div class="form-group">
                          <textarea name="conversation" class="form-control FollowupConversation"></textarea>
                       </div>
                   </div>
                    <div class="followupYesNo">
                       <label>is Follow up Date Taken?</label>
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
                    <div class="onClose">
                       <label>Closing Type</label>
                       <div class="form-group">
                           <select name="closeType" class="form-control mb-1 closeOption">
                               <option value="Successfully"
                               >Successfully</option>
                               <option value="Failure">
                                   Failure
                               </option>
                           </select>
                       </div>
                    </div>
                   <label>Source</label>
                   <div class="form-group">
                       <input type="text" placeholder="Source/Referral" name="source" class="form-control">
                   </div>
                   <input type="hidden" name="action" value="add_information">
                   <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                   <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
                   <div class="text-right">
                    <input type="submit" class="btn btn-success mt-3 btn-sm text-right" name="submit" value="Add Information">
                    </div>
               </form>
            </div>
        </section>
    </div>
</div>
<script>
    $(function () {
        $("#sameAsWhatsapp").click(function () {
            var isChecked = $("#sameAsWhatsapp").is(":checked");
            if (isChecked) 
            {
                var phone=$("#phone").val();
                var whatsapp=$("#whatsapp");
                whatsapp.val(phone);
                whatsapp.attr("readonly","readonly");
            } else 
            {
                var phone=$("#phone").val();
                var whatsapp=$("#whatsapp");
                whatsapp.val(phone);
                whatsapp.removeAttr("readonly","readonly");
            }
        });

        $(".yes").click(function () {
             $(".onFollowup").show("1000");
             $(".followUpOption").removeAttr("disabled","disabled");
        });
        $(".no").click(function () {
             $(".onFollowup").hide("1000");
             $(".followUpOption").attr("disabled","disabled");
        });
    });

    function checkStatus()
    {
        var status=$(".statusClass").val();
        if(status=="Closed")
        {
            $(".onClose").show("2000");
            $(".closeOption").removeAttr("disabled","disabled");
            $(".FollowupConversation").attr("disabled","disabled");
            $(".onFollowupConversation").hide("1000");
            $(".onFollowup").hide("1000");
            $(".followUpOption").attr("disabled","disabled");
            $(".followupYesNo").hide();
          
        }else if(status=="Follow up")
        {
            $(".onFollowupConversation").show("2000");
            $(".FollowupConversation").removeAttr("disabled","disabled");
            $(".onClose").hide("1000");
            $(".closeOption").attr("disabled","disabled");
            $(".followUpOption").removeAttr("disabled","disabled");
            $(".followupYesNo").show();
        }
        else
        {
          $(".closeOption").attr("disabled","disabled"); 
          $(".onClose").hide("1000");  
          $(".FollowupConversation").attr("disabled","disabled");
          $(".onFollowupConversation").hide("1000");
          $(".followUpOption").attr("disabled","disabled");
          $(".onFollowup").hide();
        }
    }

</script>
<?php require_once '../footer.php'; ?>
