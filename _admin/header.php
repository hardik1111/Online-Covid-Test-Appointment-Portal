<?php session_start();
    if(!isset($_SESSION['admin_id']))
    {
        $_SESSION['session-type']='danger';
        $_SESSION['session-msg']="Login First to continue";
        header("location:../login/index.php");die;
    }
    require_once '../../config/db_connect.php'; 
    require_once 'includes/admin-info.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Pannel</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Select2 -->
    <link rel="stylesheet" href="../design001/plugins/select2/css/select2.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../design001/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../design001/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../design001/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../design001/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../design001/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../design001/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
      <!-- DataTables -->
        <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../design001/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <script src="../design001/plugins/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.css"
        crossorigin="anonymous" />
        
    <link rel="stylesheet" href="../css/custom-main.css"> 
    <script src="../js/custom.main.js"></script> 
</head>
<!-- Very Important Line to show Modal -->
<div class="modal fade" id="targetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" area-hidden="true" ></div>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-primary" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-success" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>&emsp;
                </li>
                <li class="nav-item dropdown">
                    <a href="../login/logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i></a>&emsp;
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <?php require_once 'includes/sidemenu.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <?php include 'includes/session_flash.php' ?>