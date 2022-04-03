<?php session_start(); include "config/db_connect.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book an Appointment</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/select2.min.css">
    <script src="assets/plugins/select2.full.min.js"></script>
    <style type="text/css">
    /* body{font-family: Georgia, serif;} */
        .box{min-height: 100px;background: white; border: 1px solid #eee;padding:20px 15px;margin-bottom: 10px;}
        .box-container{display: grid; grid-template-columns: 33.33% 33.33% 33.33%;grid-column-gap: 10px;}
        .header{background: #213142;border:1px solid black ; color: white;font-weight: bold; padding: 20px 5px;font-size: 22px;}
        .footer{background: #213142;border:1px solid black ; color: #f5f5f5;padding: 10px;}
        .blog-heading{color: white;padding: 5px 20px;font-variant: small-caps;background: #213142;margin-bottom: 20px;}
        .dimColor{color:#aaa; }
        .linkColor{background-color: #213142;color: white;}
        .linkColor:hover{text-decoration: none;color:#f2f2f2;}
        .blogList li{padding: 5px 0px;color:#213142;}
        .background-booking{min-height: 240px;background-image: url('uploads/appointment_image.png');background-repeat: no-repeat;background-size: cover;background-position: center center; }
        .recentLinks,.recentLinks:hover{color:navy;text-decoration: none;}
        @media only screen and (max-width: 900px)
        {
            .box-container{display: grid; grid-template-columns: 100%;margin-bottom: 20px;}
        }
 
    </style>

    <script>
    $(document).ready(function(){
        $('.select2').select2();

        $(".hsDetails").hide();
        $(".hospitalId").change(function(){
        var hospitalId=$("#hospitalId").val();
        if(hospitalId=='')
        {
            alert("Please Select Test Center First");
            $(".hsDetails").hide();
            $(".dataView").hide();
            var date=$("#date").val("");
            return false;
        }
        else
        {
            $(".dataView").hide();
            var date=$("#date").val("");
            $.ajax({
            type: "POST",
            url: "hospital-details.php",
            data: {hospitalId:hospitalId},
            cache: false,
            success: function(response){
                $(".hsDetails").html(response);
                $(".hsDetails").show();
            }
            });
        }

    });

    $(".date").change(function(){
        var date=$("#date").val();
        var hospitalId=$("#hospitalId").val();
        if(hospitalId=='')
        {
            alert("Please Select Hospital First");
            var date=$("#date").val("");
            return false;
        }
        else
        {
            $(".dataView").show();
            $.ajax({
            type: "POST",
            url: "timeslot-details.php",
            data: {hospitalId:hospitalId,date:date},
            cache: false,
            success: function(response){
                if(response==0)
                {
                    $(".dataView").html("<div class='col-md-12 text-center font-weight-bold'> No Slots Available </div>");
                    $(':input[type="submit"]').prop('disabled', true);
                }
                else
                {
                    $(':input[type="submit"]').prop('disabled', false);
                    $(".dataView").html(response);
                }
            }
            });
        }
    });

    });
    </script>
</head>
<body>
    <header>
        <div class="header text-center">Blogs &amp; Appointment  </div>
    </header>
    <div style="padding:15px;"><a href="index.php" class="recentLinks"><i class="fa fa-home"></i> Home</a> / <i class="fa fa-user"></i> <a href="_admin" class="recentLinks">Login</a></div>
<main>  
<div class="container-fluid mt-2 mb-5">
    <?php require_once 'manage_booking/session_flash.php'; ?>
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="box-container">
                <?php $blog_query=mysqli_query($conn,"select * from blog order by blog_id desc limit 4");
                     while ($blog_data=mysqli_fetch_assoc($blog_query)) {
                 ?>
                <div class="box">
                    <h4><?=  $blog_data['blog_heading'];?></h4>
                    <p class="dimColor"><i class="fa fa-clock-o pr-2"></i><?= date("M d,Y",strtotime($blog_data['blog_date'])); ?></p>
                    <div><?php echo $output = strlen($blog_data['blog_content']) > 50 ? substr($blog_data['blog_content'],0,190)."..." : $blog_data['blog_content'];?></div>
                    <p class="mt-3"><a href="blog.php?id=<?php echo $blog_data['blog_id'] ?>" class="linkColor btn-sm">Read more</a></p>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="blog-heading">RECENT BLOGS</div>
            <ul class="blogList">
                <?php $rece_query=mysqli_query($conn,"select * from blog order by blog_id desc limit 6");
                     while ($rece_data=mysqli_fetch_assoc($rece_query)) { ?>
                <li>
                   <a href="blog.php?id=<?php echo $rece_data['blog_id'] ?>" class="recentLinks"> <?= $rece_data['blog_heading']; ?></a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid mt-3 background-booking">
    <div class="row justify-content-center">
        <div class="col-12 pt-4">
           
        </div>
        <div class="col-12 col-sm-6 pb-5">
            <div style="min-height: 100px;margin-top: 20px; background: white;padding:25px 15px;border-radius: 5px;">
                <h3 class="text-center">Book An Appointment</h3>
                <hr>
                <form action="manage_booking/_manage_booking.php" method="post" enctype="multipart/form-data" autocomplete="on">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name"  required="required">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="age" pattern="[0-9]+" class="form-control" placeholder="Age"  required="required">
                    </div>
                    <div class="form-group ">
                        <input type="email" name="email" class="form-control" placeholder="Email"  required="required">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="number" pattern="\(?\+\(?49\)?[ ()]?([- ()]?\d[- ()]?){10,11}" class="form-control" placeholder="Number (+491739341284)"  required="required">
                    </div>
                    <div class="form-group ">
                        <textarea class="form-control" name="address" placeholder="Address" required="required"></textarea>
                    </div>
                    <div class="form-group ">
                        <select class="form-control hospitalId select2"  required="required" name="hospitalId" id="hospitalId">
                            <option value="">Please Select Test Center</option>
                            <?php $hsRes=mysqli_query($conn,"SELECT * FROM hospital");
                                while ($hs_data=mysqli_fetch_assoc($hsRes)) { ?>
                                    <option value="<?=$hs_data['hospital_id']?>"><?=$hs_data['hospital_name']?> / <?=$hs_data['hospital_pincode']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row hsDetails pl-3 pr-3"></div>
                    </div>
                    
                    <div class="form-group ">
                         <input type="date" class="form-control date" name="appoinmentDate" id="date" required="required">
                    </div>

                    <div class="form-group">
                        <div class="row dataView pl-3">
                        </div>
                    </div>

                    <input type="hidden" name="action" value="add_booking">
                    <input type="submit" name="submit" class="btn form-control p-1 apptBtn" value="Book appointment" style="background-color:#213142;color:white;">
                </form>
            </div>
        </div>
    </div>
</div>
</main>
<footer>
    <div class="footer text-center"> All rights reserved 2021</div>
</footer>
</body>
</html>