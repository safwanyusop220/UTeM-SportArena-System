<?php
// include "../sql/secure.php";
include "../sql/config.php";


if (isset($_GET["id"])) {

    // Declaration
    $id = $_GET["id"];

    // Get Data
    $sql = "select * from student_request where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $studName    = $row["studName"];
    $studEmail   = $row["studEmail"];
    $studMatric  = $row["studMatric"];
    $studFaculty = $row["studFaculty"];
    $studNum     = $row["studNum"];
    $status      = $row["status"];
    $role        = $row["role"];

}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>View Staff Profile | UTeM SportArena</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- App css -->
        <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />



    </head>

    <style>
        body{
            background-color: #F0F8FF;
            background-repeat: no-repeat;
            background-size: 100%;
        } 
        footer{
            background-color: rgb(29, 40, 50);
            background-repeat: no-repeat;
            background-size: 100%;
        } 
</style>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu" style="background-color: #6777ef;  color: black;">
    

                <a href="#" class="logo text-center text-white logo-light">
                    <span class="logo-lg">
                        Admin Panel
                        <img src="images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm text-white">
                        A P
                        <img src="images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="../index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container"  data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav" style="background-color: #6777ef;  color: black;">

                    <li class="side-nav-title side-nav-item" style=" color: black;">Navigation</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                            aria-controls="sidebarDashboards" class="side-nav-link">
                            <i class="uil-home-alt" style=" color: #fcf805;"></i>
                            <span style=" color: #fcf805;"> Home<a href="student-facility-list.php"></a> </span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="admin-dashboard.php" style=" color: black;">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item" style=" color: black;">STAFF</li>

                    <li class="side-nav-item" style=" color: black;">
                        <a data-bs-toggle="collapse" href="#sidebarManage" aria-expanded="false"
                            aria-controls="sidebarManage" class="side-nav-link">
                            <i class="uil-chat-bubble-user" style=" color: #fcf805; "></i>
                            <span style=" color: #fcf805; ">Staff Management </span>
                        </a>
                        <div class="collapse" id="sidebarManage">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="staff-pending-account.php" style=" color: black;">Staff Pending Account</a>
                                </li>
                                <li>
                                    <a href="staff-status-list.php" style=" color: black;">Staff Status List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item" style=" color: black;">Student</li>

                    <li class="side-nav-item" style=" color: black;">
                        <a data-bs-toggle="collapse" href="#sidebarStudent" aria-expanded="false"
                            aria-controls="sidebarStudent" class="side-nav-link">
                            <i class="uil-user-check" style=" color: #fcf805;"></i>
                            <span style=" color: #fcf805;">Student Management </span>
                        </a>
                        <div class="collapse" id="sidebarStudent">
                            <ul class="side-nav-second-level">
                                <!-- <li>
                                    <a href="student-pending-account.php" style=" color: black;">Student Pending Account</a>
                                </li> -->
                                <li>
                                    <a href="student-status-list.php" style=" color: black;">Student List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item" style=" color: black;">LOGS</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarLog" aria-expanded="false"
                            aria-controls="sidebarLog" class="side-nav-link">
                            <i class=" uil-receipt-alt" style=" color: #fcf805;"></i>
                            <span style=" color: #fcf805;"> logs </span>
                        </a>
                        <div class="collapse" id="sidebarLog">
                            <ul class="side-nav-second-level">

                            </ul>
                        </div>
                    </li>
                </ul>

                    <!-- Help Box -->
                    <div class="help-box text-white text-center" style="background-color: #1d2832;">
                        <h5 class="mt-3">UTeM Sport Arena</h5>
                        <p class="mb-3">Version 1.0</p>
                    </div>
                    <!-- end Help Box -->
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom" style="background-color: #6777ef;">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list" >
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="../img/user-icon.jpeg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name" style="color:blue; font:ultra;">Admin</span>
                                        <span class="account-position">Admin Access</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit me-1"></i>
                                        <span>Settings</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lifebuoy me-1"></i>
                                        <span>Support</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline me-1"></i>
                                        <span>Lock Screen</span>
                                    </a>

                                    <!-- item-->
                                    <a href="../sql/logout.php" onclick='Are You sure to logout?' class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>

                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h2 class="page-title text-center" style="font-size:40px; font-family:'Roboto'"><b>Student Profile</b></h2>
                                </div>
                                <div class="row justify-content-center">
                                <div class="col-xl-4">

                                <div class="card text-center m-auto">
                                <a type="button" class="btn btn-primary btn-sm m-2" href="student-status-list.php"  style="width:80px; height:30px;">Back</a>
                                    <div class="card-body">
                                        <img src="../img/user-icon.jpeg" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                        <h4 class="mb-0 mt-2"><?= $studName?></h4>
                                        <p class=" font-14">Role: <?= $role?></p>

                                        <button type="button" class="btn btn-success btn-sm mb-2" style="width:80px; height:20px;"></button>
                                        <button type="button" class="btn btn-danger btn-sm mb-2" style="width:80px; height:20px;"></button>

                                        <div class="text-start mt-3">
                                            <p class=" mb-2 font-13"><strong>Email :</strong> <span class="ms-2"><?= $studEmail?></span></p>

                                            <p class="mb-2 font-13"><strong>Faculty  :</strong><span class="ms-2"><?= $studFaculty?></span></p>

                                            <p class="mb-2 font-13"><strong>Matric No. :</strong><span class="ms-2"><?= $studMatric?></span></p>

                                            <p class="mb-1 font-13"><strong>Phone Number :</strong> <span class="ms-2"><?= $studNum?></span></p>

                                            <p class="mb-2 font-13"><strong>Account Status :</strong> <span class="ms-2 "><?= $status?></span></p>

                                        </div>

                                        <ul class="social-list list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item bg-primary text-primary"><i
                                                        class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item bg-danger text-danger"><i
                                                        class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item bg-info text-info"><i
                                                        class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item bg-secondary text-secondary"><i
                                                        class="mdi mdi-github"></i></a>
                                            </li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                                </div>
                                </div>

                            </div>
                        </div>     
                        <!-- end page title --> 

                    </div> <!-- End container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row" style="color:white;">
                            <div class="col-md-6">
                                <p>Developed By<b class="text-success"> Safwan Yusop </b></p>
                            </div>
                                <div class="col-6 text-end">
                                    <script>document.write(new Date().getFullYear())</script>© UTem - PSM 1
                                </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

            

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->


                <!-- bundle -->
                <script src="../js/vendor.min.js"></script>
                <script src="../js/app.min.js"></script>
        
    </body>
</html>
