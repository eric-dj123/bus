<?php
session_start();
$error = "";
$msg = "";
include 'connect.php';
error_reporting(0);
if (strlen($_SESSION['email']) == 0) {
    header('location:../index.php');
}
?>
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>


            <li>
                <a href="index.php" class="metismenu list-unstyled">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboard</span>
                </a>
            </li>

           <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-contacts">User Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="manageuser.php" key="t-user-grid">All Users</a></li>
                                    <li><a href="activeuser.php" key="t-user-list">Active Users</a></li>
                                    <li><a href="inactiveuser.php" key="t-profile">Inactive Users</a></li>
                                </ul>
                            </li>

                <li class="menu-title" key="t-components">Components</li>

<li>
    <a href="" class="Swaves-effect">
        <i class="bx bx-cog"></i>
        <span key="t-ui-elements">Categorie</span>
    </a>
</li>
<li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-utility">Bus Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="managebus.php" key="t-starter-page">Manage Bus</a></li>
                                    <li><a href="activebus.php" key="t-maintenance">Active Bus</a></li>
                                    <li><a href="inactivebus.php" key="t-coming-soon">Inactive Bus</a></li>


                            </li>
</ul>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-invoices">Driver Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="managedriver.php" key="t-invoice-list">Manage Driver</a></li>
                                    <li><a href="assignedbus.php" key="t-p-list">Bus-Driver Manage</a></li>
                                    <li><a href="busdriverassigned.php" key="t-invoice-detail">Bus-Driver Assigned</a></li>
                                    <li><a href="notifydriver.php" key="t-create-new">Notify Driver</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="report.php" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="report.php">Report Notified Driver</span>
                                </a>
                            </li>
                            <li>
                                <a href="messagesentdriver.php" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="messagesentdriver.php">Driver Sent Message</span>
                                </a>
                            </li>





        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
