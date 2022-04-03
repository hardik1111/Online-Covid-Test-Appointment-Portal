<?php require_once 'includes/header.php'; ?>
<div class="panel card-sign">
    <div class="card-title-sign mt-3 text-right">
        <h2 class="title text-uppercase font-weight-bold m-0 bg-primary"><i
                class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> Recover Password</h2>
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            <p class="m-0">Enter your e-mail below and we will send you reset instructions!</p>
        </div>

        <form>
            <div class="form-group mb-0">
                <div class="input-group">
                    <input name="username" type="email" placeholder="E-mail" class="form-control" />
                    <span class="input-group-append">
                        <button class="btn btn-primary btn-facebook" type="submit">Reset!</button>
                    </span>
                </div>
            </div>

            <p class="text-center mt-3">Login Here  <a href="index.php" class="text-dark"> Sign In!</a></p>
        </form>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>