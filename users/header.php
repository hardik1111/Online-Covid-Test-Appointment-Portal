<?php session_start();
    if(!isset($_SESSION['user_id']))
    {
        $_SESSION['session-type']='danger';
        $_SESSION['session-msg']="Login First to continue";
        header("location:../login/index.php");die;
    }

 require_once '../../config/db_connect.php';
 include '../../config/configuration.php';
 if(isset($_SESSION['user_id']))
{
    $emp_id=$_SESSION['user_id'];
    $status=$_SESSION['user_status'];
    $emp_type=$_SESSION['user_role'];
    $emp_name=$_SESSION['user_name'];
    $emp_email=$_SESSION['user_email'];
    $emp_photo=$_SESSION['user_photo'];
}
?>
<!DOCTYPE html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title> Employee - Dashboard</title>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/vendor/animate/animate.compat.css">

    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.min.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="../assets/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="../assets/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <!-- Head Libs -->
        
</head>

<body>
    <section class="body">
        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="" class="logo">
                    <img src="../assets/img/logo.png" width="75" height="35" alt="Infocryptsolution" /></a>
                <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- start: search & user box -->
            <div class="header-right">
                <span class="separator"></span>
                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="../assets/img/<?php echo $_SESSION['user_photo']; ?>" class="rounded-circle"
                                data-lock-picture="img/<?php echo $_SESSION['user_photo']; ?>" onerror="this.onerror=null;this.src='../assets/img/default-user.jpg'" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="<?php echo $_SESSION['user_email']; ?>">
                            <span class="name"><?php echo $_SESSION['user_name']; ?></span>
                            <span class="role"><?php echo $_SESSION['user_role']; ?></span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="../dashboard/employee-profile.php"><i
                                        class="bx bx-user-circle"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i
                                        class="bx bx-lock"></i> Lock Screen</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="../login/logout.php"><i
                                        class="bx bx-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
             <!-- Very Important Line to show Modal -->
            <div class="modal fade" id="targetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" area-hidden="true" ></div> 
            <?php require_once 'includes/sidemenu.php'; ?>
            <section role="main" class="content-body">
            <?php require_once 'includes/session_flash.php'; ?>