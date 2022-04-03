<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

<div class="sidebar-header">
    <div class="sidebar-title">
        Menu
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
                
                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar" aria-hidden="true"></i>
                        <span>Leads</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="../leads/add_lead.php">
                                Add Lead
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="../leads/all_leads.php">
                                All Leads
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="extra-ajax-made-easy.html">
                        <i class="bx bx-loader-circle" aria-hidden="true"></i>
                        <span>Ajax</span>
                    </a>
                </li>
                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="bx bx-detail" aria-hidden="true"></i>
                        <span>Forms</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="forms-basic.html">
                                Basic
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="forms-advanced.html">
                                Advanced
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="forms-validation.html">
                                Validation
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="forms-layouts.html">
                                Layouts
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="forms-wizard.html">
                                Wizard
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="forms-code-editor.html">
                                Code Editor
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-parent">
                    <a class="nav-link" href="#">
                        <i class="bx bx-table" aria-hidden="true"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="tables-basic.html">
                                Basic
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="tables-advanced.html">
                                Advanced
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="tables-responsive.html">
                                Responsive
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="tables-editable.html">
                                Editable
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="tables-ajax.html">
                                Ajax
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="tables-pricing.html">
                                Pricing
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="extra-changelog.html">
                        <i class="bx bx-book-alt" aria-hidden="true"></i>
                        <span>Changelog</span>
                    </a>
                </li>

            </ul>
        </nav>

        <hr class="separator" />

        <hr class="separator" />

        <div class="sidebar-widget widget-stats">
            
            <div class="widget-content">
                
            </div>
        </div>
    </div>
</div>
</aside>
<!-- end: sidebar -->