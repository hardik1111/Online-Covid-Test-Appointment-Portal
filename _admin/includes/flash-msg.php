 <!-- <?php session_start(); //if(isset($_GET['msg'])){ ?>
 <div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php //echo $_GET['msg']; ?>
        </div>
    </div>
 </div>
 <?php //} ?> -->
 <!-- <?php //if(isset( $_SESSION['flash-msg'])  && !empty($_SESSION['flash-msg'])){ ?>
<div class="row pt-2">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php //echo  $_SESSION['flash-msg']; ?>
        </div>
    </div>
</div>
<?php //unset($_SESSION['flash-msg']); } ?> -->


 <?php if(isset( $_SESSION['flash-msg'])  && !empty($_SESSION['flash-msg'])){ ?>
    <script>
    $(document).ready(function() {
        Swal.fire(
                'Alert ?',
                '<h3><?php echo $_SESSION['flash-msg']; ?></h3>',
                'success',
                'question'
              )

    });
    </script>
 <?php  unset($_SESSION['flash-msg']); } ?>