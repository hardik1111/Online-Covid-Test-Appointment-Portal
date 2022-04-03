 <?php if(isset( $_SESSION['session-msg'])  && !empty($_SESSION['session-msg'])){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-<?php if(isset($_SESSION['session-type'])  && !empty($_SESSION['session-type'])){echo $_SESSION['session-type'];} else {echo 'success';} ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo  $_SESSION['session-msg']; ?>
        </div>
    </div>
</div>
<?php unset($_SESSION['session-msg']); unset($_SESSION['session-type']); } ?>