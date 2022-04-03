<?php require_once 'includes/header.php'; ?>
<div class="panel card-sign">
    <div class=" mt-3 text-light">
        <div class="center login-heading">
            <span>Employee Login
            </span>
        </div>
    </div>
    <div class="card-body">
        <?php include_once 'includes/session_flash.php'; ?>
        <form action="authentications.php" method="post" autocomplete="off">
            <div class="form-group mb-3">
                <label>Employee Id</label>
                <div class="input-group">
                    <input name="empId" type="text" class="form-control form-control"
                        placeholder="Enter Employee Id" />
                    <span class="input-group-append">
                        <span class="input-group-text">
                            <i class="bx bx-user text-4"></i>
                        </span>
                    </span>
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="clearfix">
                    <label class="float-left">Password</label>
                    <a href="forget.php" class="float-right">Forget Password ?
                    </a>
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control form-control" placeholder="Enter Password" />
                    <span class="input-group-append">
                        <span class="input-group-text">
                            <i class="bx bx-lock text-4"></i>
                        </span>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="checkbox-custom checkbox-default">
                        <input id="RememberMe" name="rememberme" type="checkbox" />
                        <label for="RememberMe">Remember Me</label>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <input type="hidden" value="employee_login" name="action">
                    <button type="submit" class="btn btn-primary btn-facebook mt-2">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>