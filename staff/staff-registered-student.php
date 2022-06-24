<?php
//Database Connection
include "../sql/config.php";
include "../sql/secureStaff.php";
$userLogin = $_SESSION['userUniqeName'];

if ($userAccess != "staff"){
    header("location: ../sql/logout.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Registered Student | UTeM SportArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="c../ss/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- Datatables css -->
    <link href="assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />


</head>

<style>

 footer{
    background-color: rgb(29, 40, 50);
    background-repeat: no-repeat;
    background-size: 100%;
} 

</style>


<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu" style="background-color:#1d2832;">


        <a href="../index.html" class="logo text-center logo-light">
                    <span class="logo-lg" style="background-color:#1d2832;">
                        <img src="../images/logo_utem.png" alt="" width="230" height="54">
                    </span>
                    <span class="logo-sm" style="background-color:#1d2832;">
                        <img src="../images/logo_utem_sm.png" alt="" height="52">
                    </span>
                </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="../images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav" style="background-color:#1d2832;">

                    <li class="side-nav-title side-nav-item">Facility</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarFacility" aria-expanded="false" aria-controls="sidebarFacility" class="side-nav-link">
                            <i class="mdi mdi-office-building"></i>
                            <span> Facility Management </span>
                        </a>
                        <div class="collapse" id="sidebarFacility">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a class="mdi mdi-view-dashboard-variant-outline" href="staff-dashboard.php"> Dashboards</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-office-building-marker" href="staff-facility-list.php"> Facilites List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-office-building-outline" href="staff-add-facility.php"> Add Facilites</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Booking</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarBooking" aria-expanded="false" aria-controls="sidebarBooking" class="side-nav-link">
                            <i class="mdi mdi-list-status"></i>
                            <span> Booking Management </span>
                        </a>
                        <div class="collapse" id="sidebarBooking">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a class="mdi mdi-view-dashboard-variant-outline" href="#"> Dashboards</a>

                                </li>
                                <li>
                                    <a class="mdi mdi-account-cancel-outline" href="booking-list-pending.php"> Pending Booking List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-check-outline" href="booking-list-approved.php"> Approved Booking List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-cancel-outline" href="booking-list-reject.php"> Rejected Booking List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Student</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarStudent" aria-expanded="false" aria-controls="sidebarStudent" class="side-nav-link">
                            <i class="mdi mdi-account-tie"></i>
                            <span> Student Management </span>
                        </a>
                        <div class="collapse" id="sidebarStudent">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a class="mdi mdi-view-dashboard-variant-outline" href="#"> Dashboards</a>

                                </li>
                                <li>
                                    <a class="mdi mdi-account-check-outline" href="student-pending-account.php"> Pending Account</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-cancel-outline" href="account-student-status-list.php">Account Status List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-multiple-check-outline" href="staff-registered-student.php"> Registered Student</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">About Us</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                            <i class="uil-envelope"></i>
                            <span> Email </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="#">Pusat Sukan UTeM</a>
                                </li>
                                <li>
                                    <a href="#">Inquiry</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- Help Box -->
                <div class="help-box text-white text-center">
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
                <div class="navbar-custom" style="background-color: #1d2832;">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" style="background-color:#6c757d; border:none;" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar" > 
                                        <img src="../img/user-icon.jpeg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name" style="color:white; font-weight:bold; font-family:'Roboto'"><?= $userLogin?></span>
                                        <span class="account-position" style="color:white;">Staff Access</span>
                                    </span>
                                </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
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
                                <a href="../sql/logout.php" onclick="return confirm('Are you sure to logout?')" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu" style="color:#6c757d; "></i>
                    </button>

                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card col-10 offset-1 mt-4">
                                <div class="card-header ">
                                    <h3> Student Management</h3>
                                </div>
                            <table class="table table-centered mb-0">
                                <thead style="background-color: #1d2832; color: white;">
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Student Email</th>
                                        <th>Matric No.</th>
                                        <th style="width: 70px; font-size:13px; text-align:center;">Faculty</th>
                                        <th>Phone No.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                         //Query
                                        $sql = "SELECT * FROM student";
                                        $result = mysqli_query( $conn, $sql);
                                        $resultCheck = mysqli_num_rows ($result);

                                        if ($resultCheck > 0){
                                            
                                            // Get Data
                                            while ($row = mysqli_fetch_assoc($result)){

                                                // Get Data
                                                //Declaration
                                                $id = $row["id"];
                                                $studName = $row["studName"];
                                                $studEmail = $row["studEmail"];
                                                $studMatric = $row["studMatric"];
                                                $studFaculty = $row["studFaculty"];
                                                $studNum = $row["studNum"];
                                        ?>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><h4><span class="badge badge-info-lighten"><?=$id?></span></h4></td>
                                        <td><?=$studName?></td>
                                        <td><?=$studEmail?></td>
                                        <td><?=$studMatric?></td>
                                        <td style="width: 70px; font-size:13px; text-align:center;"><?=$studFaculty?></td>
                                        <td><?=$studNum?></td>
                                        <td style=" text-align:center;" class="table-action">
                                            <a href="edit-student.php?id=<?= $id ?>" class="action-icon"> <i class="mdi mdi-pencil" style="color:#FF8C00;"></i></a>
                                            <a href="delete-student.php?delete=<?= $id ?>" class="action-icon" onClick="return confirm('Are You Sure Want to delete this student Account?')"> <i class="mdi mdi-delete" style="color:#DC143C;"></i></a>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php
                                            

                                        }

                                          
                                    }
                                    else{
                                        // If error
                                        echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-dashboard.php'</script>";
                                    }



                                ?>
                            </table>
                         
                        </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6" style="color: white;">
                                <p>Developed By<b class="text-success"> Safwan Yusop </b></p>
                            </div>
                                <div class="col-6 text-end" style="color: white;">
                                    <script>document.write(new Date().getFullYear())</script>© UTeM - PSM 1
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

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                        id="light-mode-check" checked>
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                        id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>


                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check"
                        checked>
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed"
                        id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable"
                        id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                    <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                        class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="../js/vendor.min.js"></script>
    <script src="../js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Nov 2021 13:43:16 GMT -->

</html>