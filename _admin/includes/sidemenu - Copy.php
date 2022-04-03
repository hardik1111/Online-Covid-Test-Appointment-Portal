<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

<div class="sidebar-header">
    <div class="sidebar-title">
        Navigation
    </div>
    <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed"
        data-target="html" data-fire-event="sidebar-left-toggle">
        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
    </div>
</div>
<?php $activePage = basename($_SERVER['PHP_SELF'],".php"); ?>
<div class="nano">
    <div class="nano-content">
        <nav id="menu" class="nav-main" role="navigation">

            <ul class="nav nav-main">
                <li class="nav-<?= ($activePage == 'dashboard') ? 'active':''; ?>">
                    <a class="nav-link" href="../dashboard/dashboard.php">
                        <i class="bx bx-home-alt" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-<?= ($activePage == 'employee') ? 'active':''; ?>">
                    <a class="nav-link" href="../employee/employee.php">
                        <i class="bx bx-user" aria-hidden="true"></i>
                        <span>Employee</span>
                    </a>
                </li>
                <li class="nav-<?= ($activePage == 'employeeTask') ? 'active':''; ?>">
                    <a class="nav-link" href="../employee/employeeTask.php">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Employee Task</span>
                    </a>
                </li>
                <li class="nav-parent <?= ($activePage == 'site_configuration') ? 'nav-active nav-expanded':''; ?>" >
                    <a class="nav-link" href="#">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span>Configurations</span>
                    </a>
                    <ul class="nav nav-children">
                        <li >
                            <a class="nav-link active" href="../configuration/site_configuration.php">
                            <i class="bx bx-loader-circle" aria-hidden="true"></i> Site Configurations
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <!-- <li>
                    <a class="nav-link" href="">
                        <i class="bx bx-loader-circle" aria-hidden="true"></i>
                        <span>Ajax</span>
                    </a>
                </li> -->

            </ul>
        </nav>

        <hr class="separator" />
    </div>
</div>
</aside>
<!-- end: sidebar -->
