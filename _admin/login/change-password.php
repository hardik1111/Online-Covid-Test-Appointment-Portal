<?php require_once '../header.php';
?>
<script>
function password_confirm()
{
    var password=new_password.value;
    var rpassword=rnew_password.value;
    if(password===rpassword)
    {
        document.getElementById('changePassForm').submit();
    }
    else
    { 
        alert("New Password and Re-Type Password should be same");
        document.getElementById('new_password').value='';
        document.getElementById('rnew_password').value='';
        document.getElementById('new_password').focus();
        return false;
    }
}
</script>
<header class="page-header">
    <h2>Employee Task</h2>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12 mb-3">
        <section class="card ">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="authentications.php" method="post" name="changePassForm" id="changePassForm" onsubmit="return password_confirm();">
                            <div class="pb-3">
                                <label>Email</label>
                                <div class="input-group">
                                    <input name="email" id="email" type="email" class="form-control"
                                        placeholder="Email" value="<?php echo $_SESSION['admin_id'];?>" readonly="readonly" />
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope text-4"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="pb-3">
                                <div class="clearfix">
                                    <label class="float-left">Current Password</label>
                                </div>
                                <div class="input-group">
                                    <input name="current_password" id="current_password" type="password" class="form-control"
                                        placeholder="Current Password" />
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-key text-4"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="clearfix">
                                    <label class="float-left">New Password</label>
                                </div>
                                <div class="input-group">
                                    <input name="new_password" id="new_password" type="password" class="form-control"
                                        placeholder="New Password" />
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="bx bx-lock text-4"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="clearfix">
                                    <label class="float-left">Re-Type New Password</label>
                                </div>
                                <div class="input-group">
                                    <input name="rnew_password" id="rnew_password" type="password" class="form-control"
                                        placeholder="Re-Type New Password" />
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="bx bx-lock text-4"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="pb-3">
                                <input type="hidden" name="action" id="action" value="change_password">
                                <button type="submit" class="btn btn-primary btn-facebook mt-2">Change Password</button>
                                <a href="" class="btn btn-danger  mt-2"> Close </a>
                            </div>
                            
                            <form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php   require_once '../footer.php'; ?>