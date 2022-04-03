<?php require_once '../header.php';
 $dataArray=array('tableName'=>'configurations','conditions'=>'WHERE id=1');
 $record=iEdit($dataArray);
?>
<style>
.checkbox-xl .custom-control-label::before,
.checkbox-xl .custom-control-label::after {
    top: 4px;
    left: 10px;
    width: 1.85rem;
    height: 1.85rem;
}

.checkbox-xl .custom-control-label {
    padding-top: 10px;
    padding-left: 45px;
}
</style>
<script>
$(document).ready(function() {
    // Configuration Setting Update Start
    $('.config-txt-box').attr('readonly', true);
    $('#updateBtn').prop('disabled', true);
    $('#site_logo').prop('disabled', true);
    $('#site_favicon').prop('disabled', true);
    $('#isSelected').click('change', function() {
        if ($(this).is(':checked')) {
            $('.config-txt-box').attr('readonly', true);
            $('#updateBtn').prop('disabled', true);
            $('#site_logo').prop('disabled', true);
            $('#site_favicon').prop('disabled', true);
        } else {
            $('.config-txt-box').attr('readonly', false);
            $('#updateBtn').prop('disabled', false);
            $('#site_logo').prop('disabled', false);
            $('#site_favicon').prop('disabled', false);
        }
    });
    // Configuration Setting Update End
});
</script>
<header class="page-header">
    <h2>Site Configurations</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card ">
            <div class="card-body">
                <div class="row pb-4">
                    <div class="custom-control custom-checkbox checkbox-xl">
                        <input type="checkbox" class="custom-control-input" id="isSelected" checked="checked">
                        <label class="custom-control-label" for="isSelected">Change Configuration Settings</label>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <form action="_manage_config.php" method="post" name="configForm" id="configForm"
                            enctype="multipart/form-data">
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="site_name" class="text-danger">Site Name *</label>
                                    <input type="text" name="site_name" id="site_name" value="<?=$record['site_name']?>"
                                        class="form-control config-txt-box" placeholder="Site Name *" required>
                                </div>
                                <div class="col">
                                    <label for="org_name" class="text-danger">Organization Name *</label>
                                    <input type="text" name="org_name" id="org_name"
                                        value="<?=$record['organization_name']?>" class="form-control config-txt-box"
                                        placeholder="Organization Name *" required>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="domain" class="text-danger">Domain *</label>
                                    <input type="text" name="domain" id="domain" value="<?=$record['domain_name']?>"
                                        class="form-control config-txt-box" placeholder="Domain *" required>
                                </div>
                                <div class="col">
                                    <label for="work_hour">Working Hour</label>
                                    <input type="text" name="work_hour" id="work_hour"
                                        value="<?=$record['working_hour']?>" class="form-control config-txt-box"
                                        placeholder="Working Hour">
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="org_email" class="text-danger">Organization Email *</label>
                                    <input type="text" name="org_email" id="org_email"
                                        value="<?=$record['organization_email']?>" class="form-control config-txt-box"
                                        placeholder="Organization Email *" required>
                                </div>
                                <div class="col">
                                    <label for="org_phone" class="text-danger">Organization Phone *</label>
                                    <input type="text" name="org_phone" id="org_phone"
                                        value="<?=$record['organization_phone']?>" class="form-control config-txt-box"
                                        placeholder="Organization Phone *" required>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="email1">Email 1</label>
                                    <input type="text" name="email1" id="email1" value="<?=$record['email1']?>"
                                        class="form-control config-txt-box" placeholder="Email 1">
                                </div>
                                <div class="col">
                                    <label for="email2">Email 2</label>
                                    <input type="text" name="email2" id="email2" value="<?=$record['email2']?>"
                                        class="form-control config-txt-box" placeholder="Email 2">
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="phone1">Phone 1</label>
                                    <input type="text" name="phone1" id="phone1" value="<?=$record['phone1']?>"
                                        class="form-control config-txt-box" placeholder="Phone 1">
                                </div>
                                <div class="col">
                                    <label for="">Phone 2</label>
                                    <input type="text" name="phone2" id="" value="<?=$record['phone2']?>"
                                        class="form-control config-txt-box" placeholder="Phone 2">
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="office_address" class="text-danger">Office Address *</label>
                                    <textarea name="office_address" id="office_address"
                                        class="form-control config-txt-box" placeholder="Office Address *"
                                        required><?=$record['address']?></textarea>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="address1">Address 1</label>
                                    <textarea name="address1" id="address1" class="form-control config-txt-box"
                                        placeholder="Address 1"><?=$record['address1']?></textarea>
                                </div>
                                <div class="col">
                                    <label for="address2">Address 2</label>
                                    <textarea name="address2" id="address2" class="form-control config-txt-box"
                                        placeholder="Address 2"><?=$record['address2']?></textarea>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="facebook_link">Facebook Link</label>
                                    <input type="text" name="facebook_link" id="facebook_link"
                                        value="<?=$record['facebook']?>" class="form-control config-txt-box"
                                        placeholder="Facebook Link">
                                </div>
                                <div class="col">
                                    <label for="whatsapp_link">WhatsApp Link</label>
                                    <input type="text" name="whatsapp_link" id="whatsapp_link"
                                        value="<?=$record['whatsapp']?>" class="form-control config-txt-box"
                                        placeholder="WhatsApp Link">
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="insta_link">Instagram Link</label>
                                    <input type="text" name="insta_link" id="insta_link"
                                        value="<?=$record['instagram']?>" class="form-control config-txt-box"
                                        placeholder="Instagram Link">
                                </div>
                                <div class="col">
                                    <label for="linked_link">LinkedIn Link</label>
                                    <input type="text" name="linked_link" id="linked_link"
                                        value="<?=$record['linkedin']?>" class="form-control config-txt-box"
                                        placeholder="LinkedIn Link">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-sm">
                                        <tr>
                                            <td><img src="../../uploads/logos/<?=$record['logo']?>" style="height:100px;width:100px;"> <b>Current Logo</b></td>
                                            <td><img src="../../uploads/logos/<?=$record['favicon']?>" style="height:100px;width:100px;"> <b>Current Favicon</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <label for="insta_link">Upload Logo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="site_logo" name="site_logo">
                                        <label class="custom-file-label" for="site_logo">Choose file</label>
                                    </div>
                                    <input type="hidden" name="old_logo" value="<?=$record['logo']?>">
                                </div>
                                <div class="col">
                                    <label for="insta_link">Upload favicon</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="site_favicon"
                                            name="site_favicon">
                                        <label class="custom-file-label" for="site_favicon">Choose file</label>
                                    </div>

                                    <input type="hidden" name="old_favicon" value="<?=$record['favicon']?>">
                                </div>
                            </div>
                            

                            <div class="row pb-4">
                                <div class="col">
                                    <input type="hidden" name="action" value="config_update">
                                    <button type="submit" class="btn btn-success " id="updateBtn">Update
                                        Configurations</button>
                                    <a href="../dashboard/dashboard.php" class="btn btn-danger">Close </a>
                                </div>
                            </div>

                            <form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php   require_once '../footer.php'; ?>